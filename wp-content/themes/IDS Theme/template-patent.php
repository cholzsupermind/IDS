<?php

/*Template Name: Patents*/

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
    <tr>
        <th></th>
        <th>Owner/Assignee</th>
        <th>Patent/Pub. No.</th>
        <th>Title</th>
        <th>Priority Date</th>
        <th>Status</th>
        <th>General subject matter</th>
    </tr>
    
<?php

//Open CSV file and dump data
$row = 1;
$x = 1;
if (($handle = fopen($filePath, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        echo '<tr>';
        for ($c = 0; $c < $num; $c++) {
            echo '<td>' . $data[$c] . '</td>';
        }
        echo '</tr>';
        $x++;
    }
    fclose($handle);
}

//Show user added patents based on categories
$postName = $post->post_name;

while ( $loop->have_posts() ) : $loop->the_post();
    $postCategory = get_the_category();
    $postCategory = $postCategory[0]->category_nicename;

    if($postName == $postCategory)
    {
        echo '<tr>';
        echo '<td>' . $x . '</td>';
        echo '<td>' . get_post_meta($post->ID, 'owner', true) . '</td>';
        echo '<td>' . get_the_title() . '</td>';
        echo '<td>' . get_the_excerpt() . '</td>';
        echo '<td>' . get_post_meta($post->ID, 'priority date', true) . '</td>';
        echo '<td>' . get_post_meta($post->ID, 'status', true) . '</td>';
        echo '<td>' . get_post_meta($post->ID, 'title', true) . '</td>';
        echo '</tr>';
        $x++;
    }
endwhile;

wp_reset_postdata();

    
?>
</table>
</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>