<?php
//ini_set('display_errors','On');
//error_reporting('E_ALL');
require_once __DIR__ . '/add_company.php';

echo "Test\n\n";


	$customer["name"] = "ООО Трест7777";
	$customer["user"] = "Иванова";
	$customer["phone"] = "88888";
	$customer["address"] = "г. Урюписк, ул. Ленина, д.666";

	
	$contacts[0]["name"] = "Геннадий Евгеньевич B";
	$contacts[0]["title"] = "главный инженер";
	$contacts[0]["dep"] = "снабжение";
	$contacts[0]["phone"] = "(3452)  прием. 220-096";
	$contacts[0]["email"] = "info@gk-proinvest.ru";
	$contacts[0]["datecr"] = "26.11.2004";
	
	add_real($customer,$contacts);


?>
