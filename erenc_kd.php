<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=С·1 1/5/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/erenc.php","ereng/erenc_kd.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("��ɷ��ׯ","ereng/erenc_kd.php","$user_id");
?>
<?
	echo "<br>==============��ɷ��ׯ==============<br>";
	echo ("���Ƕ��˴������Ŀ͵��ˣ�����Կ�����������Ѫ����Ҳ��֪������ÿ��Ҫ�������ˡ�<br>
	");
	
	$npc_org = "��ɷ��ׯ";
    	include "../include/list_npc.inc.php";
    	
	echo ("
	<br>
	������Է���==><br>	
	<a href=./erenc.php>�����˴塿<a/><br>
	");
?>
<?
if($zf == 1){
	include "../inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon,hpnow,hp,po,ponow FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	$my_hpnow = mysql_result($my_info,0,"hpnow");
	$my_hp = mysql_result($my_info,0,"hp");
	$my_po = mysql_result($my_info,0,"po");
	$my_ponow = mysql_result($my_info,0,"ponow");
	
	if($my_mon < $kefang){
		echo "<br><font color=green>��Ǯ��������ôס�갡��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=kedian.php?battle=1\">";
		mysql_close();
		exit();		
	}
	
	$my_info = mysql_query("SELECT kedian FROM misc WHERE id='$user_id'");
	$my_kedian = mysql_result($my_info,0,"kedian");
	
	if(time() < $my_kedian+1800){
		echo "<br><font color=green>��ס��̫Ƶ���ˣ����ڶ�û���κ�Ч���ˣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=kedian.php?battle=1\">";
		mysql_close();
		exit();	
	}
	
	$my_hpnow = $my_hp*($hf/100) + $my_hpnow;
	$my_ponow = $my_po*($hf/100) + $my_ponow;
	if($my_hpnow > $my_hp) $my_hpnow = $my_hp;
	if($my_ponow > $my_po) $my_ponow = $my_po;
	
	$time = time();
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',mon=mon-'$kefang' WHERE id='$user_id'");
	mysql_query("UPDATE misc SET kedian='$time' WHERE id='$user_id'");
	
	echo "<font color=#B3A43E>��������˯��һ�������������泩.....</font>\n";
	echo "<meta http-equiv=\"refresh\" content=\"3; url=erenc_kd.php\">";
	mysql_close();
	exit();
}
?>
<form>
<select name=xiuxi size=1 onChange="window.location=form.xiuxi.options[form.xiuxi.selectedIndex].value">
<option value=>�ͷ�..</option>
<option value=erenc_kd.php?kefang=150&hf=20&zf=1>�񷿣�150/��/�ָ�20%��</option>
<option value=erenc_kd.php?kefang=520&hf=40&zf=1>�·���520/��/�ָ�40%��</option>
<option value=erenc_kd.php?kefang=1350&hf=60&zf=1>�з���1350/��/�ָ�60%��</option>
<option value=erenc_kd.php?kefang=1950&hf=80&zf=1>���Ϸ���1950/��/�ָ�80%��</option>
</select>
</form>