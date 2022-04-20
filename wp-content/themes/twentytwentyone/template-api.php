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



<table style='font-size: 12px; max-width: 98%; margin: 0px 20px;'>
    <tr>
        <th>Rank</th>
        <th>NCT ID</th>
        <th>Study ID</th>
        <th>Organization</th>
        <th>Official Title</th>
        <th>Status Verified Date</th>
        <th>Overall Status</th>
    </tr>
    
<?php
foreach($fullStudies as $fullStudy)
{
    echo '<tr>';
    echo '<td>' . $fullStudy['Rank'] . '</td>';
    echo '<td>' . $fullStudy['Study']['ProtocolSection']['IdentificationModule']['NCTId'] . '</td>';
    echo '<td>' . $fullStudy['Study']['ProtocolSection']['IdentificationModule']['OrgStudyIdInfo']['OrgStudyId'] . '</td>';
    echo '<td>' . $fullStudy['Study']['ProtocolSection']['IdentificationModule']['Organization']['OrgFullName'] . '</td>';
    echo '<td>' . $fullStudy['Study']['ProtocolSection']['IdentificationModule']['OfficialTitle'] . '</td>';
    echo '<td>' . $fullStudy['Study']['ProtocolSection']['StatusModule']['StatusVerifiedDate'] . '</td>';
    echo '<td>' . $fullStudy['Study']['ProtocolSection']['StatusModule']['OverallStatus'] . '</td>';
    echo '</tr>';
}
?>
</table>
</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>