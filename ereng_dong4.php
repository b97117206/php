<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹���· 1/8/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_dong3.php","ereng/ereng_dong4.php","ereng/ereng_dong5.php",
"ereng/ereng_dong6.php","ereng/ereng_dong7.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("����","ereng/ereng_dong4.php","$user_id");
?>
<?
	echo "<br>==============���ڲ�·2==============<br>";
	echo ("
	�����ƺ���һ�����ڵĲ�·����ǰ������·�����ߡ�<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";
	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong3.php>�����ڲ�·1��<a/>
	<a href=./ereng_dong7.php>�����ڲ�·5��<a/>
	<a href=./ereng_dong6.php>�����ڲ�·4��<a/>
	<a href=./ereng_dong5.php>�����ڲ�·3��<a/>
	");
?>