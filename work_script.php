<?

require_once __DIR__ . '/SimpleXLSX/SimpleXLSX.php';


	function add_comp($mass){
		
		echo $mass['fields']['TITLE']."\n";
		echo $mass['fields']['ADDRESS']."\n";
		
	}


	$qr = array(
        'fields' => array(),
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    );
	$qr['fields']['OPENED'] = 'Y';
	$qr['fields']['COMPANY_TYPE'] = 'Клиент';
	
	if ( $xlsx = SimpleXLSX::parse('CUSTOMER.xlsx')) {
	//    print_r( $xlsx->rows() );
	//    echo $xlsx->getCell(0, 'B2');
		foreach( $xlsx->rows() as $r => $value ) {
			//echo "{$value[3]} {$value[4]} {$value[5]} {$value[6]} \n";
			if($value[3]){
				$qr['fields']['TITLE'] = trim($value[3]);
				$qr['fields']['ADDRESS'] = trim($value[6]).", ".trim($value[5]);
			}
			
			
			add_comp($qr);
			
		}

	} else {
		echo SimpleXLSX::parse_error();
	}
	    

	

?>
