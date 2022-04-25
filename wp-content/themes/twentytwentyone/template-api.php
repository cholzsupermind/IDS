<?php

/*Template Name: API Call*/

get_header();

//Assembling URL for API call
function apiSearchCriteria($searchParam,$maxRank)
{
    $apiURL = 'https://www.clinicaltrials.gov/api/query/full_studies?expr=';
    $format = 'json';
    $searchURL = $apiURL . $searchParam . '&min_rnk=1&max_rnk=' . $maxRank . '&fmt=' . $format;
    return $searchURL;
}

//search criteria based on page slug, fire off url assembly funciton
$metaData = get_post_meta($post->ID);
$searchCriteria = apiSearchCriteria($metaData['apiSearchField'][0],$metaData['resultsNumber'][0]); //(search param, number of results)

//Send of GET request to API
$response = wp_remote_get($searchCriteria);

//Away response and move results into $body var
if ( is_array( $response ) && ! is_wp_error( $response ) ) {
    $headers = $response['headers']; // array of http header lines
    $body    = json_decode($response['body'],true); // use the content and return in array
}

//Get all data from details ONLY array
$fullStudies = $body['FullStudiesResponse']['FullStudies'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
    <h2><?=get_the_title(); ?></h2>


<?php
    //Bring over API data assembly function
    include('fullStudiesAPI.php');
    $results = fullStudiesAPI($fullStudies);
    
    foreach($results as $result)
    {
        echo "<div style='font-size: 12px;'>";
        foreach($result as $key => $value)
        {
            echo '<span>' . $key . ' : ' . $value . '</span><br />';
        }
        echo '<hr /></div>';
    }
?>

</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>