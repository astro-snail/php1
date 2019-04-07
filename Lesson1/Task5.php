<?php
    $a = 5;
	$b = 7;
	
	echo "a = $a\n";
	echo "b = $b\n";
	
	$a += $b;
	
	$b = $a - $b;
	$a = $a - $b;
	
	echo "a = $a\n";
	echo "b = $b\n";
?>