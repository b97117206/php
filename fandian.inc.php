<?
/*
===============
=������������
=
===============
*/
	include "./inc/db.inc.php";
	include "./inc/resume.inc.php";
	
	renwu_resume($user_id,time());
	
	$my_info = mysql_query("SELECT hpnow,ponow,exp FROM renwu_member WHERE id='$user_id'");
	$my_hpnow = mysql_result($my_info,0,"hpnow");
	$my_ponow = mysql_result($my_info,0,"ponow");
	$my_exp = mysql_result($my_info,0,"exp");
	
	if($my_exp > 6000){
		echo "<br><font color=green>������һ����������ˣ���Щ�򵥵Ĺ����Ͳ��ø��ˣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}
	if($my_hpnow < 80 || $my_ponow < 90){
		echo "<br><font color=green>���������������ܼ������ˡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=work.php\">";
		mysql_close();
		exit();	
	}

	$action=array("�㿪ʼ����Ĺ�����","�㿴�������ǲ��ϵĽ������㶼��æ�������ˡ�",
			"'С������',һ��ߺ�ȣ����ѭ�����˹�ȥ��","'�ϰ壬��������'",
			"һ��һ���Ŀ�������ȥȥ�����������Ӧ��������С���ˡ�",
			"����������Ҫ���ˣ���Ĺ�����Ҫ�����ˡ�",
			"'��ʲô�����������칤��ȥ',�ϰ忴�ŷ������㣬�����е㷢ŭ�ˣ�",
			"�����ˣ�������˽���Ĺ�����");
	
	for($i=0;$i<count($action);$i++){
		echo "<font color=green>".$action[$i]."</font><br><br>\n";
	}
	
	$my_hpnow -= 80;
	$my_ponow -= 90;
	
	mysql_query("UPDATE renwu_member SET hpnow='$my_hpnow',ponow='$my_ponow',mon=mon+40 WHERE id='$user_id'");
	
	echo "<font color=blue>����һ�칤����õ���40��Ǯ��</font>\n";
	
	echo "<p align=center><input type=submit value='�� ��' onclick=\"location.href='work.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	mysql_close();
	exit();
?>