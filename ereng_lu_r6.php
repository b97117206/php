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
$way = array("ereng/ereng_dong1.php","ereng/ereng_lu_r5.php","ereng/ereng_lu_r6.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("���˹���·6","ereng/ereng_lu_r6.php","$user_id");
?>
<?
	echo "<br>==============���˹���·6==============<br>";
	echo ("��ǰ������Խ��Խ���ˣ�������Ҫ�����˹�ɽ���ˡ�<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(10);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_lu_r5.php>�����˹���·5��<a/>
	<a href=./ereng_dong1.php>�����˹�ɽ����<a/>
	");
?>