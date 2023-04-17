<?php
header('refresh: 3;url="/dy_temp_chart.php"');
require_once dirname(__FILE__) . '/Phpmodbus/ModbusMaster.php';
	$modbus = new ModbusMaster("192.168.198.175", "TCP");
    $recData = $modbus->readMultipleRegisters(1, 0, 3);
	//$h = base_convert($recData[0], 10, 16);
	$C = base_convert(base_convert($recData[2]*256, 10, 16), 16, 10);
	//$F = base_convert(base_convert($recData[4]*256, 10, 16), 16, 10);
	//$humidity = (base_convert($h*100, 16, 10)+$recData[1])*0.01;
	$Celsius = ($C+$recData[3])*0.01;
	//$Fahrenheit = ($F+$recData[5])*0.01;
	echo $Celsius;
?>