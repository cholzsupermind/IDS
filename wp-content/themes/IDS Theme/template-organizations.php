<?php

/*Template Name: Organizations */

get_header();

global $wpdb;
$tableName = 'organizations';	

$query = "SELECT * FROM " . $tableName;

$total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
$total = $wpdb->get_var( $total_query );

$items_per_page = 15;
$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
$offset = ( $page * $items_per_page ) - $items_per_page;

$organizationResults = $wpdb->get_results( $query . " ORDER BY name LIMIT ${offset}, ${items_per_page}" );
    
//$organizationResults = $wpdb->get_results( $query, ARRAY_A );

//Run through array and filter all companies that are hiring
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

<?php

    $pagination = paginate_links( array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'format' => '',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => ceil($total / $items_per_page),
        'current' => $page
    ));
    
    foreach($organizationResults as $organization)
    {
        $html .= '<div>';
        $html .= '<ul>';
        $html .= '<li><span>Organization Name : </span>' . $organization->name . '</li>';
        $html .= '<li><span>URL : </span>' . $organization->name_url . '</li>';
        $html .= '<li><span>Industries : </span>' . $organization->industries . '</li>';
        $html .= '<li><span>Headquarters Location : </span>' . $organization->headquarters_location . '</li>';
        $html .= '<li><span>Description : </span>' . $organization->description . '</li>';
        $html .= '<li><span>CB Rank: : </span>' . $organization->cb_rank . '</li>';
        $html .= '<li><span>Number of Funding Rounds : </span>' . $organization->num_funding_rounds . '</li>';
        $html .= '<li><span>Last Funding Amount : </span>' . $organization->last_fund_amount . '</li>';
        $html .= '<li><span>Last Funding Amount Currency  : </span>' . $organization->last_fund_amount_currency . '</li>';
        $html .= '<li><span>Last Funding Amount Currency (in USD) : </span>' . $organization->last_fund_amount_currency_usd . '</li>';
        $html .= '<li><span>Total Funding Amount : </span>' . $organization->total_fund_amount . '</li>';
        $html .= '<li><span>Total Funding Amount Currency  : </span>' . $organization->total_fund_amount_curency . '</li>';
        $html .= '<li><span>Total Funding Amount Currency (in USD) : </span>' . $organization->total_fund_amount_currency_usd . '</li>';
        $html .= '<li><span>Headquarters Regions : </span>' . $organization->headquarters_regions . '</li>';
        $html .= '<li><span>Diversity Spotlight (US Only) : </span>' . $organization->diversity_spotlight . '</li>';
        $html .= '<li><span>Estimated Revenue Range : </span>' . $organization->estimated_revenue_range . '</li>';
        $html .= '<li><span>Operating Status : </span>' . $organization->operating_status . '</li>';
        $html .= '<li><span>Founded Date : </span>' . $organization->founded_date . '</li>';        
        $html .= '<li><span>Founded Date Precision  : </span>' . $organization->founded_date_precision . '</li>';               
        $html .= '<li><span>Exit Date : </span>' . $organization->exit_date . '</li>';        
        $html .= '<li><span>Exit Date Precision  : </span>' . $organization->exit_date_precision . '</li>';
        $html .= '<li><span>Closed Date : </span>' . $organization->closed_date . '</li>';        
        $html .= '<li><span>Closed Date Precision : </span>' . $organization->closed_date_precision . '</li>';
        $html .= '<li><span>Company Type : </span>' . $organization->company_type . '</li>';
        $html .= '<li><span>Website : </span>' . $organization->website . '</li>';
        $html .= '<li><span>Twitter : </span>' . $organization->twitter . '</li>';
        $html .= '<li><span>Facebook : </span>' . $organization->facebook . '</li>';
        $html .= '<li><span>LinkedIn : </span>' . $organization->linkedin . '</li>';
        $html .= '<li><span>Contact Email : </span>' . $organization->contact_email . '</li>';
        $html .= '<li><span>Phone Number : </span>' . $organization->phone_number . '</li>';
        $html .= '<li><span>Number of Articles : </span>' . $organization->num_articles . '</li>';
        $html .= '<li><span>Hub Tags : </span>' . $organization->hub_tags . '</li>';
        $html .= '<li><span>Full Description : </span>' . $organization->full_description . '</li>';
        $html .= '<li><span>Actively Hiring : </span>' . $organization->actively_hiring . '</li>';
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

