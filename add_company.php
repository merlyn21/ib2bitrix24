<?

function add_real(){

    $queryUrl = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.company.add.json';

    $qr = array(
        'fields' => array(),
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    );
    $qr['fields']['TITLE'] = 'ООО "СетиКом-Сервис"'; // Название лида  
    $qr['fields']['COMPANY_TYPE'] = 'Клиент';
    $qr['fields']['OPENED'] = 'Y';
   
    $queryData = http_build_query($qr);
 
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_SSL_VERIFYHOST => FALSE,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,
    ));
 
    if(!$result = curl_exec($curl))
    {
        $result = curl_error($curl);
    }
    curl_close($curl);
 
    $result = json_decode($result, true);
    $dealID = $result["result"];
    var_dump($result);
}

function add_test($company, $contacts, $history){
	
	echo "Company: ";
	echo $company["name"]."  ph:".$company["phone"]."  user:".$company["user"]."  adr:".$company["address"]."\n"; 
	//echo count($contacts)."\n";
	
	for($i = 0;$i < count($contacts);$i++){
			echo " ---- ".iconv("CP1251","UTF-8",$contacts[$i]["name"])."    ph:".iconv("CP1251","UTF-8",$contacts[$i]["phone"])."\n";
		
	}
	
	echo "=====\n";
	for($i = 0;$i < count($history);$i++){
			echo " ---- ".$history[$i]["note"]."\n";
		
	}
	
	
}

?>
