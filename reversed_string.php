<?php

/** Define a variables */
$string1 = 'Abcdefghijk';
$string2 = 'Abcdefghijkl';
$string3 = 'Abcdefghijkl\n';
$string4 = '';
$string5 = 'Abcd\nefgh\rijkl\tmnop';
$string6 = 'Zażółć gęślą jaźń';
$string7 = 'Quick brown fox\0 jumped over the lazy dog';
$string8 = '读万卷书不如行万里路';

$word = $string1; //Change only a number of variable to see result


/** Creating function with reversed loop displaying letters descending in layout of string */

function reversed_word($word){
	
	/** Creating variables with information about length of string */
	$string_lenght = strlen($word);
	
	for($i=($string_lenght-1); $i>=0; $i--){
		
		echo $word[$i];
		
	}
	
}

reversed_word($word);



?>
