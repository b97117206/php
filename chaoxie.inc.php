<?
/*
===============
=����������дԱ
=
===============
*/
	include "./inc/db.inc.php";
	include "./inc/resume.inc.php";
	
	renwu_resume($user_id,time());
	
	$my_info = mysql_query("SELECT hpnow,ponow,zhi,exp FROM renwu_member WHERE id='$user_id'");
	$my_hpnow = mysql_result($my_info,0,"hpnow");
	$my_ponow = mysql_result($my_info,0,"ponow");
	$my_zhi = mysql_result($my_info,0,"zhi");
	$my_exp = mysql_result($my_info,0,"exp");
	
	if($my_exp > 8500){
		echo "<br><font color=green>������һ����������ˣ���Щ�򵥵Ĺ����Ͳ��ø��ˣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_zhi < 20){
		echo "<br><font color=green>�㱼ͷ���Ե�Ҳ���°ѱ�����㻵�˰���</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_hpnow < 40 || $my_ponow < 120){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ����Ĺ�����","����ϰ��һ�����������ǰ�������е���ɵ��ˡ�",
			"��ĥīϴ�ʣ���ʼ�˳�д������","'��ô��ô����������ô��ģ���������Ҫ�۹�Ǯ�ġ�'�ϰ�������",
			"�㲻�ҵ�������æ��������",
			"�����ڳ�д����һ���飬�۵ð�����",
			"������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=#397BB7>".$action[$i]."</font><br><br>\n";
	}
	
	$my_hpnow -= 40;
	$need_po = 140 - $my_zhi;
	if($need_po < 60) $need_po = 60;
	$my_ponow -= $need_po;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+100 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���100��Ǯ��</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>