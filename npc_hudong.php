<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$npc_id=$_GET['npc_id'];
$kill=$_GET['kill'];
$qiecuo=$_GET['qiecuo'];
$geiyu=$_GET['geiyu'];
$gei=$_GET['gei'];
//echo "����gei".$gei;
$wupin_person=$_POST['wupin_person'];
$b_id=$_GET['b_id'];

include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
================================
=NPC���� (Ver 0.4.5)
=��Ԫ 2001��12��30��
================================
*/
?>
<?
	if($kill == 1) include "./include/npc_juedou.inc.php";
	if($qiecuo == 1) include "./include/npc_qiecuo.inc.php";
	if($geiyu == 1) include "./include/npc_geiyu.inc.php";
	
	$a_talk = array('����������',
		'����һ�¡�����',
		'������ȥ��ͣ������������.....',
		'�ƺ�Ҫ�ܿ���......',
		'�������˹���......'
		);
	$t_talk = array('�������пգ�����ʲô�°���',
		'��æ���أ�������˵�ɣ�',
		'���ܰ���ʲô����'
		);
	$ztz_talk = array('��λp_nick��ð�����֪������ʲô����',
		'������λp_nick,������ʲô����',
		'�������������ˣ���λp_nick��֪������ʲô�ܰ������',
		'������λp_nick,�кι�ɣ�',
		'��λp_nick,������˵��'
		);
	$ztx_talk = array('��λp_nick����̫�أ����û��ʲô�£��Ҿ������ˡ�',
		'�ߣ���������ľ�����������а������ˣ�û�¾Ϳ����',
		'��Ȱ����λp_nick������������Щ���°ɣ�',
		'������p_nick���Һ���˵����С���������㣡'
		);
	$xtx_talk = array('��λp_nick������﷢�ư����кõĻ�ɫ�ɲ�Ҫ���������ֵ�Ŷ��',
		'��λp_nick�����Ƕ���һ�����ϵģ���ʲô�¾���˵��',
		'����û�뵽���컹���������������p_nick��!',
		'����������в���������ʿ����������Ҳȥɱ��������'
		);
	$xtz_talk = array('��ƽ��������ľ�����������p_nick�ˣ���ƨ��ţ������ӻ�������Ҫ����',
		'�����p_nick��������ʲô�°���',
		'���ӽ������鲻���Ͳ��������p_nick�ƽ��ˣ���ƨ��Ź���',
		'���p_nick,���Ҹ�ʲô����˵�˿����'
		);	
	
	include "./inc/db.inc.php";
	
	if(!isset($npc_id)){
		echo "����ȷ������";
		mysql_close();
		exit();
	}
	
	$my_info = mysql_query("SELECT pos,nick FROM renwu_member WHERE id='$user_id'");
	$my_pos = mysql_result($my_info,0,"pos");
	$my_nick = mysql_result($my_info,0,"nick");
	
	$time_resume = time();
	
	$renwu_state = mysql_query("SELECT hp,hpnow,en,ennow,po,ponow,time,con,po,zhi FROM npc_member WHERE id='$npc_id'");
	
	$renwu_state_hp = mysql_result($renwu_state,0,"hp");
	$renwu_state_hpnow = mysql_result($renwu_state,0,"hpnow");
	$renwu_state_en = mysql_result($renwu_state,0,"en");
	$renwu_state_ennow = mysql_result($renwu_state,0,"ennow");
	$renwu_state_po = mysql_result($renwu_state,0,"po");
	$renwu_state_ponow = mysql_result($renwu_state,0,"ponow");
	$renwu_state_time = mysql_result($renwu_state,0,"time");
	
	$renwu_state_con = mysql_result($renwu_state,0,"con");
	$renwu_state_po = mysql_result($renwu_state,0,"po");
	$renwu_state_zhi = mysql_result($renwu_state,0,"zhi");
	
	$distance_time = $time_resume - $renwu_state_time;
	$distance_time = $distance_time/10;
	intval($distance_time);
		
	if($renwu_state_hpnow < $renwu_state_hp){
		$add_hp = (($renwu_state_con/10)+3) * $distance_time;
		$renwu_state_hpnow = intval($add_hp) + $renwu_state_hpnow;
		if($renwu_state_hpnow > $renwu_state_hp) $renwu_state_hpnow = $renwu_state_hp;
	}
	if($renwu_state_ennow < $renwu_state_en){
		$add_en = (($renwu_state_con-5)/10) * $distance_time;
		$renwu_state_ennow = intval($add_en) + $renwu_state_ennow;
		if($renwu_state_ennow > $renwu_state_en) $renwu_state_ennow = $renwu_state_en;
	}
	if($renwu_state_ponow < $renwu_state_po){
		$add_po = $renwu_state_zhi/10 * $distance_time;
		$renwu_state_ponow = intval($add_po) + $renwu_state_ponow;
		if($renwu_state_ponow > $renwu_state_po) $renwu_state_ponow = $renwu_state_po;
	}
	
	mysql_query("UPDATE npc_member SET time='$time_resume',hpnow='$renwu_state_hpnow',ennow='$renwu_state_ennow',ponow='$renwu_state_ponow' WHERE id='$npc_id'");
	
	$npc_info = mysql_query("SELECT des,pos,hpnow,name,nick,tou,shen,shou,tui,wuqi FROM npc_member WHERE id='$npc_id'");
	
	$npc_name = mysql_result($npc_info,0,"name");
	$npc_hpnow = mysql_result($npc_info,0,"hpnow");	
	if($npc_hpnow < 100){
		echo "<p align=center>".$npc_name."ʵ��̫���ˣ��޷����㽻����\n";
		$location_info = mysql_query("SELECT location_id FROM misc WHERE id='$user_id'");  	
		$location = mysql_result($location_info,0,"location_id");
		echo "<p align=center><a href=$location>�����ˡ�</a>\n";
		mysql_close();
		exit();
	}	
	$npc_nick = mysql_result($npc_info,0,"nick");
	$npc_tou = mysql_result($npc_info,0,"tou");
	$npc_shen = mysql_result($npc_info,0,"shen");
	$npc_shou = mysql_result($npc_info,0,"shou");
	$npc_tui = mysql_result($npc_info,0,"tui");
	$npc_wuqi = mysql_result($npc_info,0,"wuqi");
	$npc_pos = mysql_result($npc_info,0,"pos");
	$npc_des = mysql_result($npc_info,0,"des");
				
	echo "<a href=npc_hudong.php?npc_id=$npc_id>��".$npc_nick."��".$npc_name."��".$npc_id."��</a><br>".$npc_des."<br>\n";
	echo "<font color=#A79E52>\n";
	if($npc_tou != ""){
		$name = mysql_query("SELECT zhuangbei_wupin.name FROM zhuangbei_wupin,npc_member WHERE zhuangbei_wupin.id=npc_member.tou AND zhuangbei_wupin.id='$npc_tou'");
		echo "ͷ��:".mysql_result($name,0,"name")."&nbsp;<br>";
	}
	if($npc_shen != ""){
		$name = mysql_query("SELECT zhuangbei_wupin.name FROM zhuangbei_wupin,npc_member WHERE zhuangbei_wupin.id=npc_member.shen AND zhuangbei_wupin.id='$npc_shen'");
		echo "��:".mysql_result($name,0,"name")."&nbsp;<br>";
	}
	if($npc_shou != ""){
		$name = mysql_query("SELECT zhuangbei_wupin.name FROM zhuangbei_wupin,npc_member WHERE zhuangbei_wupin.id=npc_member.shou AND zhuangbei_wupin.id='$npc_shou'");
		echo "�ִ�:".mysql_result($name,0,"name")."&nbsp;<br>";
	}
	if($npc_tui != ""){
		$name = mysql_query("SELECT zhuangbei_wupin.name FROM zhuangbei_wupin,npc_member WHERE zhuangbei_wupin.id=npc_member.tui AND zhuangbei_wupin.id='$npc_tui'");
		echo "�Ȱ�:".mysql_result($name,0,"name")."&nbsp;<br>";
	}
	if($npc_wuqi != ""){
		$name = mysql_query("SELECT zhuangbei_wuqi.name FROM zhuangbei_wuqi,npc_member WHERE zhuangbei_wuqi.id=npc_member.wuqi AND zhuangbei_wuqi.id='$npc_wuqi'");
		echo "����:".mysql_result($name,0,"name");			
	}
	echo "</font>\n";
	
	if($npc_nick != "����"){
	if($npc_pos != 0 && $my_pos != 0){
	if($npc_pos > 0 && $my_pos > 0){
		$num_talk = count($ztz_talk)-1;
		$talk_msg = $ztz_talk[rand(0,$num_talk)];
		$talk_msg = str_replace("p_nick","$my_nick","$talk_msg");
	}
	if($npc_pos > 0 && $my_pos < 0){
		$num_talk = count($ztx_talk)-1;
		$talk_msg = $ztx_talk[rand(0,$num_talk)];
		$talk_msg = str_replace("p_nick","$my_nick","$talk_msg");
	}
	if($npc_pos < 0 && $my_pos < 0){
		$num_talk = count($xtx_talk)-1;
		$talk_msg = $xtx_talk[rand(0,$num_talk)];
		$talk_msg = str_replace("p_nick","$my_nick","$talk_msg");
	}
	if($npc_pos < 0 && $my_pos > 0){
		$num_talk = count($xtz_talk)-1;
		$talk_msg = $xtz_talk[rand(0,$num_talk)];
		$talk_msg = str_replace("p_nick","$my_nick","$talk_msg");
	}
	}else{
		$num_talk = count($t_talk)-1;
		$talk_msg = $t_talk[rand(0,$num_talk)];
		$talk_msg = str_replace("p_nick","$my_nick","$talk_msg");
	}
	
	echo "<br><font color=#4575A5>".$npc_name."����˵����".$talk_msg."</font>";	
	}
	
	if($npc_nick == "����"){
		$num_talk = count($a_talk)-1;
		$talk_msg = $a_talk[rand(0,$num_talk)];
		$talk_msg = str_replace("p_nick","$my_nick","$talk_msg");
		
		echo "<br><font color=#4575A5>".$npc_name.$talk_msg."</font>";	
	}
	echo "<p>�����==><br>\n";
	if($npc_nick != "����")	echo "<a href=npc_hudong.php?kill=1&b_id=$npc_id>ɱ��</a>&nbsp;&nbsp;<a href=npc_hudong.php?qiecuo=1&b_id=$npc_id>�д�</a>&nbsp;&nbsp;<a href=npc_hudong.php?geiyu=1&npc_id=$npc_id>����</a>&nbsp;&nbsp;<a href=javascript:history.back(1)>�뿪</a>\n";
	else 	echo "<a href=npc_hudong.php?kill=1&b_id=$npc_id>ɱ��</a>&nbsp;&nbsp;<a href=npc_hudong.php?qiecuo=1&b_id=$npc_id>�д�</a>&nbsp;&nbsp;<a href=javascript:history.back(1)>�뿪</a>\n";
	
	mysql_close();
	exit();
?>