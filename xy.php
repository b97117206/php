<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$here=$_GET['here'];
$login=$_GET['login'];
$control=$_GET[control];
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
 
?> 	
<script language='JavaScript'>
  	function loadto(page) {
     	parent.main.location.href=page;
	}	
</script>
<?
if($here == 1){
	include "inc/db.inc.php";
	$location_info = mysql_query("SELECT location_id FROM misc WHERE id='$user_id'");
  	$location_id = mysql_result($location_info,0,"location_id");
  	echo "<BODY onLoad=\"loadto('$location_id')\">";
  	mysql_close();
  	exit();
}
?> 
<?

if($login == 1){
	//include $inc_url."/db.inc.php";
	include "./inc/db.inc.php";
	//echo "����user_id:".$_SESSION["user_id"];
	
	$location_info = mysql_query("SELECT location_id FROM misc WHERE id='$user_id'");  	
	$location_id = mysql_result($location_info,0,"location_id");
	echo "<frameset cols=\"60%,*\">\n";
	echo "<frameset rows=\"*,55%\">\n";
	echo "<frame name=contents target=main src=xy.php?control=1>\n";
        echo "<frame name=contents1 src=./chat/chat.php>\n";
        echo "</frameset>\n";
        echo "<frame name=main src=$location_id>\n";
        echo "</frameset>\n";
        echo "</html>\n";
        
        mysql_close();
}
?>

<?

