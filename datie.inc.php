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
	
	if($my_exp > 25000 || $my_exp < 10000){
		echo "<br><font color=green>�㾭�鲻�������������������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_sex != "����"){
		echo "<br><font color=green>Ů�ӼҼ���ô������������˰�����</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_hpnow < 120 || $my_ponow < 120){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ����Ĺ�����","������������ͣ���ô������顣",
			"���㺹���б������ӣ��㻹�ǰ����������ټ����ɣ�",
			"�����ϰ岻ͣ�Ĵߴ��㣺'������������'",
			"��ͣ�Ĵ򰢴��㲻�Ծ��ú����ˡ�",
			"���ڰ�һ���������......",
			"������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=#B8C765>".$action[$i]."</font><br><br>\n";
	}
	
	$my_ponow -= 120;
	$my_hpnow -= 120;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+180,exp=exp+25 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���180��Ǯ,25�㾭�顣</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>