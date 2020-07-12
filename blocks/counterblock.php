<?php

function disp_block_counter()
{
	 global $xoopsConfig;
	 $block = array();
	 
	 $digitstxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/digits.txt";
	 $imgExtensiontxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/imgExtension.txt";
	 $minDigitstxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/minDigits.txt";
	 $counttxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/count.txt";
	 $count_daytxt =  "" . XOOPS_ROOT_PATH . "/modules/counter/cache/count_day.txt";
	 $count_datetxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/count_date.txt";
	 
	 
   $block['content'] = '<center><nobr>';
$digits_file = $digitstxt;
if (file_exists($digits_file)) {
    } else {
    $digits_fil=fopen("$digitstxt","w+");
    fputs($digits_fil,"digits");
    fclose ($digits_fil);
}
   $imgExtension_file = $imgExtensiontxt;
if (file_exists($imgExtension_file)) {
    } else {
    $imgExtension_fil=fopen("$imgExtensiontxt","w+");
    fputs($imgExtension_fil,"gif");
    fclose ($imgExtension_fil);
}
  $minDigits_file = $minDigitstxt;
if (file_exists($minDigits_file)) {
    } else {
    $minDigits_fil=fopen("$minDigitstxt","w+");
    fputs($minDigits_fil,"4");
    fclose ($minDigits_fil);
} 	
  $file = $counttxt;
if (file_exists($file)) {
    } else {
    $fil=fopen("$counttxt","w+");
    fputs($fil,"1");
    fclose ($fil);
}
$day_file = $count_daytxt;
if (file_exists($day_file)) {
    } else {
    $xx_fil=fopen("$count_daytxt","w+");
    fputs($xx_fil,"1");
    fclose ($xx_fil);
}
$today=date("z");
$date_file = $count_datetxt;
if (file_exists($date_file)) {
    } else {
    $yy_fil=fopen("$count_datetxt","w+");
    fputs($yy_fil,$today);
    fclose ($yy_fil);
}
    $fp_date = fopen($date_file, "r");
	  $s_date = fread($fp_date, filesize($date_file));
	  fclose($fp_date);
   if ( $today > $s_date ) {
		$yy_fil=fopen("$count_datetxt","w+");
    fputs($yy_fil,$today);
    fclose ($yy_fil);
    $xx_fil=fopen("$count_daytxt","w+");
    fputs($xx_fil,"1");
    fclose ($xx_fil);
	 }  	
	$fp_count = fopen($file, "r");
	$count = fread($fp_count, filesize($file));
	fclose($fp_count);
  $fp_day = fopen($day_file, "r");
  $s_day = fread($fp_day, filesize($day_file));
  fclose($fp_day);
	$counter_c = $_COOKIE["X1258963214568"];
	$value = "1";   	
if (!$counter_c) {
    setcookie ("X1258963214568", $value);
		$is_old = 0;
} else {		
		$is_old = 1;
}	
if (!$is_old) {
		$count++; 		
		$fp_count = fopen($file, "w");
		fputs($fp_count, $count);
		fclose($fp_count); 		
		$s_day++; 		
		$fp_day = fopen($day_file, "w");
		fputs($fp_day, $s_day);
		fclose($fp_day);		
}  	
	$fp_minDigits = fopen($minDigits_file, "r");
	$minDigits = fread($fp_minDigits, filesize($minDigits_file));
	fclose($fp_minDigits); 	
	$fp_imgExtension = fopen($imgExtension_file, "r");
	$imgExtension = fread($fp_imgExtension, filesize($imgExtension_file));
	fclose($fp_imgExtension); 	
	$fp_digits = fopen($digits_file, "r");
	$digits = fread($fp_digits, filesize($digits_file));
	fclose($fp_digits); 	
	$block['content'] .= "<b>"._COUNTER_TODAY."</b><br /><br />"; 	
	$x_digits = strlen($s_day);  	
	if ($minDigits && $x_digits < $minDigits) { 	
	$diff = $minDigits - $x_digits; 	
	for ($i = 0; $i < $diff; $i++) {
	$s_day = "0" . $s_day;
	}		
	$x_digits = $minDigits;
	} 	
	for ($i = 0; $i < $x_digits; $i++) { 		
	$digit = substr("$s_day", $i, 1);		
	$block['content'] .= "<img src=" . XOOPS_URL . "/modules/counter/images/$digits/$digit.$imgExtension>";  		
	}		
  $block['content'] .= "<br /><br /><b>"._COUNTER_TOTAL."</b><br /><br />";
	$y_digits = strlen($count);  	
	if ($minDigits && $y_digits < $minDigits) {  		
		$diff = $minDigits - $y_digits;   		
		for ($i = 0; $i < $diff; $i++) {
			$count = "0" . $count;
		}  	
		$y_digits = $minDigits;
	}
	for ($i = 0; $i < $y_digits; $i++) { 		
		$digit = substr("$count", $i, 1); 	
		$block['content'] .= "<img src=" . XOOPS_URL . "/modules/counter/images/$digits/$digit.$imgExtension>";   		
	}
	$block['content'] .= '</nobr></center><br />';
	return $block;
}
?>