if($control == 1){	
	include "./inc/style.inc.php";
	include "./inc/db.inc.php";
		
	include "./inc/resume.inc.php";
	
	renwu_resume($user_id,time());

	
	
	//������϶���	
	$user_info = mysql_query("SELECT * FROM renwu_member WHERE id='$user_id'");
	$user_exp = mysql_result($user_info,0,"exp");
	$user_hp = mysql_result($user_info,0,"hp");
	$user_hpnow = mysql_result($user_info,0,"hpnow");
	$user_en = mysql_result($user_info,0,"en");
	$user_ennow = mysql_result($user_info,0,"ennow");
	$user_po = mysql_result($user_info,0,"po");
	$user_ponow = mysql_result($user_info,0,"ponow");
	$user_sex = mysql_result($user_info,0,"sex");
	$user_cha = mysql_result($user_info,0,"cha");
	$user_pos = mysql_result($user_info,0,"pos");
	$user_str = mysql_result($user_info,0,"str");
	$user_zhi = mysql_result($user_info,0,"zhi");
	$user_con = mysql_result($user_info,0,"con");
	$user_spe = mysql_result($user_info,0,"spe");
	$user_pur = mysql_result($user_info,0,"pur");
	$user_icon = mysql_result($user_info,0,"icon");
	$user_org = mysql_result($user_info,0,"org");
	$user_mon = mysql_result($user_info,0,"mon");
	$user_nick = mysql_result($user_info,0,"nick");
	$user_col = mysql_result($user_info,0,"col");
	$user_yun = mysql_result($user_info,0,"yun");
	
	$_SESSION["user_nick"]=$user_nick;
	
	echo "<table border=1 cellpadding=0 cellspacing=0 style=\"border-collapse: collapse\" bordercolor=#111111 width=100% height=77>\n";
	echo "<tr>\n";
	
	echo "<td width=35% height=100 rowspan=10 valign=top>\n";
	echo "<img border=0 src=".$pic2_url."/".$user_icon.".jpg style=\"float: left\">\n";
	//echo "����user_nick:".$user_nick;
	//echo "����user_name:".$user_name;
	echo "[".$user_nick."]<font color=#0000FF>".$user_name."</font>\n";
	
	$my_marry = mysql_query("SELECT duixiang FROM misc WHERE id='$user_id'");
	$my_marryed = @mysql_result($my_marry,0,"duixiang");
	
	if($my_marryed != "" && $user_sex == "����"){
	echo "<br>[����]<font color=#FFCCFF>$my_marryed</font>\n";
	}else if($my_marryed != "" && $user_sex == "Ů��") echo "<br>[�Ϲ�]<font color=#33CC33>$my_marryed</font>\n";
	
	$my_orgnick = mysql_query("SELECT orgnick FROM misc WHERE id='$user_id'");
	$my_orgnicked = @mysql_result($my_orgnick,0,"orgnick");
	
	if($my_orgnicked != "")	echo "<br>[����]<font color=#00CC99>$my_orgnicked</font>\n";
	
	echo "<br><font color=#3366CC>---����---</font>\n";
	echo "<br>[����]<font color=#0000FF>$user_str</font>\n";
	echo "<br>[�ǻ�]<font color=#0000FF>$user_zhi</font>\n";
	echo "<br>[����]<font color=#0000FF>$user_con</font>\n";
	echo "<br>[����]<font color=#0000FF>$user_spe</font>\n";
	echo "<br>[��־]<font color=#0000FF>$user_pur</font>\n";
	echo "<br><font color=#3366CC>---װ��---</font>\n";
	echo "<br>[ͷ]<font color=#0000FF>\n";
	
	$wupin_used = @mysql_query("SELECT name FROM renwu_wupin,zhuangbei_wupin WHERE renwu_wupin.used='Y' AND renwu_wupin.wupinid=zhuangbei_wupin.id AND renwu_wupin.cla='ͷ' AND renwu_wupin.id='$user_id'");
	echo @mysql_result($wupin_used,0,"name");
	
	echo "</font>\n";
	echo "[��]<font color=#0000FF>\n";
	$wupin_used = @mysql_query("SELECT name FROM renwu_wupin,zhuangbei_wupin WHERE renwu_wupin.used='Y' AND renwu_wupin.wupinid=zhuangbei_wupin.id AND renwu_wupin.cla='��' AND renwu_wupin.id='$user_id'");
	echo @mysql_result($wupin_used,0,"name");
	
	echo "</font>\n";
	echo "<br>[��]<font color=#0000FF>\n";
	$wupin_used = @mysql_query("SELECT name FROM renwu_wupin,zhuangbei_wupin WHERE renwu_wupin.used='Y' AND renwu_wupin.wupinid=zhuangbei_wupin.id AND renwu_wupin.cla='��' AND renwu_wupin.id='$user_id'");
	echo @mysql_result($wupin_used,0,"name");
	
	echo "</font>\n";
	echo "[��]<font color=#0000FF>\n";
	$wupin_used = @mysql_query("SELECT name FROM renwu_wupin,zhuangbei_wupin WHERE renwu_wupin.used='Y' AND renwu_wupin.wupinid=zhuangbei_wupin.id AND renwu_wupin.cla='��' AND renwu_wupin.id='$user_id'");
	echo @mysql_result($wupin_used,0,"name");
	
	echo "</font>\n";
		
	echo "</td>\n";
	
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>����</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_hpnow."/".$user_hp."</td>\n";
	
	echo "<td width=250 height=150 rowspan=11 valign=top>\n";
	//�书�б�
	echo "<font color=#3366CC>��ʹ���书��</font>\n";
	
	$wugong_used = @mysql_query("SELECT name FROM renwu_wugong,wugong_gongfu WHERE renwu_wugong.used='Y' AND renwu_wugong.wugongid=wugong_gongfu.id AND renwu_wugong.cla <> '�Ṧ' AND renwu_wugong.cla <> '�ڹ�' AND renwu_wugong.id='$user_id'");
	echo @mysql_result($wugong_used,0,"name");
	
	echo "<br><font color=#3366CC>��ʹ���ڹ���</font>\n";
	$wugong_used = @mysql_query("SELECT name FROM renwu_wugong,wugong_gongfu WHERE renwu_wugong.used='Y' AND renwu_wugong.wugongid=wugong_gongfu.id AND renwu_wugong.cla = '�ڹ�' AND renwu_wugong.id='$user_id'");
	echo @mysql_result($wugong_used,0,"name");
	
	echo "<br><font color=#3366CC>��ʹ���Ṧ��</font>\n";
	
	$wugong_used = @mysql_query("SELECT name FROM renwu_wugong,wugong_gongfu WHERE renwu_wugong.used='Y' AND renwu_wugong.wugongid=wugong_gongfu.id AND renwu_wugong.cla = '�Ṧ' AND renwu_wugong.id='$user_id'");
	echo @mysql_result($wugong_used,0,"name");
	
	echo "<hr align=center width=70%>\n";
	echo "<br><font color=#3366CC>��װ��������</font>\n";
	$wuqi_used = @mysql_query("SELECT name FROM renwu_wuqi,zhuangbei_wuqi WHERE renwu_wuqi.used='Y' AND renwu_wuqi.wuqiid=zhuangbei_wuqi.id AND renwu_wuqi.id='$user_id'");
	echo @mysql_result($wuqi_used,0,"name");
	echo "<hr align=center width=70%>\n";
	echo "<center>";
	echo "<input type='button' value='״̬' onClick=\"parent.contents.location.href='xy.php?control=1'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "<input type='button' value='װ��' onClick=\"parent.main.location.href='wupin_info.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "<input type='button' value='����' onClick=\"parent.main.location.href='wuqi_info.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "<br><input type='button' value='��ѧ' onClick=\"parent.main.location.href='wugong_info.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "<input type='button' value='����' onClick=\"parent.main.location.href='use_neili.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "<input type='button' value='����' onClick=\"parent.main.location.href='wugong_practice.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "<br><input type='button' value='�˳�' onClick=\"parent.main.location.href='quit.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #FFFF99; font-size:8pt\">\n";  	
  	echo "</center>";
  	echo "<hr align=center width=70%>\n";
  	echo "<font color=#3366CC>��������---</font><br>\n";
	$npc_info = @mysql_query("SELECT name,npc_member.id FROM misc,npc_member WHERE npc_member.id=misc.song_to AND misc.id='$user_id'");
	$npc_name = @mysql_result($npc_info,0,"name");
	$npc_id = @mysql_result($npc_info,0,"id");
	if(!empty($npc_name)){
		echo "���Ÿ�".$npc_name."��".$npc_id."��";
	}else echo "���κ�����";
	echo "</td>\n";
	
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>����</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_ennow."/".$user_en."</td>\n";
	echo "</tr>\n";
  	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>����</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_ponow."/".$user_po."</td>\n";
	echo "</tr>\n";  	
 	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>����</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_exp."</td>\n";
	echo "</tr>\n";
  	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>��Ǯ</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_mon."</td>\n";
	echo "</tr>\n";
  	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>����</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_pos."</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>�Ը�</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_cha."</td>\n";
	echo "</tr>\n";
  	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>���</td>\n";
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_org."</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>��ò</td>\n";
	if($user_exp > 100000)
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_col."</td>\n";
	else
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>**</td>\n";
	echo "</tr>\n";
	echo "<tr>\n";
	echo "<td width=50 height=16 bgcolor=#99CC00 align=center>���� </td>\n";
	if($user_exp > 150000)
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>".$user_yun."</td>\n";
	else
	echo "<td width=40 height=16 bgcolor=#CCCC00 align=center>**</td>\n";
	echo "</tr>\n";
  	echo "<tr>\n";
  	
  	echo "<td width=25% height=50 valign=top><font color=#3366CC>���ѶϢ-----</font>\n";
  	if($user_org != "����֯"){
  	$org_info = mysql_query("SELECT orginfo FROM org WHERE orgname='$user_org'");
  	echo "<br>".mysql_result($org_info,0,"orginfo");
  	}
  	echo "</td>\n";
  	
  	echo "<td width=25% height=50 colspan=2 valign=top><font color=#3366CC>����ѶϢ---</font>\n";
  	$person_info = mysql_query("SELECT person_info FROM misc WHERE id='$user_id'");
  	echo "<br>".mysql_result($person_info,0,"person_info");
  	echo "</td>\n";
  	  	
  	echo "</tr>\n";
  	echo "</table>\n"; 	
  	
  	echo "<input type='button' value='�������' onClick=\"parent.main.location.href='here_pp.php'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCFFFF; font-size:8pt\">\n";  	
  	echo "<input type='button' value='����λ��' onClick=\"parent.main.location.href='xy.php?here=1'\" style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCFFFF; font-size:8pt\">\n";  	
  	mysql_close();
}
?>
<?
if($battle == 1){
	include "$inc_url/style.inc.php";
	echo "<pre>\n";
	echo "===============================================================\n";
	echo "=             ����(Ver 0.9.0) ʹ�ù���汾(Ver 0.2)         =\n";
	echo "=                                                             =\n";
	echo "=        ��ϵͳ��Ȩ��ȫ���� ��� δ����� ���ù��� ʹ�� ����  =\n";
	echo "=E-MAIL:wfoxd@cnnetgame.com                                   =\n";
	echo "=http://www.cnnetgame.com                                     =\n";
	echo "===============================================================\n";
	echo "</pre>\n";
}
?>