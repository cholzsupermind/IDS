<?php

/*Template Name: Company Directory*/

get_header();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
    <h2><?=get_the_title(); ?></h2>

<?php
    $companiesArray =
    [
        "aiontherapeutic.com",
        "albertlabs.com",
        "algernonpharmaceuticals.com",
        "allied.health",
        "atai.life",
        "awaknlifesciences.com",
        "betterplantsciences.com",
        "abetterlifepharma.com",
        "braxiascientific.com",
        "brightmindsbio.com",
        "captiva-verde.com",
        "clearmindmedicine.com",
        "codebase.ventures",
        "compasspathways.com",
        "core1labs.com",
        "cresopharma.com",
        "curepharmaceutical.com",
        "cybin.com",
        "deliccorp.com",
        "theramedhealthcorp.com",
        "ehave.com",
        "empowerclinics.com",
        "entheonbiomedical.com",
        "enveric.com",
        "meetfieldtrip.com",
        "filament.health",
        "ghres.com",
        "globaltracsolutions.com",
        "goodnessgrowth.com",
        "graphblockchain.com",
        "havnlife.com",
        "hollistercannabisco.com",
        "ketamine.one",
        "latticebiologics.com",
        "leviteelabs.com",
        "lobesciences.com",
        "magicmedindustries.com",
        "mindcure.com",
        "mindmed.co",
        "mindsetpharma.com",
        "mydecine.com",
        "neonmindbiosciences.com",
        "newwavecorp.com",
        "novamentis.ca",
        "novamind.ca",
        "numinus.ca",
        "nutritionalhigh.com",
        "optimihealth.ca",
        "pharmadrug.co",
        "pharmather.com",
        "psybiolife.com",
        "psyence.com",
        "redlighttruffles.com",
        "revivethera.com",
        "roadmancorp.com",
        "seelostherapeutics.com",
        "silopharma.com",
        "smallpharma.co.uk",
        "thoughtful-brands.com",
        "tryptherapeutics.com",
        "wesanahealth.com",
        "wuhn.org"
    ];
   
    foreach($companiesArray as $company)
    {
        echo "<div style='font-size: 12px;'>";
        echo '<a target= "_blank" href="https://' . $company . '">' . $company . '</a>';
        echo '</div>';
    }
?>

</div><!-- .entry-content -->
</article>



<?php
    get_footer();
?>