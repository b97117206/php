<?
/*
===============
=���������򻨹���
=
===============
*/
	include "./inc/db.inc.php";
	include "./inc/resume.inc.php";
	
	renwu_resume($user_id,time());
	
	$my_info = mysql_query("SELECT hpnow,ponow,sex,col,exp FROM renwu_member WHERE id='$user_id'");
	$my_hpnow = mysql_result($my_info,0,"hpnow");
	$my_ponow = mysql_result($my_info,0,"ponow");
	$my_sex = mysql_result($my_info,0,"sex");
	$my_col = mysql_result($my_info,0,"col");
	$my_exp = mysql_result($my_info,0,"exp");
	
	if($my_exp > 8500){
		echo "<br><font color=green>������һ����������ˣ���Щ�򵥵Ĺ����Ͳ��ø��ˣ�</font>\n";
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
	if($my_col < 20){
		echo "<br><font color=green>ʵ�ڶԲ����ˣ�����������ҪһЩ�ܿ������۵�Ů���Ӱ���</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_hpnow < 75 || $my_ponow < 75){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ����Ĺ�����","����Կ��������ʽ�������ʻ����������ˡ�",
			"��������ÿ���ʻ���ϣ����������Զ����������","'��λ������Ů֮�ܸ���һ���ʻ���'",
			"������Ĺ˿��ǲ����Ǳ���Щ�ʻ������������������绨�����������˲�������ſ���",
			"������������ǲ�����",
			"������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=#47AF4F>".$action[$i]."</font><br><br>\n";
	}
	
	$my_ponow -= 75;
	$my_hpnow -= 75;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+130 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���130��Ǯ��</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>