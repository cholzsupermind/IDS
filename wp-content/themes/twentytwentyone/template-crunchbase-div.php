<?php

/*Template Name: Crunchbase Template DIV*/

get_header();

$filePath = "wp-content/csv/" . $post->post_name . ".csv";
?>

<style>
    .outerDiv
    {
        font-size: 12px;
        padding: 20px;
    }

    .outerDiv div
    {    
        padding: 30px;
        background: #ffffff;
        margin: 10px;
        float: left;
        max-height: 500px;
        max-width: 500px;
        overflow: scroll;
    }
    
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="outerDiv">
        <h2><?=get_the_title(); ?></h2>
<?php
    query_posts(array(
   'post_type' => 'patents'
));

$args = array(  
    'post_type' => 'patents',
    'post_status' => 'publish',
    'posts_per_page' => 8, 
    'orderby' => 'title', 
    'order' => 'DESC', 
);

$loop = new WP_Query( $args ); 

//Open CSV file and dump data
if (($handle = fopen($filePath, "r")) !== FALSE)
{
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        // Dump CSV into Array
        $csv = array_map('str_getcsv', file($filePath));
        array_walk($csv, function(&$a) use ($csv) {
          $a = array_combine($csv[0], $a);
        });
        array_shift($csv); # remove column header

        fclose($handle);
    }            
}


$imageDisplay = 1; //begin image display

foreach($csv as $company)
{
    $arrayHTML .=  '<div>';
    
    foreach($company as $key => $value)
    {
        //Remove Unwanted fields
        if( $key == 'Organization Name URL' || $key == 'CB Rank (Organization)'){}
        
        //Show everything else
        else{
            $arrayHTML .=  '<ul>';
            
            //Cut down length of paragraph on FULL DESCRIPTION to 100 characters
            if(strlen($value) > 100)
            {
                $value = '<span>' . substr($value, 0, 100) . '...</span>';
            }
            
            //Create links if detect http or https
            if (strpos($value, "http") === 0 || strpos($value, "https") === 0)
            {
                $value = '<a target="_blank" href="' . $value . '" > ' . $value . '</a>';
            }
            
            //if data value is numeric AND greater than 5 digits?  Then add money format
            if(is_numeric($value) && strlen($value) > 3)
            {
                $value = '<span>$' . number_format($value) . '</span>';
            }
            
            if( $value == '')
            {
                $value = 'No Data Available';
            }
            
            //Display Image first, then compamy name
            if($imageDisplay == 1 )
            {
                 $imageName = strtolower(preg_replace("/[^a-zA-Z0-9\s]/", "", $value));
                 $arrayHTML .=  '<li><img src="' . get_home_url() . '/wp-content/logos/' . $imageName . '.webp" border="0" /></li>';
                 $arrayHTML .=  '<li><strong>' . $key . '</strong> : ' . $value . '</li>';    
                 $imageDisplay = 0; //reset image display
            }
            //Display everything else
            else
            {
                $arrayHTML .=  '<li><strong>' . $key . '</strong> : ' . $value . '</li>';    
            }
            $arrayHTML .=  '</ul>';
        }
    }
    $arrayHTML .=  '</div>';
    $imageDisplay = 1; //reset image display
}
   
echo '<h3>Number of results: ' . count($csv) . '</h3>';
echo $arrayHTML;
?>

</div><!-- .entry-content -->
</article>

<?php
    get_footer();
?>