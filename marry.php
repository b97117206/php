<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$zhuce=$_GET['zhuce'];
$B1=$_POST['B1'];
$lihun=$_GET['lihun'];
$kai=$_GET['kai'];
$list=$_GET['list'];
$marry=$_GET['marry'];
$duixiang_id=$_POST['duixiang_id'];
$qiuhun_xy=$_POST['qiuhun_xy'];

include "./inc/attest.inc.php";

/*
==============
=���ϵͳ
=��Ԫ2001��12��11��
==============
*/
include "inc/config.inc.php";
include "inc/style.inc.php";

include "./include/area_now_ct.inc.php";
$way = array("marry.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("����ׯ","marry.php","$user_id");
?>
<p align=center><img src=<? echo $pic3_url."/xiake/xiake02.jpg"; ?> border=0></img>
<h3><p align=center><font color=red><����>����ׯ</font></h3>
<hr width=80%>
<?
if($zhuce == 1){
if($B1 == "����"){
	include "./inc/db.inc.php";
	
	$marry_me = mysql_query("SELECT id FROM misc WHERE duixiang='$user_id'");
	$marry_me_info = @mysql_result($marry_me,0,"id");
	
	echo "<br><font color=red>��ͬ����".$marry_me_info."����飡</font>\n";
	
	mysql_query("UPDATE misc SET duixiang='$marry_me_info' WHERE id='$user_id'");
	
	echo "<br><font color=red>��ϲ���ǳ�Ϊ�˺Ϸ����ޣ���ȥ�ھ�ϯ��..........</font>\n";
	
	$notice_channel = "���";
	$notice_to = "�ɻ�";
	include "./include/notice.inc.php";
	mysql_close();
	exit();	
}
if($B1 == "����"){
	include "./inc/db.inc.php";
	
	$marry_me = mysql_query("SELECT id FROM misc WHERE duixiang='$user_id'");
	$marry_me_info = @mysql_result($marry_me,0,"id");
	
	echo "<br><font color=black>�㲻ͬ����".$marry_me_info."��飡</font>\n";
	echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
	
	mysql_query("UPDATE misc SET duixiang='' WHERE id='$marry_me_info'");
	$notice_channel = "���";
	$notice_to = "�������";
	include "./include/notice.inc.php";
	mysql_close();
	exit();
}}
if($lihun == 1){
	if($lihun == 1 && $kai != 2){
		echo "<form action=marry.php?lihun=1&kai=2 method=post>\n";
		echo "<p align=center><br><input type=submit name=B1 value=��� style=\"font-family: ����_GB2312; border-style: ridge; border-width: 0; background-color: #99CC00\">\n";
		echo "</form>\n";
		exit();
	}

	include "./inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	
	$my_mon = mysql_result($my_info,0,"mon");
	
	if($my_mon < 1000){
		echo "��������Ѳ���Ŷ��\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= 1000;
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	
	$marry_me = mysql_query("SELECT id FROM misc WHERE duixiang='$user_id'");
	$marry_me_info = @mysql_result($marry_me,0,"id");
	
	mysql_query("UPDATE misc SET duixiang='' WHERE id='$user_id' OR id='$marry_me_info'");
	
	echo "<font color=black>�������������ϣ�</font>\n";
	$notice_channel = "���";
	$notice_to = "���";
	include "./include/notice.inc.php";
	mysql_close();
	exit();	
}
if($list == 1){
	include "./inc/db.inc.php";
	
	$my_info = mysql_query("SELECT sex,mon FROM renwu_member WHERE id='$user_id'");
	
	$my_sex = mysql_result($my_info,0,"sex");
	$my_mon = mysql_result($my_info,0,"mon");
	
	if($my_mon < 500){
		echo "��ѯ�Ѷ�û�У���ô���Լ��������˰���\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= 500;
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	
	if($my_sex == "����"){
		$list_info = mysql_query("SELECT id,name,org,cha,nick,icon FROM renwu_member WHERE sex='��Ů'");
		$d_sex = "��Ů";
	}else{
		$list_info = mysql_query("SELECT id,name,org,cha,nick FROM renwu_member WHERE sex='����'");
		$d_sex = "����";
	}
	$num_list = mysql_num_rows($list_info);
	
	if($num_list == 0){
		echo "�ܱ�Ǹ�����㣬����û�к���������µ��ˣ�\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	echo "<table>\n";
	for($i=0;$i<$num_list;$i++){
		$d_id = mysql_result($list_info,$i,"id");
		$d_name = mysql_result($list_info,$i,"name");
		$d_org = mysql_result($list_info,$i,"org");
		$d_cha = mysql_result($list_info,$i,"cha");
		$d_nick = mysql_result($list_info,$i,"nick");
		$d_icon = mysql_result($list_info,$i,"icon");
		
		echo "<tr><td><img src=".$pic2_url."/".$d_icon.".gif  border=0></img><td><font color=green>".$d_org."��".$d_cha."<font color=blue>".$d_sex."</font>".$d_nick.$d_name."</font></td></tr>\n";
	}	
	
	mysql_close();
	exit();
}
if($marry == 1){
	include "./inc/db.inc.php";
	
	$marry_me = mysql_query("SELECT id FROM misc WHERE duixiang='$user_id'");
	$marry_me_info = @mysql_result($marry_me,0,"id");
	
	if($marry_me_info){
		echo "<form action=marry.php?zhuce=1 method=post>\n";
		
		echo "<br><font color=green>".$marry_me_info."�Ѿ�ע��Ҫ����Ϊ���İ��ˣ���������������</font>\n";
		echo "<br><input type=submit name=B1 value=���� style=\"font-family: ����_GB2312; border-style: ridge; border-width: 0; background-color: #99CC00\">\n";
		echo "<br><input type=submit name=B1 value=���� style=\"font-family: ����_GB2312; border-style: ridge; border-width: 0; background-color: #99CC00\">\n";
		
		echo "</form>\n";
		mysql_close();
		exit();
	}

	echo ("
	<form action=marry.php?marry=2 method=post>
    	���������ʶ���<input name=duixiang_id size=5 type=text><br>
    	���������˵��������<input name=qiuhun_xy size=25 type=text>
    	<input type=submit name=geimon value=�Ǽ�ע�� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">
    	</form>
	");
	
	exit();
}
if($marry == 2){
	include "./inc/db.inc.php";
	
	$my_info = mysql_query("SELECT sex,mon FROM renwu_member WHERE id='$user_id'");
	
	$my_sex = mysql_result($my_info,0,"sex");
	$my_mon = mysql_result($my_info,0,"mon");
	
	$have_marryed = mysql_query("SELECT count(id) FROM misc WHERE duixiang='$duixiang_id'");
	$have_marryed = mysql_fetch_row($have_marryed);	
	
	if($my_mon < 5000){
		echo "<br><font color=green>���ǰɣ���Ǯ��û��׼���ð���</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	if(empty($duixiang_id)){
		echo "<br><font color=green>��Ҫ��˭�Ǽ�ע�ᰡ��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	if(empty($qiuhun_xy)){
		echo "<br><font color=green>�㲻��û��һ����˵�İɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	if($have_marryed[0]){
		echo "<br><font color=green>����ʮ���ź��ĸ����㣬����������Ѿ�����������ǰ��ע�ᡱ�ˣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	$e_info = @mysql_query("SELECT name,sex FROM renwu_member WHERE id='$duixiang_id'");
	$e_name = @mysql_result($e_info,0,"name");
	$e_sex = @mysql_result($e_info,0,"sex");
	
	if(empty($e_name)){
		echo "<br><font color=green>û��������أ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	if($e_sex == $my_sex){
		echo "<br><font color=red>����ɣ��������ﲻ����ͬ����������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=marry.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= 5000;
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	
	mysql_query("UPDATE misc SET duixiang='$duixiang_id' WHERE id='$user_id'");
	
	mysql_close();
	
	echo $e_name."�Ѿ��Ǽ�ע���Ϊ���δ�鰮�ˣ���ȴ��Է�ͬ�⣬���Ǽ��ɳ�Ϊ�Ϸ����ޣ�\n";
	$notice_channel = "���";
	$notice_to = "���";
	include "./include/notice.inc.php";
	exit();
}
?>
<?
	include "./inc/db.inc.php";
	
	$my_marryed = mysql_query("SELECT duixiang FROM misc WHERE id='$user_id'");
	$my_duixiang = @mysql_result($my_marryed,0,"duixiang");
	
	$npc_org = "����ׯ";
	include "./include/list_npc.inc.php";
	
	if(!$my_duixiang){
		echo "<p align=center><font color=black>�µ������߽�������Ѱ���ղ�֪����</font>\n";
		echo "<hr width=60%>";
		echo "<p align=center><a href=marry.php?list=1>������ܣ��շ�500��</a>\n";
		echo "<p align=center><a href=marry.php?marry=1>���Ǽǣ��շ�5000��</a>\n";		
	}else{
		echo "<p align=center><font color=red>������鴳����������˫˫�����飡</font>\n";
		echo "<hr width=60%>";
		echo "<p align=center><a href=marry.php?lihun=1>�������շ�1000��</a>\n";
	}
	
     include "./include/back_xy.inc.php";
     mysql_close();
     
?>