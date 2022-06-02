<?php

/*Template Name: CSV Import */

get_header();

//read CSV directory
$dir    = 'wp-content/csv/';
$files = scandir($dir);
$files = array_diff(scandir($dir), array('..', '.'));

//Build Select list
$selectHTML .= '<select name="files" id="files">';

foreach($files as $file)
{
  $selectHTML .= '<option value="' . $file . '">' . $file . '</option>';
}

$selectHTML .= '</select>';

//Show Dropdown list
echo $selectHTML . "<br /><br />";

//$filePath = "wp-content/csv/affiliate-marketing.csv";
//$filePath = "wp-content/csv/alternative-health.csv";
//$filePath = "wp-content/csv/health-content.csv"; //Error
//$filePath = "wp-content/csv/media-content.csv"; //Error in the first entry full description
//$filePath = "wp-content/csv/mental-health.csv";
//$filePath = "wp-content/csv/substance.csv";
//$filePath = "wp-content/csv/psychedelics.csv";

//$filePath = "wp-content/csv/allData.csv";

//Open CSV file and create array
if (($handle = fopen($filePath, "r")) !== FALSE)
{
    fgetcsv($handle); //skips first row (headers)
    while (($getData = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
       $tableName = 'organizations';
       
       $dataArray = array(
         'id' => 'NULL',
         'name' => $getData[0],
         'name_url' => $getData[1],
         'industries' => $getData[2],
         'headquarters_location' => $getData[3],
         'description' => $getData[4],
         'cb_rank' => $getData[5],
         'num_funding_rounds' => $getData[6],
         'last_fund_amount' => $getData[7],
         'last_fund_amount_currency' => $getData[8],
         'last_fund_amount_currency_usd' => $getData[9],
         'total_fund_amount' => $getData[10],
         'total_fund_amount_curency' => $getData[11],
         'total_fund_amount_currency_usd' => $getData[12],
         'headquarters_regions' => $getData[13],
         'diversity_spotlight' => $getData[14],
         'estimated_revenue_range' => $getData[15],
         'operating_status' => $getData[16],
         'founded_date' => $getData[17],
         'founded_date_precision' => $getData[18],
         'exit_date' => $getData[19],
         'exit_date_precision' => $getData[20],
         'closed_date' => $getData[21],
         'closed_date_precision' => $getData[22],
         'company_type' => $getData[23],
         'website' => $getData[24],
         'twitter' => $getData[25],
         'facebook' => $getData[26],
         'linkedin' => $getData[27],
         'contact_email' => $getData[28],
         'phone_number' => $getData[29],
         'num_articles' => $getData[30],
         'hub_tags' => $getData[31],
         'full_description' => $getData[32],
         'actively_hiring' => $getData[33]
       );

       //print_r($dataArray);
       //echo "<br /><hr><br />";
       
       $wpdb->show_errors();       
       $result = $wpdb->insert($tableName,$dataArray);
       
       if(!$result)
       {
          echo 'Broken<br />';
       }
       
       else
       {
          echo "Success<br/>";
       }

    }            

    fclose($handle);
}


?>
