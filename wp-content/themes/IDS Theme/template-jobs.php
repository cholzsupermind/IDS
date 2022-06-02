<?php

/*Template Name: Jobs */

get_header();

$tableName = 'organizations';	

$query = "SELECT name, headquarters_location, website, contact_email, phone_number, actively_hiring FROM " . $tableName . " WHERE actively_hiring = 'Yes'";

$total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
$total = $wpdb->get_var( $total_query );

$items_per_page = 15;
$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
$offset = ( $page * $items_per_page ) - $items_per_page;

$jobResults = $wpdb->get_results( $query . " ORDER BY name LIMIT ${offset}, ${items_per_page}" );

$pagination = paginate_links( array(
    'base' => add_query_arg( 'cpage', '%#%' ),
    'format' => '',
    'prev_text' => __('&laquo;'),
    'next_text' => __('&raquo;'),
    'total' => ceil($total / $items_per_page),
    'current' => $page
));

foreach($jobResults as $job)
{
    $html .= '<div>';
    $html .= '<ul>';
    $html .= '<li>' . dataCheck($job->name) . '</li>';
    $html .= '<li>Currently Hiring : ' . dataCheck($job->actively_hiring) . '</li>';
    $html .= '<li>' . dataCheck($job->headquarters_location) . '</li>';
    $html .= '<li><a href="' . dataCheck($job->website) . ' target="_blank">' . dataCheck($job->website) . '</a></li>';
    $html .= '<li>' . dataCheckMail($job->contact_email) . '</li>';
    $html .= '<li>' . dataCheckPhone($job->phone_number) . '</li>';
    $html .= '</ul>';
    $html .= '</div>';
    $html .= '<hr>';
}

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
    <h2><?=get_the_title(); ?></h2>
    <div>
        <?=$pagination;?>
    </div>
    <?php echo $html; ?>
    </div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>

