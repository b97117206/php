<?
/*
===============
=��������ϴ��
=
===============
*/
	include "./inc/db.inc.php";
	include "./inc/resume.inc.php";
	
	renwu_resume($user_id,time());
	
	$my_info = mysql_query("SELECT hpnow,ponow,sex,exp FROM renwu_member WHERE id='$user_id'");
	$my_hpnow = mysql_result($my_info,0,"hpnow");
	$my_ponow = mysql_result($my_info,0,"ponow");
	$my_sex = mysql_result($my_info,0,"sex");
	$my_exp = mysql_result($my_info,0,"exp");
	
	if($my_exp < 20000){
		echo "<br><font color=green>�㾭�鲻������ô��������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_hpnow < 150 || $my_ponow < 150){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ׼��������","�㿪ʼ��ʾһЩ���������Ա�������",
			"������ʼ�ˡ�",
			"�㲻ͣ����Ź��������㲻�ܻ��֡�",
			"���в��У�����ɳ��һ�������˴��š�",
			"������˿����е�����.....",
			"������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=#46B6E6>".$action[$i]."</font><br><br>\n";
	}
	
	$my_ponow -= 150;
	$my_hpnow -= 150;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+200,exp=exp+30 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���200��Ǯ,30�㾭�顣</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>