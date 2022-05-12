<?php

/*Template Name: Company Directory*/

get_header();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
    <h2><?=get_the_title(); ?></h2>

<?php
    $companiesArray = array(
        array('AION', 'aiontherapeutic.com'),
        array('ABRT','albertlabs.com'),
        array('AGN','algernonpharmaceuticals.com'),
        array('ALID','allied.health'),
        array('ATAI','atai.life'),
        array('AWKN','awaknlifesciences.com'),
        array('CSE:PLNT','betterplantsciences.com'),
        array('BETR','abetterlifepharma.com'),
        array('BRAX','braxiascientific.com'),
        array('DRUG','brightmindsbio.com'),
        array('PWR','captiva-verde.com'),
        array('CMND','clearmindmedicine.com'),
        array('CODE','codebase.ventures'),
        array('CMPS','compasspathways.com'),
        array('COOL','core1labs.com'),
        array('CPH','cresopharma.com'),
        array('CURR','curepharmaceutical.com'),
        array('CYBN','cybin.com'),
        array('DELC','deliccorp.com'),
        array('TMED','theramedhealthcorp.com'),
        array('EHVVF','ehave.com'),
        array('CBDT','empowerclinics.com'),
        array('ENBI','entheonbiomedical.com'),
        array('ENVB','enveric.com'),
        array('FTRP','meetfieldtrip.com'),
        array('FH','filament.health'),
        array('GHRS','ghres.com'),
        array('PSYC','globaltracsolutions.com'),
        array('GDNS','goodnessgrowth.com'),
        array('GBLC','graphblockchain.com'),
        array('HAVN','havnlife.com'),
        array('HOLL','hollistercannabisco.com'),
        array('MEDI','ketamine.one'),
        array('LBL','latticebiologics.com'),
        array('LVT','leviteelabs.com'),
        array('LOBE','lobesciences.com'),
        array('MGIC','magicmedindustries.com'),
        array('MCUR','mindcure.com'),
        array('MNMD','mindmed.co'),
        array('MSET','mindsetpharma.com'),
        array('MYCO','mydecine.com'),
        array('NEON','neonmindbiosciences.com'),
        array('SPOR','newwavecorp.com'),
        array('NOVA','novamentis.ca'),
        array('NM','novamind.ca'),
        array('NUMI','numinus.ca'),
        array('EAT','nutritionalhigh.com'),
        array('OPTI','optimihealth.ca'),
        array('PHRX','pharmadrug.co'),
        array('PHRM','pharmather.com'),
        array('PSYB','psybiolife.com'),
        array('PSYG','psyence.com'),
        array('TRIP','redlighttruffles.com'),
        array('RVV','revivethera.com'),
        array('LITT','roadmancorp.com'),
        array('SEEL','seelostherapeutics.com'),
        array('SILO','silopharma.com'),
        array('TSXV: DMT','smallpharma.co.uk'),
        array('PEMTF','thoughtful-brands.com'),
        array('TRYP','tryptherapeutics.com'),
        array('WESA','wesanahealth.com'),
        array('WUHN','wuhn.orgarray')
    );
   
    //initialize iterator for unique ID per div
    $x = 1;
    foreach($companiesArray as $company)
    {
        echo "<div style='font-size: 12px;'>";
        echo "<ul>";
        echo '<li>Website: <a target= "_blank" href="https://' . $company[1] . '">' . $company[1] . '</a></li>';
        //echo '<li>Company Summary</li>';
        /*
        echo '<li>Stock Price (this is going to take WAY TOO Long to load, but you get the idea):
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                  <div id="tradingview_' . $x . '"></div>
                  <div class="tradingview-widget-copyright">
                  <a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">' . $company[1] . '</span></a>
                  by TradingView</div>
                  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                  <script type="text/javascript">
                  new TradingView.widget(
                  {
                  "autosize": true,
                  "symbol": "' . $company[0] . '",
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
        */
        //echo '<li>Stock Symbol : ' . $company[0] . '</li>';
        //echo '<li>Company Logo?</li>';
        //echo '<li>Filter by Category?</li>';
        //echo '<li>Filter by Drug Focus?</li>';
        //echo '<li>Social Media Links?</li>';
        echo '</ul>';
        //echo '<hr />';
        echo '</div>';
        $x++;
    }
?>

</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>