<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$member_list=$_GET['member_list'];
$org_name=$_POST['org_name'];
$create=$_GET['create'];
$sheding=$_GET['sheding'];
$B1=$_POST['B1'];
$R1=$_POST['R1'];
$jiaru=$_GET['jiaru'];
$jorg_name=$_POST['jorg_name'];
$tigongmon=$_GET['tigongmon'];
$del_user=$_GET['del_user'];
$deluser_id=$_POST['deluser_id'];
$jiaojie=$_GET['jiaojie'];
$jiaojie_id=$_POST['jiaojie_id'];
$shouyu=$_GET['shouyu'];
$orgnick_id=$_POST['orgnick_id'];
$orgnick=$_POST['orgnick'];
$orglev=$_POST['orglev'];
$fabu=$_GET['fabu'];
$fabu_info=$_POST['fabu_info'];
$zongtan=$_GET['zongtan'];
$zt_lc=$_POST['zt_lc'];
$zt_info=$_POST['zt_info'];
$wuqi=$_GET['wuqi'];
$wuxue=$_GET['wuxue'];
$lgf=$_GET['lgf'];
$control=$_GET['control'];

include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
===============
=��֯ϵͳ(Ver 0.2.1)
=��Ԫ 2001��12��5��
===============
*/
/*
===============
=��֯����(Ver 0.2.1)
=��Ԫ 2001��12��16��
===============
*/

