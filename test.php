<?php
//ini_set('display_errors','On');
//error_reporting('E_ALL');
require_once __DIR__ . '/add_company.php';

echo "Test\n\n";


	$customer["name"] = "ООО Трест999";
	$customer["user"] = "Иванова";
	$customer["phone"] = "5454545";
	$customer["address"] = "г. Урюписк, ул. Ленина, д.6554";

	
	$contacts[0]["name"] = "Сергей Сергеич";
	$contacts[0]["title"] = "главный инженер";
	$contacts[0]["dep"] = "снабжение";
	$contacts[0]["phone"] = "(3452)  прием. 122-096";
	$contacts[0]["email"] = "info@gk-proinvest.ru";
	$contacts[0]["datecr"] = "26.11.2005";
	
	$history[0]["note"] = "Сегодня на РСК были направлены документы отгрузочные, . от 06.06.2016г.  ТН 42.СФ 42,ТН 43,СФ 43 Продукция закупается в Галифаксе. Юрий занимается их закупом.";
	
	add_real($customer,$contacts, $history);


?>
