<?
$queryUrl = 'https://server1/rest/1/y6yh3tmvacwpjb93/crm.deal.add.json';

    $qr = array(
        'fields' => array(),
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    );
    $qr['fields']['TITLE'] = 'Бронирование он-лайн'; // Название лида  
    $qr['fields']['UF_CRM_1512475708'] = 'Япония'; //Направление  
    $qr['fields']['COMMENTS'] = 'Тестовая заявка'; // Комментарий
    $qr['fields']['UF_CRM_1512476368'] = 'Курорт'; // курорт
    $qr['fields']['UF_CRM_1513330393'] = 'Отель'; // название курорта
    $qr['fields']['UF_CRM_1512476272'] = 'Количество звезд'; // количество звезд в отеле
    $qr['fields']['UF_CRM_1517834443'] = 'тип питания'; // тип питания
    $qr['fields']['OPPORTUNITY'] = '1';
   
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


?>
