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
$way = array("ereng/ereng_dong6.php","ereng/ereng_dong10.php","ereng/ereng_dong9.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("����","ereng/ereng_dong9.php","$user_id");
?>
<?
	echo "<br>==============���ڲ�·7==============<br>";
	echo ("
	ɽ��������ֲ���������а��֮���������������˵�����һ���ܲ��˵ġ�<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";	
    	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong6.php>�����ڲ�·4��<a/>
	<a href=./ereng_dong10.php>�����ڲ�·8��<a/>
	");
?>