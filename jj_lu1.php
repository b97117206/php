<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
//�ж�˲��
include "../include/area_now.inc.php";
$way = array("bhc/lu_4.php","dl/jj_lu1.php","dl/jj_lu2.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("����·","dl/jj_lu1.php","$user_id");
?>
<?
	echo "<br>=============����·===============<br>";
	echo ("����һ�������˾�����С·��һֱ���쵽��ɭ���<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(20);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
/*
	$npc_org = "";
    	include "../include/list_npc.inc.php";  
*/
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=../bhc/lu_4.php>���������<a/>
	<a href=./jj_lu2.php>������·��<a/>
	");
?>