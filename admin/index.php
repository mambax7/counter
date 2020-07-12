<?php
  include '../../../include/cp_header.php';
  include 'include.php';
  
   $digitstxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/digits.txt";
   $imgExtensiontxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/imgExtension.txt";
	 $minDigitstxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/minDigits.txt";
	 $counttxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/count.txt";
	 $count_daytxt =  "" . XOOPS_ROOT_PATH . "/modules/counter/cache/count_day.txt";
	 $count_datetxt = "" . XOOPS_ROOT_PATH . "/modules/counter/cache/count_date.txt";
	 
if ( file_exists("../language/".$xoopsConfig['language']."/admin.php") ) {
	include "../language/".$xoopsConfig['language']."/admin.php";
  } else {
	include "../language/english/admin.php";
}

if($save == "goforit"){
  $file = $counttxt;
  $fp_count = fopen($file, "w");
  fputs($fp_count, $count);
  fclose($fp_count);
  $day_file = $count_daytxt;
  $fp_day = fopen($day_file, "w");
	fputs($fp_day, $s_day);
	fclose($fp_day); 	
	$minDigits_file = $minDigitstxt;
  $fp_minDigits = fopen($minDigits_file, "w");
	fputs($fp_minDigits, $minDigits);
	fclose($fp_minDigits);	
  $imgExtension_file = $imgExtensiontxt;
  $fp_imgExtension = fopen($imgExtension_file, "w");
	fputs($fp_imgExtension, $imgExtension);
	fclose($fp_imgExtension); 	
	$digits_file = $digitstxt;
  $fp_digits = fopen($digits_file, "w");
	fputs($fp_digits, $digits);
	fclose($fp_digits); 	
  redirect_header( "", 2, _MD_DBUPDATED );
exit();


}else{


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
    $fp_minDigits=fopen("$minDigitstxt","w+");
    fputs($fp_minDigits,"4");
    fclose ($fp_minDigits);
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

  $fp_count = fopen($file, "r");
  $count = fread($fp_count, filesize($file));
  fclose($fp_count);
  $fp_day = fopen($day_file, "r");
  $s_day = fread($fp_day, filesize($day_file));
  fclose($fp_day);
	$fp_minDigits = fopen($minDigits_file, "r");
	$minDigits = fread($fp_minDigits, filesize($minDigits_file));
	fclose($fp_minDigits);
	$fp_imgExtension = fopen($imgExtension_file, "r");
	$imgExtension = fread($fp_imgExtension, filesize($imgExtension_file));
	fclose($fp_imgExtension);
	$fp_digits = fopen($digits_file, "r");
	$digits = fread($fp_digits, filesize($digits_file));
	fclose($fp_digits);
	
xoops_cp_header();
OpenTable();
  echo"<form name=\"FormName\" action=\"\" method=\"post\">";
  echo"<table border=\"0\" cellpadding=\"0\" cellspacing=\"2\" >";
  echo"<tr>";
  echo"<td colspan=\"2\" align=\"left\"><b>"._MD_TITLE."</b><br /><br /></td>";
	echo"</tr>";
	echo"<tr>";
	echo"<td><nobr><b>"._MD_TODAY."</b>  </nobr></td>";
	echo"<td><input type=\"text\" name=\"s_day\" size=\"20\" value=\"$s_day\"></td>";
	echo"</tr>";
  echo"<tr>";
	echo"<td><nobr><b>"._MD_TOTAL."</b>  </nobr></td>";
	echo"<td><input type=\"text\" name=\"count\" size=\"20\" value=\"$count\"></td>";
	echo"</tr>"; 	
	echo"<tr>";
  echo"<td colspan=\"2\" align=\"left\"><br />"._MD_DIG."<br /></td>";
	echo"</tr>"; 	
	echo"<tr>";
	echo"<td><input type=\"text\" name=\"minDigits\" size=\"10\" value=\"$minDigits\"></td>";
	echo"<td></td>";
	echo"</tr>"; 	
	echo"<tr>";
  echo"<td colspan=\"2\" align=\"left\"><br />"._MD_IMGEXT."<br /></td>";
	echo"</tr>"; 	
	echo"<tr>";
	echo"<td><input type=\"text\" name=\"imgExtension\" size=\"10\" value=\"$imgExtension\"></td>";
	echo"<td></td>";
	echo"</tr>"; 	
	echo"<tr>";
  echo"<td colspan=\"2\" align=\"left\"><br />"._MD_DIGITS."<br /></td>";
	echo"</tr>";  	
	echo"<tr>";  	
	echo"<td colspan=\"2\" align=\"left\">";
  LIST_DIGITS($digits,$imgExtension);
  echo"</td>";
	echo"</tr>";    	
	echo"<tr>";
	echo"<td></td>";
	echo"<td align=\"right\"><input type=\"submit\" name=\"submitButtonName\" value=\""._MD_SAVE."\"></td>";
	echo"</tr>";
	echo"</table>";
	echo"<input type=\"hidden\" value=\"goforit\" name=\"save\">";
	echo"</form>";
CloseTable();
xoops_cp_footer();
}

?>
