<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$dx=$_GET['dx'];
$R1=$_POST['R1'];
$use_mon=$_POST['use_mon'];
$ct=$_GET['ct'];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=С·1 1/5/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("bhc/bhc.php","bhc/bhc_dc.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("�ĳ�","bhc/bhc_dc.php","$user_id");
?>
<?
	echo "<br>==============�ĳ�==============<br>";
	echo ("�����Ǹ��ĳ��������������У����ַǳ���<br>
	");
	
	$npc_org = "�ĳ�";
    	include "../include/list_npc.inc.php";
    	
	echo ("
	<br>
	������Է���==><br>	
	<a href=./bhc.php>����֡�<a/><br>
	");
?>
<?
if($dx == 1){
	include "../inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon,yun FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	$my_yun = mysql_result($my_info,0,"yun");
	
	$mon_num = intval($use_mon);
	if($mon_num > 100 || $mon_num <= 0 ){
		echo "<br><font color=green>��������ȷ�Ľ�Ǯ����������5���ϡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=bhc_dc.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_mon < $mon_num){
		echo "<br><font color=green>��û����ô��Ǯ�ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=bhc_dc.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= $use_mon;
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
		
	$res = rand(0,20);
	$res = $res%2;
	echo "<br>һ...��...��....��";
	if($res == 0){
		echo "<font color=#FF8040>��</font>";
		$res = "big";
	}else{
		echo "<font color=#808000>С</font>";
		$res = "small";
	}
	
	if($R1 == $res){
		echo "<br>��ϲ������Ӯ�ˣ�";
		$my_mon += $use_mon*2;
		mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	}else	echo "<br>�����ˣ��������ɣ�";	
	mysql_close();
}
if($ct == 1){
	include "../inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon,yun FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	$my_yun = mysql_result($my_info,0,"yun");
	
	$mon_num = intval($use_mon);
	if($mon_num > 1500 || $mon_num <= 0 ){
		echo "<br><font color=green>��������ȷ�Ľ�Ǯ����������5���ϡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=bhc_dc.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_mon < $mon_num){
		echo "<br><font color=green>��û����ô��Ǯ�ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=bhc_dc.php\">";
		mysql_close();
		exit();
	}
	$my_mon -= $use_mon;
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	
	$res = rand(0,40);
	echo "<br>һ...��...��....������....";
	if($res >= 10 && $res <= 20){
		echo "<font color=#8ED2E1>ţ</font>";
		$res = "niu";
	}else	if($res >= 0 && $res < 10){
		echo "<font color=#70E2B8>��</font>";
		$res = "ma";
	}else	if($res >= 20 && $res < 30){
		echo "<font color=#808000>��</font>";
		$res = "zhu";
	}else	if($res >= 30 && $res < 40){
		echo "<font color=#619A8C>��</font>";
		$res = "yang";
	}
	
	if($R1 == $res){
		echo "<br>��ϲ������Ӯ�ˣ�";
		$my_mon += $use_mon*3;
		mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	}else	echo "<br>�����ˣ��������ɣ�";
	mysql_close();
}
?>
<center>
�Ĵ�С X2
<hr width=80%>
<form action=bhc_dc.php?dx=1 method=post>
Ѻ��<input type="radio" value="big" checked name="R1">ѺС<input type="radio" value="small" name="R1">
<br>Ǯ��<input type=text size=4 name=use_mon>(���100)<br>
<input type="submit" value="�� ��" name="B1" style="font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633"></td>
</form>
���ͷ X3
<hr width=80%>
<form action=bhc_dc.php?ct=1 method=post>
��<input type="radio" value="ma" checked name="R1">ţ<input type="radio" value="niu" name="R1">
��<input type="radio" value="zhu" name="R1">��<input type="radio" value="yang" name="R1">
<br>Ǯ��<input type=text size=4 name=use_mon>(���1500)<br>
<input type="submit" value="�� ��" name="B1" style="font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633"></td>
</form>