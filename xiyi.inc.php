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
	
	if($my_exp > 20000 || $my_exp < 5000){
		echo "<br><font color=green>�㾭�鲻�������������������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_sex != "��Ů"){
		echo "<br><font color=green>���ӼҼ���ô������������˰�����</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_hpnow < 100 || $my_ponow < 100){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ����Ĺ�����","�ϰ��������һͰ���·�����ϴ��",
			"�㿴����Щ�����Ǵ���ǵ��·�������һЩ�����������ɵġ�",
			"'���Ժ�ҲҪ����ЩƯ�����·���'����",
			"��ͣ��ϴ��ϴ���㲻�Ծ����е����ˡ�",
			"���ڰ�һͰ�·�ϴ����......",
			"������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=#859364>".$action[$i]."</font><br><br>\n";
	}
	
	$my_ponow -= 100;
	$my_hpnow -= 100;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+160,exp=exp+20 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���160��Ǯ,20�㾭�顣</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>