<?php

/*Template Name: Crunchbase Template*/

get_header();

$filePath = "wp-content/csv/" . $post->post_name . ".csv";
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
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
$row = 1;

$html = "<table style='font-size: 12px; max-width: 98%; margin: 0px 20px;'>";

if (($handle = fopen($filePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);

        $html .= '<tr>';
        for ($c = 0; $c < $num; $c++)
        {
            //Cut down length of paragraph on FULL DESCRIPTION to 100 characters
            if(strlen($data[$c]) > 50)
            {
                $data[$c] = substr($data[$c], 0, 50) . '...';
            }
            
            //Create links if detect http or https
            if (strpos($data[$c], "http") === 0 || strpos($data[$c], "https") === 0)
            {
                $data[$c] = '<a href="' . $data[$c] . '" > ' . $data[$c] . '</a>';
            }
            
            //if data value is numeric AND greater than 5 digits?  Then add money format
            if(is_numeric($data[$c]) && strlen($data[$c]) > 3)
            {
                $data[$c] = '$' . number_format($data[$c]);
            }
            
            $html .= '<td>' . $data[$c] . '</td>';
        }
        
        $html .= '</tr>';
        $row++;
    }
    fclose($handle);
}

$html .= '</table>';
    
echo '<p>Number of results: ' . $row . '</p>';
echo $html;
?>

</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>