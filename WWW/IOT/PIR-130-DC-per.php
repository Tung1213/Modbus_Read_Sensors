<?php
header('refresh: 10;url="/PIR-130-DC-per.php"');
require_once dirname(__FILE__) . '/Phpmodbus/ModbusMaster.php';

$modbus = new ModbusMaster("192.168.198.175", "UDP");
try {
    // FC 1
    $recData = $modbus->readCoils(160, 00000, 1);
	//var_dump($recData); 
	if($recData[0]==true)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}
catch (Exception $e) {
	
}

?>