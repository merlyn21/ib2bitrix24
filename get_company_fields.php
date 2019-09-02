<?
$queryUrl = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.company.fields.json';

   
//    $queryData = http_build_query($qr);
 
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


?>
