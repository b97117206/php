<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$here=$_GET['here'];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˴�С�� (Ver 0.4.0)
=��Ԫ 2002��1��7��
==============
*/
?>
<?
	echo "<br>==============С·==============<br>";
	echo ("���Ƕ��˴���һ��С·������ǰ���߾ͳ����ˡ�
	");
	
	if($here == 1){
		include "../include/area_now.inc.php";
		$way = array("ereng/erenc.php","ereng/erenc_xiao_x.php?here=1");
		area_now($way,$user_id);
		include "../include/location_lu.inc.php";
		up_location("����С·1","ereng/erenc_xiao_x.php?here=1","$user_id");
		$npc_org = "����С·1";
    		include "../include/list_npc.inc.php";
	}
	if($here == 2){
		include "../include/area_now.inc.php";
		$way = array("ereng/erenc.php","ereng/erenc_xiao_x.php?here=2");
		area_now($way,$user_id);
		include "../include/location_lu.inc.php";
		up_location("����С·2","ereng/erenc_xiao_x.php?here=2","$user_id");
		$npc_org = "����С·2";
    		include "../include/list_npc.inc.php";
	}
	if($here == 3){
		include "../include/area_now.inc.php";
		$way = array("ereng/erenc.php","ereng/erenc_xiao_x.php?here=3");
		area_now($way,$user_id);
		include "../include/location_lu.inc.php";
		up_location("����С·3","ereng/erenc_xiao_x.php?here=3","$user_id");
		$npc_org = "����С·3";
    		include "../include/list_npc.inc.php";
	}
	echo ("
	<br>
	������Է���==><br>	
	<a href=./erenc.php>�����˴塿<a/><br>
	");
?>