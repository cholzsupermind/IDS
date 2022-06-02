<?php

/*Template Name: Company Directory*/

get_header();

$tableName = 'companies';	

$query = "SELECT * FROM " . $tableName;

$total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
$total = $wpdb->get_var( $total_query );

$items_per_page = 5;
$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
$offset = ( $page * $items_per_page ) - $items_per_page;

$companiesResults = $wpdb->get_results( $query . " ORDER BY name LIMIT ${offset}, ${items_per_page}" );

    
    /*
    $companiesArray = array(
        array('Aion Therapeutic Inc.','AION', 'aiontherapeutic.com'),
        array('Albert Labs International Corp.','ABRT','albertlabs.com'),
        array('Algernon Pharmaceuticals Inc.','AGN','algernonpharmaceuticals.com'),
        array('Allied Corp.','ALID','allied.health'),
        array('ATAI Life Sciences','ATAI','atai.life'),
        array('Awakn Life Sciences','AWKN','awaknlifesciences.com'),
        array('Better Plant Sciences Inc.','CSE:PLNT','betterplantsciences.com'),//has colon
        array('Betterlife Pharma Inc.','BETR','abetterlifepharma.com'),
        array('Braxia Scientific Corp.','BRAX','braxiascientific.com'),
        array('Bright Minds Biosciences Inc.','DRUG','brightmindsbio.com'),
        array('Quanta Services, Inc.','PWR','captiva-verde.com'),
        array('Clearmind Medicine Inc.','CMND','clearmindmedicine.com'),
        array('Cypher metaverse Inc.','CODE','codebase.ventures'),
        array('Compass Pathways Plc','CMPS','compasspathways.com'),
        array('Corner Growth Acquisition Corp.','COOL','core1labs.com'),
        array('Cipher Pharmaceuticals Inc.','CPH','cresopharma.com'),
        array('CURE Pharmaceuticial Holding Corp.','CURR','curepharmaceutical.com'),
        array('Cybin Inc.','CYBN','cybin.com'),
        array('Delic Holdings Corp.','DELC','deliccorp.com'),
        array('EGF Thermamed Health Corp.','TMED','theramedhealthcorp.com'),
        array('Ehave Inc.','EHVVF','ehave.com'), // flag
        array('Empower Clinics Inc.','CBDT','empowerclinics.com'),
        array('Entheon Biomedical Corp.','ENBI','entheonbiomedical.com'),
        array('Enveric Biosciences Inc.','ENVB','enveric.com'),
        array('Field Trip Health Ltd.','FTRP','meetfieldtrip.com'),
        array('Filament Health Corp.','FH','filament.health'),
        array('GH Research PLC','GHRS','ghres.com'),
        array('Psyched Wellness Ltd.','PSYC','globaltracsolutions.com'),
        array('Goodness Growth Holdings Inc.','GDNS','goodnessgrowth.com'),
        array('Graph Blockchain Inc.','GBLC','graphblockchain.com'),
        array('Havn Life Sciences INC.','HAVN','havnlife.com'),
        array('Hollister Cannabis CO','HOLL','hollistercannabisco.com'),
        array('Wellbeing Digital Sciences','MEDI','ketamine.one'),
        array('Laserbond Limtied','LBL','latticebiologics.com'),
        array('Levitee Labs Inc.','LVT','leviteelabs.com'),
        array('Lobe Sciences Ltd.','LOBE','lobesciences.com'),
        array('Magic Software Enterprises Ltd.','MGIC','magicmedindustries.com'),
        array('Mind Cure Health Inc.','MCUR','mindcure.com'),
        array('Mind Medicine (MindMed) Inc.','MNMD','mindmed.co'),
        array('Mindset Pharma Inc.','MSET','mindsetpharma.com'),
        array('Mydecine Innovations Group Inc.','MYCO','mydecine.com'),
        array('Neonode Inc.','NEON','neonmindbiosciences.com'),
        array('New Wave Holdings Corp.','SPOR','newwavecorp.com'),
        array('Sunnova Energy International Inc.','NOVA','novamentis.ca'),
        array('Navios Maritime Holdings Inc.','NM','novamind.ca'),
        array('Numinus Wellness Inc.','NUMI','numinus.ca'),
        array('Brinker International Inc.','EAT','nutritionalhigh.com'),
        array('Optimi Health Corp.','OPTI','optimihealth.ca'),
        array('Pharmadrug Inc.','PHRX','pharmadrug.co'),
        array('Pharmather Holdings Ltd.','PHRM','pharmather.com'),
        array('Psybio Therapeutics Corp','PSYB','psybiolife.com'),
        array('Psyence Group Inc.','PSYG','psyence.com'),
        array('TripAdvisor Inc.','TRIP','redlighttruffles.com'),
        array('Revive Therapeutics Ltd.','RVV','revivethera.com'),
        array('Logistics Innovation Technologies Corp.','LITT','roadmancorp.com'),
        array('Seelos Therapeutics Inc.','SEEL','seelostherapeutics.com'),
        array('Silo Wellness Inc.','SILO','silopharma.com'),
        array('TSXV DMT','TSXV: DMT','smallpharma.co.uk'),//has colon
        array('Thoughtful Brands Inc.','PEMTF','thoughtful-brands.com'),//has hyphen
        array('Tryp Therapeutics','TRYPF','tryptherapeutics.com'),
        array('Wesana Health Holdings Inc.','WESA','wesanahealth.com'),
        array('Wuhan General Group (China), Inc.','WUHN','wuhn.org')
    );

    foreach($companiesArray as $company)
    {
        $dataArray = array(
          'id' => 'NULL',
          'name' => $company[0],
          'symbol' => $company[1],
          'url' => $company[2]
        );

        $result = $wpdb->insert('companies',$dataArray);
        $wpdb->print_error();
        if(!$result)
        {
           echo 'Broken<br />';
        }
        
        else
        {
           echo "Success<br/>";
        }
    }
    */

    $pagination = paginate_links( array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'format' => '',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => ceil($total / $items_per_page),
        'current' => $page
    ));
    
    foreach($companiesResults as $company)
    {
        $html .= "<div style='font-size: 12px;'>";
        $html .= "<ul>";
        $html .= '<li>Website: <a rel="noopener noreferrer" target="_blank" href="https://' . dataCheck($company->url) . '">' . dataCheck($company->url) . '</a></li>';
        //$html .= '<li>Company Summary</li>';
        $html .= '<li>Stock Price (this is going to take WAY TOO Long to load, but you get the idea):
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div id="tradingview_' . $x . '"></div>
                  <div class="tradingview-widget-copyright">
                  <a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">' . dataCheck($company->url) . '</span></a>
                  by TradingView</div>
                  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                  <script type="text/javascript">
                  new TradingView.widget(
                  {
                  "autosize": true,
                  "symbol": "' . dataCheck($company->sybmol) . '",
                  "interval": "D",
                  "timezone": "Etc/UTC",
                  "theme": "light",
                  "style": "1",
                  "locale": "en",
                  "toolbar_bg": "#f1f3f6",
                  "enable_publishing": false,
                  "allow_symbol_change": true,
                  "container_id": "tradingview_b34fd"
                }
                  );
                  </script>
                </div>
            </li>
            <!-- TradingView Widget END -->';
        $html .= '<li>Stock Symbol : ' . dataCheck($company->symbol) . '</li>';
        $html .= '<li>Company Name : ' . dataCheck($company->name) . '</li>';
        $html .= '<li>Filter by Category?</li>';
        $html .= '<li>Filter by Drug Focus?</li>';
        $html .= '<li>Social Media Links?</li>';
        $html .= '</ul>';
        $html .= '<hr />';
        $html .= '</div>';
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