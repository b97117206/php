<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$here=$_GET['here'];

include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
==============
=С�� (Ver 0.4.0)
=��Ԫ 2002��1��2��
==============
*/
?>
<?
	echo "<br>==============С��==============<br>";
	echo ("���ǳ���һ��С�����Կ��������в��ٵ��̣��������������������ϴ�������������
	");
	
	if($here == 1){
		include "./include/area_now_ct.inc.php";
		$way = array("xiao_x.php?here=1","xy_city.php");
		area_now($way,$user_id);
		include "./include/location.inc.php";
		up_location("С��1","xiao_x.php?here=1","$user_id");
		$npc_org = "С��1";
    		include "./include/list_npc.inc.php";  
	}
	if($here == 2){
		include "./include/area_now_ct.inc.php";
		$way = array("xiao_x.php?here=2","xy_city.php");
		area_now($way,$user_id);
		include "./include/location.inc.php";
		up_location("С��2","xiao_x.php?here=2","$user_id");
		$npc_org = "С��2";
    		include "./include/list_npc.inc.php";  
	}
	if($here == 3){
		include "./include/area_now_ct.inc.php";
		$way = array("xiao_x.php?here=3","xy_city.php");
		area_now($way,$user_id);
		include "./include/location.inc.php";
		up_location("С��3","xiao_x.php?here=3","$user_id");
		$npc_org = "С��3";
    		include "./include/list_npc.inc.php";  
	}
	if($here == 4){
		include "./include/area_now_ct.inc.php";
		$way = array("xiao_x.php?here=4","xy_city.php");
		area_now($way,$user_id);
		include "./include/location.inc.php";
		up_location("С��4","xiao_x.php?here=4","$user_id");
		$npc_org = "С��4";
    		include "./include/list_npc.inc.php";  
	}
	if($here == 5){
		include "./include/area_now_ct.inc.php";
		$way = array("xiao_x.php?here=5","xy_city.php");
		area_now($way,$user_id);
		include "./include/location.inc.php";
		up_location("С��5","xiao_x.php?here=5","$user_id");
		$npc_org = "С��5";
    		include "./include/list_npc.inc.php";  
	}
	include "./include/back_xy.inc.php";
?>