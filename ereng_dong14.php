<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹� 1/9/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_dong12.php","ereng/ereng_dong14.php","ereng/ereng_dong15.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("����","ereng/ereng_dong14.php","$user_id");
?>
<?
	echo "<br>==============���ڲ�·12==============<br>";
	echo ("
	ɽ��������ֲ���������а��֮���������������˵�����һ���ܲ��˵ġ�<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";	
    	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong12.php>�����ڲ�·10��<a/>
	<a href=./ereng_dong15.php>��ʯ�ҡ�<a/>
	");
?>