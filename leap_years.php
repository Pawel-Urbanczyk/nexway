<?php 

/** Define a variables */
$year1 = 2016;
$year2 = 2015;
$year3 = 2000;
$year4 = 1604;
$year5 = 1603;
$year6 = 1600;
$year7 = 0;
$year8 = -4;
$year9 = -100;
$year10 = -400;
$year11 = -401;
$year12 = 'ABCDE';
$year13 = '';
$year14 = null;

$ly = $year2; //Change only a number of variable to see result

/** Creating function which firstly checks whether the variable is an integer and after that checks if the year is leap */
function leap_year($ly){
	if(!is_int($ly)){
		
		echo "Podana wartość nie jest liczbą całkowitą";
		
	}else{
		
		if((($ly % 4 == 0) && ($ly % 100 !== 0)) || ($ly % 400 == 0) ){
			
			echo $ly." jest przestępny";
			
			return true;
			
		}else{
		
			echo $ly." nie jest przestępny";
			
			return false;
			
		}
		
	}

}

leap_year($ly);




?>