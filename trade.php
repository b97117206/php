<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$huikuan=$_GET['huikuan'];
$mon_num=$_POST['mon_num'];
$mon_person=$_POST['mon_person'];
$youji=$_GET['youji'];
$wupin_youji=$_POST['wupin_youji'];
$wupin_person=$_POST['wupin_person'];

include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
==================
=����ϵͳ
=
==================
*/

include "./include/area_now_ct.inc.php";
$way = array("trade.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("��վ","trade.php","$user_id");
?>
<?
if($huikuan == 1){
	include "./inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
	$mon_num = intval($mon_num);
	if($mon_num > 9999999 || $mon_num <= 5 ){
		echo "<br><font color=green>��������ȷ�Ľ�Ǯ����������5���ϡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=trade.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_mon < $mon_num){
		echo "<br><font color=green>��û����ô��Ǯ�ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	$e_info = @mysql_query("SELECT name,mon FROM renwu_member WHERE id='$mon_person'");
	$e_mon = @mysql_result($e_info,0,"mon");
	$e_name = @mysql_result($e_info,0,"name");
	
	if(empty($e_name)){
		echo "<br><font color=green>û��".$e_name."������أ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	if($mon_person == $user_id){
		echo "<br><font color=green>Ŷ���㻹�Լ����Լ�Ǯ��̫�д����˰ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= $mon_num;
	$mon_num = $mon_num - intval($mon_num*0.05);	
	$e_mon += $mon_num;
	
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	mysql_query("UPDATE renwu_member SET mon='$e_mon' WHERE id='$mon_person'");
	
	mysql_close();
	
	echo $e_name."�Ѿ��յ����Ʊ�ˣ�������ȡ��5%�������ѡ�\n";
	$notice_channel = "log";
	$notice_to = "money";
	include "./include/notice.inc.php";
	exit();
}
if($youji == 1){
	include "./inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
	if($my_mon < 100){
		echo "<br><font color=green>�����ʶ���������ô���㴦����</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	if(empty($wupin_youji)){
		echo "<br><font color=green>��Ҫ�ʼ�ʲô����</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	$wupin_info = mysql_query("SELECT zhuangbei_wupin.id,zhuangbei_wupin.cla,zhuangbei_wupin.name FROM renwu_wupin,zhuangbei_wupin WHERE renwu_wupin.id_num='$wupin_youji' AND zhuangbei_wupin.id=renwu_wupin.wupinid LIMIT 0,1");
	$wupin_id = mysql_result($wupin_info,0,'id');
	$wupin_name = mysql_result($wupin_info,0,'name');
	$wupin_cla = mysql_result($wupin_info,0,'cla');
	
	if($wupin_name == "��ʯ��ָ"){
	$notice_channel = "��Ʒ";
	$notice_to = "��ʯ��ָ";
	include "./include/notice.inc.php";	
	}
	$e_info = @mysql_query("SELECT name FROM renwu_member WHERE id='$wupin_person'");
	$e_name = @mysql_result($e_info,0,"name");
	
	if(empty($e_name)){
		echo "<br><font color=green>û��������أ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	if($wupin_person == $user_id){
		echo "<br><font color=green>Ŷ���㻹�Լ����Լ�������̫�д����˰ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= 100;
	
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	mysql_query("DELETE FROM renwu_wupin WHERE id_num='$wupin_youji'");
	mysql_query("INSERT INTO renwu_wupin VALUES('','$wupin_person','$wupin_id','0','N','$wupin_cla')") or die("���ݿ�����\n");
	mysql_close();
	
	echo $e_name."�Ѿ��յ�����ʼ���Ʒ�ˣ�������ȡ��100�������ѡ�\n";
	
	$notice_channel = "log";
	$notice_to = "wupin";
	include "./include/notice.inc.php";
	exit();
	
}
if($wuqi == 1){
	include "./inc/db.inc.php";
	
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
	if($my_mon < 100){
		echo "<br><font color=green>�����ʶ���������ô���㴦����</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	if(empty($wupin_youji)){
		echo "<br><font color=green>��Ҫ�ʼ�ʲô����</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	$wupin_info = mysql_query("SELECT zhuangbei_wuqi.id,zhuangbei_wuqi.cla,zhuangbei_wuqi.name FROM renwu_wuqi,zhuangbei_wuqi WHERE renwu_wuqi.id_num='$wupin_youji' AND zhuangbei_wuqi.id=renwu_wuqi.wuqiid LIMIT 0,1");
	$wupin_id = mysql_result($wupin_info,0,'id');
	$wupin_name = mysql_result($wupin_info,0,'name');
	$wupin_cla = mysql_result($wupin_info,0,'cla');
	
	$e_info = @mysql_query("SELECT name FROM renwu_member WHERE id='$wupin_person'");
	$e_name = @mysql_result($e_info,0,"name");
	
	if(empty($e_name)){
		echo "<br><font color=green>û��������أ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"10; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	if($wupin_person == $user_id){
		echo "<br><font color=green>Ŷ���㻹�Լ����Լ�������̫�д����˰ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=trade.php\">";
		mysql_close();
		exit();
	}
	
	$my_mon -= 100;
	
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	mysql_query("DELETE FROM renwu_wuqi WHERE id_num='$wupin_youji'");
	mysql_query("INSERT INTO renwu_wuqi VALUES('','$wupin_person','$wupin_id','0','N','$wupin_cla')") or die("���ݿ�����\n");
	mysql_close();
	
	echo $e_name."�Ѿ��յ�����ʼ���Ʒ�ˣ�������ȡ��100�������ѡ�\n";
	
	$notice_channel = "log";
	$notice_to = "wupin";
	include "./include/notice.inc.php";
	exit();
	
}
?>
<?
	echo "<br>==============������վ==============<br>\n";
	echo ("��������վ�����ṩ����ҽ��ס�������Ʒ�ĵط���Ϊ���ṩ���õķ���
	����ĸ���ҵ��Ҫ��ȡһ���ķ��á�
	");
	$npc_org = "������վ";
    	include "./include/list_npc.inc.php";
?>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" bgcolor="#0099CC">
    <p align="center"><font color="#FF9900">���ҵ��������5%��</font></td>
  </tr>
  <tr>
    <td width="100%"><form action=trade.php?huikuan=1 method=post>
    ����<input name=mon_num size=4 type=text>
    ������ID<input name=mon_person size=5 type=text>
    <input type=submit name=geimon value=��� style="font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633">
    </form>
    </td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#0099CC">
    <p align="center"><font color="#FF9900">��Ʒ�ʼ�ҵ���շ�100/�Σ�</font></td>
  </tr>
  <tr>
    <td width="100%">
    <?
    	include "./inc/db.inc.php";
	
	$my_wupin = mysql_query("SELECT name,id_num FROM renwu_wupin,zhuangbei_wupin WHERE zhuangbei_wupin.id=renwu_wupin.wupinid AND renwu_wupin.id='$user_id'");
	$wupin_num = mysql_num_rows($my_wupin);
	if($wupin_num > 0){
	echo "<form action=trade.php?youji=1 method=post>\n";
	echo "<select name=wupin_youji size=1>\n";
	echo "<option value=>ѡ����Ʒ</option>\n";
	for($i=0;$i<$wupin_num;$i++){
		$wupin_name = mysql_result($my_wupin,$i,"name");
		$wupin_idnum = mysql_result($my_wupin,$i,"id_num");
		echo "<option value=$wupin_idnum>".$wupin_name."</option>\n";
	}
	echo "</select>\n";
	echo "������ID<input name=wupin_person size=5 type=text>";
	echo "<input type=submit value=�ʼ� name=wupin_nowuse style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	echo "</form>\n";
	}
    ?>
    </td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#0099CC">
    <p align="center"><font color="#FF9900">�����ʼ�ҵ���շ�100/�Σ�</font></td>
  </tr>
  <tr>
    <td width="100%">
    <?
    	include "./inc/db.inc.php";
	
	$my_wupin = mysql_query("SELECT name,id_num FROM renwu_wuqi,zhuangbei_wuqi WHERE zhuangbei_wuqi.id=renwu_wuqi.wuqiid AND renwu_wuqi.id='$user_id'");
	$wupin_num = mysql_num_rows($my_wupin);
	if($wupin_num > 0){
	echo "<form action=trade.php?wuqi=1 method=post>\n";
	echo "<select name=wupin_youji size=1>\n";
	echo "<option value=>ѡ������</option>\n";
	for($i=0;$i<$wupin_num;$i++){
		$wupin_name = mysql_result($my_wupin,$i,"name");
		$wupin_idnum = mysql_result($my_wupin,$i,"id_num");
		echo "<option value=$wupin_idnum>".$wupin_name."</option>\n";
	}
	echo "</select>\n";
	echo "������ID<input name=wupin_person size=5 type=text>";
	echo "<input type=submit value=�ʼ� name=wupin_nowuse style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	echo "</form>\n";
	}
    ?>�������ʼĺ󽫱��Ϊ����״̬��
    </td>
  </tr>
  <tr>
    <td width="100%">   
    ��</td>
  </tr>
  <tr>
    <td width="100%">��</td>
  </tr>
  <tr>
    <td width="100%">��</td>
  </tr>
</table>
<?
     include "./include/back_xy.inc.php";
?>
