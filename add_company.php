<?

function add_real($company, $contacts){

    $queryUrl = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.company.add.json';

    $qr = array(
        'fields' => array(),
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    );
	var_dump($company);
	
    $qr['fields']['TITLE'] = $company["name"]; // Название лида  
    $qr['fields']['COMPANY_TYPE'] = 'CUSTOMER';
	$qr['fields']['UF_CRM_1567447234493'] = $company["address"];
	//$qr['fields']['ADDRESS']["isRequired"];
    $qr['fields']['OPENED'] = 'Y';
	// $phone["VALUE"] = $company["phone"];
	// $phone["VALUE_TYPE"] = "Рабочий";
	// $qr['fields']['PHONE'] = $phone;
	$qr['fields']['PHONE']['n1'] = array("VALUE"=>$company["phone"], "VALUE_TYPE"=>"WORK");
   
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
    $companyID = $result["result"];
    var_dump($result);
	echo "\n id: ".$companyID."\n";
	
	var_dump($contacts);
	
	for($i = 0;$i < count($contacts);$i++){
		
		echo "Contact   ".$contacts[$i]["name"]."\n";
		
		$queryUrl1 = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.contact.add.json';
		$qr1 = array(
			'fields' => array(),
			'params' => array()
		);
		$qr1['fields']['NAME'] = $contacts[$i]["name"];
		//$qr['fields']['SECOND_NAME'] = 'Егорович';
		//$qr['fields']['LAST_NAME'] = 'Титов';
		$qr1['fields']['OPENED'] = 'Y'; //открыто для других пользователей
		//$qr['fields']['ASSIGNED_BY_ID'] = 1; //id ответственного менеджера
		$qr1['fields']['PHONE']['n1'] = array("VALUE"=>$contacts[$i]["phone"], "VALUE_TYPE"=>"WORK");
		$qr1['fields']['EMAIL']['n1'] = array("VALUE"=>$contacts[$i]["email"], "VALUE_TYPE"=>"WORK");
	 
		$queryData1 = http_build_query($qr1);
	 
		$curl1 = curl_init();
		curl_setopt_array($curl1, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => FALSE,
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $queryUrl1,
			CURLOPT_POSTFIELDS => $queryData1,
		));
	 
		if(!$result1 = curl_exec($curl1))
		{
			$result1 = curl_error($curl1);
		}
		curl_close($curl1);
	 
		$result1 = json_decode($result1, true);
		$contactId = $result1["result"];
		var_dump($result1);
		
		//добавляем контакт к компании
		
		$queryUrl2 = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.company.contact.add.json';
		$qr2 = array(
			'id' => $companyID,
			'fields' => array()
		);
		$qr2['fields']['CONTACT_ID'] = $contactId;//Идентификатор контакта (обязательное поле)
	 
		$queryData2 = http_build_query($qr2);
	 
		$curl2 = curl_init();
		curl_setopt_array($curl2, array(
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => FALSE,
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $queryUrl2,
			CURLOPT_POSTFIELDS => $queryData2,
		));
	 
		if(!$result2 = curl_exec($curl2))
		{
			$result2 = curl_error($curl2);
		}
		curl_close($curl2);
	 
		$result2 = json_decode($result2, true);
		var_dump($result2);
	
	}
	
	
	
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
