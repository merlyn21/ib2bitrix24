<?
//$queryUrl = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.company.fields.json';

   
//    $queryData = http_build_query($qr);
$ini = parse_ini_file('config');

$server =  $ini['server'];



function get_fields($metod){ 

	global $server;

	$queryUrl = $server.$metod;
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => FALSE,
//        CURLOPT_GET => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
//        CURLOPT_POSTFIELDS => $queryData,
    ));
 
    if(!$result = curl_exec($curl))
    {
        $result = curl_error($curl);
    }
    curl_close($curl);
 
    $result = json_decode($result, true);
//    $dealID = $result["result"];
    var_dump($result);
}

function get_company($id){ 

	global $server;

	$queryUrl = $server."crm.company.get?id=".$id;
    
	

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => FALSE,
//        CURLOPT_GET => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
//        CURLOPT_POSTFIELDS => $queryData,
    ));
 
 
    if(!$result = curl_exec($curl))
    {
        $result = curl_error($curl);
    }
    curl_close($curl);
 
    $result = json_decode($result, true);
//    $dealID = $result["result"];
    var_dump($result);
}


//get_fields('crm.company.fields.json');
//get_fields('crm.quote.fields.json');
get_company(53);


?>
