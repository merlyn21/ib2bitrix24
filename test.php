<?php
//ini_set('display_errors','On');
//error_reporting('E_ALL');
require_once __DIR__ . '/add_company.php';

echo "Test\n\n";


	$customer["name"] = "ООО Тa2222";
	$customer["user"] = "Иванова";
	$customer["phone"] = "9232323232";
	$customer["address"] = "г. Урюписк, ул. Ленина, д.224";

	
	$contacts[0]["name"] = "Сергей Сергеич петроввв";
	$contacts[0]["title"] = "главный инженер";
	$contacts[0]["dep"] = "снабжение";
	$contacts[0]["phone"] = "(3452)  прием. 122-02296";
	$contacts[0]["email"] = "info@gk-proinvest.ru";
	$contacts[0]["datecr"] = "26.11.2007";
	$contacts[0]["title"] = "н-к отдела снабжения";
	
	$contacts[1]["name"] = "Иван Иваныч";
	$contacts[1]["title"] = "главный инженер";
	$contacts[1]["dep"] = "снабжение";
	$contacts[1]["phone"] = "123456789";
	$contacts[1]["email"] = "info@gk.ru";
	$contacts[1]["datecr"] = "26.12.2002";
	$contacts[1]["title"] = "нач. отдела ОМТС";
	
	//echo date(DATE_ISO8601, strtotime($contacts[1]["datecr"]));

	
	$history[0]["note"] = "Сегодня на РСК были направлены документы отгрузочные, . от 06.06.2016г.  ТН 42.СФ 42,ТН 43,СФ 43 Продукция закупается в Галифаксе. Юрий занимается их закупом.";
	$history[0]["datecr"] = "22.12.2009";
	$history[0]["user"] = "Костенков";
	$history[1]["note"] = "А.:Занимаются только прокатом и сталью!";
	$history[1]["datecr"] = "21.12.2009";
	$history[1]["user"] = "Костенков";
	
	add_real($customer,$contacts, $history);


?>
