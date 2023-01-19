<?php 

 $arr=file("email.txt");
// $str=implode(" ",$arr);
// $arr=explode(" ",$str);
 $arrleng=count($arr);
for($i=0;$i<$arrleng;$i++){
    $myarr = explode(",",$arr[$i]);
echo "Visit Day".$myarr[0] . "<br>";
echo"IP ::".$myarr[1] . "<br>";
echo"Email:".$myarr[2] . "<br>";
echo"Name:".$myarr[3] . "<br>";
echo "<hr>";
};




?>