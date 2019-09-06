<?php
//ini_set('display_errors','On');
//error_reporting('E_ALL');
$ini = parse_ini_file('config');
require_once __DIR__ . '/add_company.php';

$srv_ib =  $ini['srv_ib'];

//$srv_ib = "192.168.220.130:c:\at\quicksales.gdb";
echo "Hello\n\n";

$dbh = ibase_connect($srv_ib, "SYSDBA", "masterkey");
$stmt = 'SELECT customer.idcust, customer.iduser, customer.company, users.name, customer.fax, customer.address, customer.city FROM customer,users where customer.iduser=users.iduser';
$sth = ibase_query($dbh, $stmt);
$count = 0;

while ($row = ibase_fetch_row($sth)) {
	$cust = $row[0];
	$user = $row[1];
	//echo "Company: ".iconv("CP1251","UTF-8",$row[2])."  ".iconv("CP1251","UTF-8",$row[3])."\n";
    //echo "Company: ";
	$customer["name"] = trim(iconv("CP1251","UTF-8",$row[2]));
	$customer["user"] = trim(iconv("CP1251","UTF-8",$row[3]));
	$customer["phone"] = trim(iconv("CP1251","UTF-8",$row[4]));
	$customer["address"] = trim(iconv("CP1251","UTF-8",$row[6]))." ".trim(iconv("CP1251","UTF-8",$row[5]));

	//Contacts
	$q_cont = "select contact_name, contact_title, contact_dep, contact_phone, contact_email, datecr from contacts where idcust=".$cust;
	$s_cont = ibase_query($dbh, $q_cont);
	
	//echo "Contacts\n";
	$i = 0;
	$contacts = array();
	while ($row_c = ibase_fetch_row($s_cont)) {
			//echo "---- ".iconv("CP1251","UTF-8",$row_c[0])." ".iconv("CP1251","UTF-8",$row_c[2])."  ".iconv("CP1251","UTF-8",$row_c[3])."    ".iconv("CP1251","UTF-8",$row_c[4])."\n";
			$contacts[$i]["name"] = trim(iconv("CP1251","UTF-8",$row_c[0]));
			$contacts[$i]["title"] = trim(iconv("CP1251","UTF-8",$row_c[1]));
			$contacts[$i]["dep"] = trim(iconv("CP1251","UTF-8",$row_c[2]));
			$contacts[$i]["phone"] = trim(iconv("CP1251","UTF-8",$row_c[3]));
			$contacts[$i]["email"] = trim(iconv("CP1251","UTF-8",$row_c[4]));
			$contacts[$i]["datecr"] = trim(iconv("CP1251","UTF-8",$row_c[5]));
			
			$i++;
		
	}	
	ibase_free_result($q_cont);

	//History
	$q_hist = "select history.note, history.datecr, users.name from history, users where history.iduser=users.iduser and idcust=".$cust;
	$s_hist = ibase_query($dbh, $q_hist);
	//echo "History\n";
	$history = array();
	$i = 0;
	while ($row_h = ibase_fetch_row($s_hist)) {
			//echo "---- ".iconv("CP1251","UTF-8",$row_h[0])." ".iconv("CP1251","UTF-8",$row_h[1])."  ".iconv("CP1251","UTF-8",$row_h[2])."\n";
			$history[$i]["note"] = iconv("CP1251","UTF-8",trim($row_h[0]));
			$history[$i]["datecr"] = iconv("CP1251","UTF-8",$row_h[1]);
			$history[$i]["user"] = iconv("CP1251","UTF-8",$row_h[2]);
			$i++;
		
	}	
	ibase_free_result($q_hist);
	
	//add_test($customer, $contacts, $history);
	add_real($customer, $contacts, $history);
	
	$count++;
	if($count == 10){
		ibase_free_result($sth);
		ibase_close($dbh);	
		exit("Exit!!!");
		}
	
	echo "____________________________________________\n";
	
}
ibase_free_result($sth);
ibase_close($dbh);

?>
