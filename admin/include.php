<?php
function LIST_DIGITS($digits,$imgExtension){
  $mappe = "../images/";
  $columns = 1;
  echo"<table border='0' width='100%'><tr>";
  $i=0;
  $handle=opendir($mappe);
  while (false!==($file = readdir($handle))) {
  if ($file != "." && $file != "..") {
  if($file == "index.html"){}else{
  if($file == $digits){
  print "<td align=\"left\" valign=\"top\"><nobr>
 <input type=\"radio\" value=\"$file\" name=\"digits\" checked />
 <img src=\"../images/$file/0.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/1.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/2.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/3.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/4.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/5.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/6.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/7.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/8.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/9.$imgExtension\" border=\"0\" /></nobr><hr>";
 }else {
 print "<td align=\"left\" valign=\"top\"><nobr>
 <input type=\"radio\" value=\"$file\" name=\"digits\" />
 <img src=\"../images/$file/0.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/1.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/2.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/3.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/4.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/5.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/6.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/7.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/8.$imgExtension\" border=\"0\" />
 <img src=\"../images/$file/9.$imgExtension\" border=\"0\" /></nobr><hr>";
 }
 }
 ++$i;
 if($i == $columns) { print "</tr><tr>";
 $i = 0;
 }
 }
 }
 closedir($handle);
 echo"</tr></table>";
 }
?>
