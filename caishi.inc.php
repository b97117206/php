<?
/*
===============
=����������ʯ��
=
===============
*/
	include "./inc/db.inc.php";
	include "./inc/resume.inc.php";
	
	renwu_resume($user_id,time());
	
	$my_info = mysql_query("SELECT hpnow,ponow,str,exp FROM renwu_member WHERE id='$user_id'");
	$my_hpnow = mysql_result($my_info,0,"hpnow");
	$my_ponow = mysql_result($my_info,0,"ponow");
	$my_str = mysql_result($my_info,0,"str");
	$my_exp = mysql_result($my_info,0,"exp");
	
	if($my_exp > 8000){
		echo "<br><font color=green>������һ����������ˣ���Щ�򵥵Ĺ����Ͳ��ø��ˣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_str < 20){
		echo "<br><font color=green>������ʯͷ�Ĺ��߶��ò�������ô�������������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_hpnow < 120 || $my_ponow < 40){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ����Ĺ�����","�㿴��ɽ����һ����ʯͷ�������������Ǵ󰡡�",
			"���������ӿ�ʼһ��һ������ʯͷ����","'��Ҫ͵������'�ϰ�������",
			"��ʯͷ���������ˡ�",
			"��Ҫ����ˣ�����컹�ǸɵĲ�����",
			"������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=#4F9BA2>".$action[$i]."</font><br><br>\n";
	}
	
	
	$need_hp = 140 - $my_str;
	if($need_hp < 70) $need_hp = 70;
	$my_ponow -= 40;
	$my_hpnow -= $need_hp;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+110 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���110��Ǯ��</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>