include "./include/area_now_ct.inc.php";
$way = array("organization.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("�����֯","organization.php","$user_id");
?>
<?
	include "./inc/db.inc.php";
	
	$my_org = mysql_query("SELECT org FROM renwu_member WHERE id='$user_id'");
	$my_org = mysql_result($my_org,0,"org");
	
if($member_list == 1){
	$my_org_m = mysql_query("SELECT renwu_member.id,renwu_member.name FROM misc,renwu_member WHERE misc.id=renwu_member.id AND misc.orglev='5' AND renwu_member.org='$my_org'");
	echo "<br><font color=#E79A1B>======".$my_org."����=====</font><br>";
	echo mysql_result($my_org_m,0,"name")."(".mysql_result($my_org_m,0,"id").")";
	$my_org_m = mysql_query("SELECT renwu_member.id,renwu_member.name,misc.orgnick FROM misc,renwu_member WHERE misc.id=renwu_member.id AND misc.orglev='4' AND renwu_member.org='$my_org'");
	echo "<br><font color=#E79A1B>======".$my_org."��Ҫ����=====</font><br>";	
	for($i=0;$i<mysql_num_rows($my_org_m);$i++){
		$name = mysql_result($my_org_m,$i,"name");
		$id = mysql_result($my_org_m,$i,"id");
		$orgnick = @mysql_result($my_org_m,$i,"orgnick");
		echo "����<font color=#A9A358>".$orgnick."</font>".$name."(".$id.")";
	}
	$my_org_m = mysql_query("SELECT renwu_member.id,renwu_member.name,misc.orgnick FROM misc,renwu_member WHERE misc.id=renwu_member.id AND misc.orglev='3' AND renwu_member.org='$my_org'");
	echo "<br><font color=#E79A1B>======".$my_org."��Ҫ����=====</font><br>";	
	for($i=0;$i<mysql_num_rows($my_org_m);$i++){
		$name = mysql_result($my_org_m,$i,"name");
		$id = mysql_result($my_org_m,$i,"id");
		$orgnick = @mysql_result($my_org_m,$i,"orgnick");
		echo "����<font color=#A9A358>".$orgnick."</font>".$name."(".$id.")";
	}
	$my_org_m = mysql_query("SELECT renwu_member.id,renwu_member.name,misc.orgnick FROM misc,renwu_member WHERE misc.id=renwu_member.id AND misc.orglev='2' AND renwu_member.org='$my_org'");
	echo "<br><font color=#E79A1B>======".$my_org."һ������=====</font><br>";	
	for($i=0;$i<mysql_num_rows($my_org_m);$i++){
		$name = mysql_result($my_org_m,$i,"name");
		$id = mysql_result($my_org_m,$i,"id");
		$orgnick = @mysql_result($my_org_m,$i,"orgnick");
		echo "����<font color=#A9A358>".$orgnick."</font>".$name."(".$id.")";
	}
	$my_org_m = mysql_query("SELECT renwu_member.id,renwu_member.name,misc.orgnick FROM misc,renwu_member WHERE misc.id=renwu_member.id AND misc.orglev='1' AND renwu_member.org='$my_org'");
	echo "<br><font color=#E79A1B>======".$my_org."��Ա=====</font><br>";	
	for($i=0;$i<mysql_num_rows($my_org_m);$i++){
		$name = mysql_result($my_org_m,$i,"name");
		$id = mysql_result($my_org_m,$i,"id");
		$orgnick = @mysql_result($my_org_m,$i,"orgnick");
		echo "����<font color=#A9A358>".$orgnick."</font>".$name."(".$id.")";
	}
	
}
	echo ("
		<img src=".$pic3_url."/xiake/xiake09.jpg border=0 align=left></img>		
		");
	
	echo "<br>====��֯������====<br>";
	echo ("�������������а����֯�Ĺ���������������Խ�����֯���룬��֯�����Լ�
	��ʹ��֯�ڲ��Ĺ����ȡ���ע�ⲻҪ���ƻ�����Ȼ���ܵ��ͷ��ġ�
	<p>�������������֯�������뽨���Լ�����̳������һ����,���Լ�������̳�ص㡣
	��̳�����ļ䷿��--�������������ң���Ϣ�ң������������豸�������й��򡣣�
	<p>�����о��ң���ʮ��<br>
	����������:��ʮ��<br>
	��ѧ�о���:��ʮ��<br>
	װ���о���:��ʮ��<br>
	");
	
	$npc_org = "�����֯";
    	include "./include/list_npc.inc.php"; 
	
	echo "<p align=center>\n";
	echo "===================================<br>\n";
	echo "===&nbsp;&nbsp;������Ϊ<font color=black>".$my_org."</font>��Ա&nbsp;&nbsp;===<br>\n";
	echo "===================================<br>\n";

if($sheding == 1){
	if($R1 == "Y"){
		mysql_query("UPDATE org SET orgopen='Y' WHERE orgname='$my_org'");
		echo "״̬ת����............\n<br>";
		echo "��֯�����趨Ϊ<font color=red>�������</font>״̬��\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";		
		mysql_close();
		exit();
	}else if($R1 == "N"){
		mysql_query("UPDATE org SET orgopen='N' WHERE orgname='$my_org'");
		echo "״̬ת����............\n<br>";
		echo "�������趨Ϊ<font color=green>�������</font>״̬��\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";		
		mysql_close();
		exit();
	}
}
if($jiaru == 1){
	if($my_org != "����֯"){
		echo "����֯��Ա���ܼ���������֯��";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	if($jorg_name == ""){
		echo "û�������֯��";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	$org_info = mysql_query("SELECT orgopen FROM org WHERE orgname='$jorg_name'");
	$org_info = mysql_result($org_info,0,"orgopen");
	if($org_info == "N"){
		echo "����֯���������ɼ��룡";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	$my_mon = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_mon,0,"mon");
	if($my_mon < 500){
		echo "��û���㹻�����ѣ�";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	$my_mon -= 500;
	mysql_query("UPDATE renwu_member SET org='$jorg_name',mon='$my_mon' WHERE id='$user_id'");
	mysql_query("UPDATE org SET orgmon=(orgmon+500) WHERE orgname='$jorg_name'");
	mysql_query("UPDATE misc SET orgnick='',orglev='1' WHERE id='$user_id'");
	echo "<br><font color=black>�㽻����500��ѣ��ɹ�����".$jorg_name."</font>\n";
	mysql_close();
    	exit();
}
if($create == 1){
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
	if($my_mon < 50000){
		echo "��û���㹻�Ļ���������ã�";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	
	echo ("
		<form action=organization.php?create=2 method=post>
		��֯���ƣ�<input type=text size=10 name=org_name>(ʮ�����ֻ�20����ĸ)<br>
		<input type=submit name=create2 value=ȷ�� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		</form>
	");
	mysql_close();
	exit();
}
if($create == 2){
	$org_have = mysql_query("SELECT orgname FROM org WHERE orgname='$org_name'");
	if(mysql_num_rows($org_have)){
		echo "<font color=red>��֯��".$org_name."���Ѿ�ע����ˡ�</font>";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	
	if(empty($org_name)){
		echo "<font color=red>��û��ȷ����֯���ƣ�</font>";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	if(strlen($org_name) > 20){
		echo "<font color=red>��֯���Ʋ����Ϲ涨��</font>";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	
	$my_info = mysql_query("SELECT mon,pos FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
	if($my_mon < 50000){
		echo "��û���㹻�Ļ���������ã�";
    		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";	
    		mysql_close();
    		exit();
	}
	$my_pos = mysql_result($my_info,0,"pos");
	$my_mon -= 50000;
	mysql_query("UPDATE renwu_member SET mon='$my_mon',org='$org_name' WHERE id='$user_id'");
	mysql_query("UPDATE misc SET orgnick='����',orglev='5' WHERE id='$user_id'");
	mysql_query("INSERT INTO org VALUES('$org_name','0','0','$user_id','��֯�����ɹ���','','0','0','0','Y','�����')");
	echo "<br>�����֯<font color=black>".$org_name."</font>�Ѿ������ˣ������������ʹ��֯����Ȩ���ˣ�";
	
	$notice_channel = "��֯";
	$notice_to = "����֯";
	include "./include/notice.inc.php";
	
	mysql_close();
	exit();
}
if($tigongmon == 1){
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
	$tigong_mon = intval($tigong_mon);
	if($tigong_mon > 9999999 || $tigong_mon <= 0 ){
		echo "<br><font color=green>��������ȷ�Ľ�Ǯ������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	
	if($my_mon < $tigong_mon){
		echo "<br><font color=green>��û����ô��Ǯ�ɣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();
	}
	$my_mon -= $tigong_mon;
	
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	mysql_query("UPDATE org SET orgmon=orgmon+'$tigong_mon' WHERE orgname='$my_org'");
	
	mysql_close();
	
	echo "<br>".$e_name."�����֯�Ѿ��յ�������ʽ�\n";	
	exit();
}
if($del_user == 1){
	if(empty($deluser_id)){
		echo "<br><font color=green>��ѡ����Ҫ��������!</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	
	mysql_query("UPDATE renwu_member SET org='����֯' WHERE id='$deluser_id'");
	mysql_query("UPDATE misc SET orgnick='',orglev='1' WHERE id='$deluser_id'");
	mysql_close();
	
	echo "<br>�㿪����".$deluser_id."\n";	
	exit();
}
if($jiaojie == 1){
	if(empty($jiaojie_id)){
		echo "<br><font color=green>��ѡ����Ҫ��������Ȩ������!</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	
	mysql_query("UPDATE org SET orgp='$jiaojie_id' WHERE orgname='$my_org'");
	mysql_query("UPDATE misc SET orgnick='����',orglev='5' WHERE id='$jiaojie_id'");
	mysql_query("UPDATE misc SET orgnick='��λ����',orglev='4' WHERE id='$user_id'");
	
	mysql_close();
	
	echo "<br>��ѱ���֯������Ȩ�����Ӹ���".$jiaojie_id."\n";	
	exit();
}
if($shouyu == 1){
	if(empty($orgnick_id) || empty($orgnick)){
		echo "<br><font color=green>��ѡ����Ҫ������ε����Լ����Ĺ���!</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	$orglev = intval($orglev);
	if($orglev < 1 || $orglev >5){
		echo "<br><font color=green>ְλ�ȼ����Ϸ���</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();
	}
	$my_lev = mysql_query("SELECT orglev FROM misc WHERE id='$user_id'");
	$my_lev = mysql_result($my_lev,0,"orglev");
	if($orglev >= $my_lev){
		echo "<br><font color=green>ְλ�ȼ����������Լ��ĵȼ���Ȼ���ߡ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=".$PHP_SELF."\">";
		mysql_close();
		exit();
	}
	if(strlen($orgnick) > 10){
		echo "<br><font color=green>���β��ܴ���5�����֣�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	
	mysql_query("UPDATE misc SET orgnick='$orgnick',orglev='$orglev' WHERE id='$orgnick_id'");
	mysql_close();
	echo "<br>��������".$jiaojie_id."ְλ��".$orgnick."\n";
	exit();
}
if($fabu == 1){
	if(strlen($fabu_info) < 0 || strlen($fabu_info) > 60){
		echo "<br><font color=green>��Ϣ���Ȳ�����Ҫ��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	
	mysql_query("UPDATE org SET orginfo='$fabu_info' WHERE orgname='$my_org'");
	
	mysql_close();
	
	echo "<br>��֯��Ϣ����Ϊ:".$fabu_info."\n";	
	exit();
}
if($zongtan == 1){
	$org_info = mysql_query("SELECT orgmon FROM org WHERE orgname='$my_org'");
	$org_mon = mysql_result($org_info,0,"orgmon");
	
	if($org_mon < 1000000){
		echo "<br><font color=green>ûǮ��ô�����ð죿��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	$info = $zt_lc.$zt_info;
	$time = time();
	mysql_query("INSERT INTO other_info VALUES('$time','$info')");
	mysql_query("UPDATE org SET orgmon=orgmon-1000000 WHERE orgname='$my_org'");
	
	mysql_close();
	
	echo "<br>��̳�Ѿ�Ԥ���ˣ���ȴ�����Ա֪ͨ��\n";	
	exit();
}
if($wuqi == 1){
	$org_info = mysql_query("SELECT orgmon FROM org WHERE orgname='$my_org'");
	$org_mon = mysql_result($org_info,0,"orgmon");
	
	if($org_mon < 300000){
		echo "<br><font color=green>ûǮ��ô�����ð죿��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	$info = $zt_lc.$zt_info;
	$time = time();
	mysql_query("INSERT INTO other_info VALUES('$time','$info')");
	mysql_query("UPDATE org SET orgmon=orgmon-300000 WHERE orgname='$my_org'");
	
	mysql_close();
	
	echo "<br>�����о����Ѿ�Ԥ���ˣ���ȴ�����Ա֪ͨ��\n";	
	exit();
}
if($wuxue == 1){
	$org_info = mysql_query("SELECT orgmon FROM org WHERE orgname='$my_org'");
	$org_mon = mysql_result($org_info,0,"orgmon");
	
	if($org_mon < 400000){
		echo "<br><font color=green>ûǮ��ô�����ð죿��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	$info = $zt_lc.$zt_info;
	$time = time();
	mysql_query("INSERT INTO other_info VALUES('$time','$info')");
	mysql_query("UPDATE org SET orgmon=orgmon-400000 WHERE orgname='$my_org'");
	
	mysql_close();
	
	echo "<br>��ѧ�о����Ѿ�Ԥ���ˣ���ȴ�����Ա֪ͨ��\n";	
	exit();
}
if($lgf == 1){
	$org_info = mysql_query("SELECT orgmon FROM org WHERE orgname='$my_org'");
	$org_mon = mysql_result($org_info,0,"orgmon");
	
	if($org_mon < 200000){
		echo "<br><font color=green>ûǮ��ô�����ð죿��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=organization.php\">";
		mysql_close();
		exit();	
	}
	$info = $zt_lc.$zt_info;
	$time = time();
	mysql_query("INSERT INTO other_info VALUES('$time','$info')");
	mysql_query("UPDATE org SET orgmon=orgmon-200000 WHERE orgname='$my_org'");
	
	mysql_close();
	
	echo "<br>�������Ѿ�Ԥ���ˣ���ȴ�����Ա֪ͨ��\n";	
	exit();
}
?>
<?
if($control == 1){
	include "./inc/db.inc.php";
	
	if($B1 == "��֯��Ϣ"){			
		$org_info = mysql_query("SELECT * FROM org WHERE orgname='$my_org'");
		$org_pos = mysql_result($org_info,0,"orgpos");
		$org_mon = mysql_result($org_info,0,"orgmon");
		$org_p = mysql_result($org_info,0,"orgp");
		$org_em = mysql_result($org_info,0,"orgem");
		$org_bin = mysql_result($org_info,0,"orgbin");
		$org_jiang = mysql_result($org_info,0,"orgjiang");
		$org_gao = mysql_result($org_info,0,"orggao");
		$org_open = mysql_result($org_info,0,"orgopen");
		$org_mnum = mysql_query("SELECT count(name) FROM renwu_member WHERE org='$my_org'");
		$org_mnum = mysql_fetch_row($org_mnum);
		
		$member_pos = mysql_query("SELECT sum(pos) FROM renwu_member WHERE org='$my_org'");
		$member_pos = mysql_fetch_row($member_pos);
		
		$org_pos = $member_pos[0];
		
		mysql_query("UPDATE org SET orgpos='$org_pos' WHERE orgname='$my_org'");
		
		echo ("
		<table border=1 cellpadding=0 cellspacing=0 style=\"border-collapse: collapse\" bordercolor=#111111 width=100%>
  		<tr>
   		 <td width=100% colspan=2>
    		<p align=center>��֯��Ϣ</td>
 		 </tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>��֯����</font>��</td>
    		<td width=85%>".$org_p."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>��֯�Ƹ�</font>��</td>
    		<td width=85%>".$org_mon."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>��֯����</font>��</td>
    		<td width=85%>".$org_pos."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>�ж�����</font>��</td>
    		<td width=85%>".$org_em."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>�ر�����</font>��</td>
    		<td width=85%>".$org_bin."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>�ؽ�����</font>��</td>
    		<td width=85%>".$org_jiang."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>��������</font>��</td>
    		<td width=85%>".$org_gao."��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>��Ա����</font>��</td>
    		<td width=85%>".$org_mnum[0]."     <a href=organization.php?member_list=1>��ϸ�����</a>��</td>
  		</tr>
  		<tr>
    		<td width=25% bgcolor=#0099CC><font color=#FFFF00>����״̬</font>��</td>
    		<td width=85%>".$org_open."��</td>
  		</tr>
		</table>		
		");
	}
	if($B1 == "����״̬"){
		echo ("
		<form method=POST action=organization.php?sheding=1>
  		�������<input type=radio value=Y checked name=R1>
  		�������<input type=radio name=R1 value=N>
  		<input type=submit value=�趨 name=B1 style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">  
  		</form>
  		");
		mysql_close();
		exit();
	}
	if($B1 == "���׻��"){
		echo ("
		<form method=POST action=organization.php?tigongmon=1>
  		����<input type=text name=tigong_mon>
  		<input type=submit value=��� name=B1 style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">  
  		</form>
  		");
		mysql_close();
		exit();
	}
	if($B1 == "������Ա"){
		$org_m = mysql_query("SELECT id,name FROM renwu_member WHERE org='$my_org' AND id!='$user_id'");
		$num_now = mysql_num_rows($org_m);
		
		echo "<form action=organization.php?del_user=1 method=post>\n";
		echo "<select name=deluser_id size=1>\n";
		echo "<option value=>ѡ��...</option>\n";
		for($i=0;$i<$num_now;$i++){
			$member_id = mysql_result($org_m,$i,"id");
			$member_name = mysql_result($org_m,$i,"name");
			
			echo "<option value=$member_id>$member_name</option>\n";
		}
		echo "</select>\n";
		echo "<input type=submit name=B1 value=���� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	if($B1 == "Ȩ������"){
		$org_m = mysql_query("SELECT id,name FROM renwu_member WHERE org='$my_org' AND id!='$user_id'");
		$num_now = mysql_num_rows($org_m);
		
		echo "<form action=organization.php?jiaojie=1 method=post>\n";
		echo "<select name=jiaojie_id size=1>\n";
		echo "<option value=>ѡ��...</option>\n";
		for($i=0;$i<$num_now;$i++){
			$member_id = mysql_result($org_m,$i,"id");
			$member_name = mysql_result($org_m,$i,"name");
			
			echo "<option value=$member_id>$member_name</option>\n";
		}
		echo "</select>\n";
		echo "<input type=submit name=B1 value=���� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	
	if($B1 == "��Ϣ����"){
		$info_now = mysql_query("SELECT orginfo FROM org WHERE orgname='$my_org'");
		$info_now = mysql_result($info_now,0,"orginfo");
		
		echo "<br>��֯��Ϣ��<font color=black>".$info_now."</font>\n";
				
		echo "<form action=organization.php?fabu=1 method=post>\n";
		echo ("
			��Ϣ����(30������)<input type=text name=fabu_info size=30><br>			
		");
		echo "<input type=submit name=B1 value=���� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	
	if($B1 == "�趨ְλ"){
		$my_lev = mysql_query("SELECT orglev FROM misc WHERE id='$user_id'");
		$my_lev = mysql_result($my_lev,0,"orglev");
		$org_m = mysql_query("SELECT renwu_member.id,renwu_member.name FROM renwu_member,misc WHERE renwu_member.org='$my_org' AND renwu_member.id!='$user_id' AND misc.id=renwu_member.id AND misc.orglev < '$my_lev'");
		$num_now = mysql_num_rows($org_m);
		
		echo "<font color=#71B59E>��ְ֯λ�ȼ���1��5�ȼ�����ֻ���趨����׵ȼ�����</font>";
		echo "<form action=organization.php?shouyu=1 method=post>\n";
		echo "<select name=orgnick_id size=1>\n";
		echo "<option value=>ѡ��...</option>\n";
		for($i=0;$i<$num_now;$i++){
			$member_id = mysql_result($org_m,$i,"id");
			$member_name = mysql_result($org_m,$i,"name");
			
			echo "<option value=$member_id>$member_name</option>\n";
		}
		echo "</select>\n";
		echo "ְλ���ƣ�<input type=text name=orgnick size=5>�����5�����֣�\n";
		echo "<br>�ȼ���<input type=text name=orglev size=5 value=".($my_lev-1).">�����5�����֣�\n";
		echo "<input type=submit name=B1 value=���� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
		
	if($B1 == "�˳���֯"){
		mysql_query("UPDATE renwu_member SET org='����֯' WHERE id='$user_id'");
		mysql_query("UPDATE misc SET orgnick='' WHERE id='$user_id'");
		echo "<font color=black>��ɹ��˳�".$jorg_name."</font>\n";
		mysql_close();
		exit();
	}
	if($B1 == "�ð���̳"){
		echo "<form action=organization.php?zongtan=1 method=post>\n";
		echo "Ԥ����̳λ�ã�<input type=text name=zt_lc size=8>\n";
		echo "����˵����<input type=text name=zt_info size=8 value=".$my_org.">\n";
		echo "<input type=submit name=B1 value=�ð� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	if($B1 == "�ð������о���"){
		echo "<form action=organization.php?wuqi=1 method=post>\n";
		echo "Ԥ����֯��<input type=text name=zt_lc size=8 value=".$my_org.">\n";
		echo "����˵����<input type=text name=zt_info size=8 value=�����о���>\n";
		echo "<input type=submit name=B1 value=�ð� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	if($B1 == "�ð���ѧ�о���"){
		echo "<form action=organization.php?wuxue=1 method=post>\n";
		echo "Ԥ����֯��<input type=text name=zt_lc size=8 value=".$my_org.">\n";
		echo "����˵����<input type=text name=zt_info size=8 value=��ѧ�о���>\n";
		echo "<input type=submit name=B1 value=�ð� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	if($B1 == "�ð�װ���о���"){
		echo "<form action=organization.php?wuxue=1 method=post>\n";
		echo "Ԥ����֯��<input type=text name=zt_lc size=8 value=".$my_org.">\n";
		echo "����˵����<input type=text name=zt_info size=8 value=װ���о���>\n";
		echo "<input type=submit name=B1 value=�ð� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
	if($B1 == "����������"){
		echo "<form action=organization.php?lgf=1 method=post>\n";
		echo "Ԥ����֯��<input type=text name=zt_lc size=8 value=".$my_org.">\n";
		echo "����˵����<input type=text name=zt_info size=8 value=������>\n";
		echo "<input type=submit name=B1 value=�ð� style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">";
		echo "</form>\n";
		mysql_close();
		exit();
	}
}
?>
<?
if($my_org != "����֯"){
	$my_orgp = mysql_query("SELECT orgp FROM org WHERE orgname='$my_org'");
	$my_orgp = mysql_result($my_orgp,0,"orgp");
	$my_lev = mysql_query("SELECT orglev FROM misc WHERE id='$user_id'");
	$my_lev = mysql_result($my_lev,0,"orglev");
	echo "<form action=organization.php?control=1 method=post>";
	
	if($my_lev == "1"){
	echo ("			
		<input type=submit name=B1 value=��֯��Ϣ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=���׻�� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
	");
	}else if($my_lev == "2"){
		echo ("
		<input type=submit name=B1 value=��֯��Ϣ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=���׻�� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=�趨ְλ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
	");
	}else if($my_lev == "3"){
		echo ("
		<input type=submit name=B1 value=��֯��Ϣ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=���׻�� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<br><input type=submit name=B1 value=��Ϣ���� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=�趨ְλ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
	");
	}else if($my_lev == "4"){
		echo ("
		<input type=submit name=B1 value=��֯��Ϣ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=���׻�� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=������Ա style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<br><input type=submit name=B1 value=��Ϣ���� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=�趨ְλ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
	");
	}else	if($user_id == $my_orgp && $my_lev == "5"){
	echo ("
		<input type=submit name=B1 value=��֯��Ϣ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=���׻�� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=������Ա style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<br><input type=submit name=B1 value=��Ϣ���� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=�趨ְλ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<br><input type=submit name=B1 value=����״̬ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=Ȩ������ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<br><input type=submit name=B1 value=�ð���̳ style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=�ð������о��� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=���������� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<br><input type=submit name=B1 value=�ð���ѧ�о��� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		<input type=submit name=B1 value=�ð�װ���о��� style=\"color: #000080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
	");
	}
	
	echo ("
		<br><input type=submit name=B1 value=�˳���֯ style=\"color: #808080; border: 1px ridge #0099CC; background-color: #CCCCCC; font-size:8pt\">
		</form>
	");
	include "./include/back_xy.inc.php";
	mysql_close();
	exit();
}
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" bgcolor="#0099FF">
    <p align="center"><font color="#FFFF00">������֯</font></td>
  </tr>
  <tr>
    <td width="100%">��֯������Ҫ�����������50000====><a href=organization.php?create=1>������֯</a></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#0099FF">
    <p align="center"><font color="#FFFF00">������֯</font></td>
  </tr>
  <tr>
    <td width="100%">
    <form action=organization.php?jiaru=1 method=post>
    <select name=jorg_name size=1>
    <option value=>ѡ��..</option>
    <?
    	$org_info = mysql_query("SELECT orgname FROM org");
    	$org_num = mysql_num_rows($org_info);
    	
    	for($i=0;$i<$org_num;$i++){
    		$org_name = mysql_result($org_info,$i,"orgname");
    		
    		echo "<option value=$org_name>".$org_name."</option>\n";
    	}
    	mysql_close();
    ?>
    </select>
    <input type=submit name=B1 value=���� style="font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633">
    </form>
    </td>
  </tr>
</table>
<?
	include "./include/back_xy.inc.php";
?>
