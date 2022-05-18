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

?>

<table style='font-size: 12px; max-width: 98%; margin: 0px 20px;'>

    
<?php

//Open CSV file and dump data
$row = 1;
if (($handle = fopen($filePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo '<tr>';
        for ($c = 0; $c < $num; $c++) {
            if($row == 1)
            {
                echo '<th>' . $data[$c] . '</th>';
            }
            else
            {
                //Link
                if ($c == 1)
                {
                    echo '<td><a href="' . $data[$c] . '"</a>' . $data[$c] . '</td>';
                }
                //USD Format
                elseif($c == 7 || $c == 9 || $c == 10 || $c == 12)
                {
                    echo '<td>$' . number_format($data[$c]) . '</td>';                    
                }
                //Default format
                else
                {
                    echo '<td>' . $data[$c] . '</td>';
                }
            }
        }
        echo '</tr>';
        $row++;
    }
    fclose($handle);
}
    
?>
</table>
</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>