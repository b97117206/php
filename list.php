<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$qiang=$_GET['qiang'];
$xia=$_GET['xia'];
$eren=$_GET['eren'];
$mon=$_GET['mon'];
$zorg=$_GET['zorg'];
$xorg=$_GET['xorg'];

include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
================================
=�������а� (Ver 0.2.1)
=��Ԫ 2001��11��30��
================================

*/
include "./include/area_now_ct.inc.php";
$way = array("list.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("�������а�","list.php","$user_id");
?>
<?
//����
if($qiang == 1){
	include "./inc/db.inc.php";
	
	$people_info = mysql_query("SELECT id FROM renwu_member ORDER BY exp DESC LIMIT 0,10");
	$num = mysql_num_rows($people_info);
	
	include "./include/list.inc.php";	
}
?>

<?
if($xia == 1){
	include "./inc/db.inc.php";
	
	$people_info = mysql_query("SELECT id FROM renwu_member WHERE pos > 0 ORDER BY pos DESC LIMIT 0,10");
	$num = mysql_num_rows($people_info);
		
	include "./include/list.inc.php";
}
?>
<?
if($eren == 1){
	include "./inc/db.inc.php";
	
	$people_info = mysql_query("SELECT id FROM renwu_member WHERE pos < 0 ORDER BY pos ASC LIMIT 0,10");
	$num = mysql_num_rows($people_info);
		
	include "./include/list.inc.php";
}
?>
<?
if($mon == 1){
	include "./inc/db.inc.php";
	
	$people_info = mysql_query("SELECT id FROM renwu_member ORDER BY mon DESC LIMIT 0,10");
	$num = mysql_num_rows($people_info);
		
	include "./include/list.inc.php";
}
?>
<?
if($zorg == 1){
	include "./inc/db.inc.php";
	
	$org_info = @mysql_query("SELECT orgname FROM org WHERE orgpos > 0 ORDER BY orgpos DESC LIMIT 0,10");
	$num = @mysql_num_rows($org_info);
	
	echo "<table border=2 cellpadding=0 cellspacing=0 bordercolor=#111111 width=100%>\n";
	for($i=0;$i<$num;$i++){
		$org_name = mysql_result($org_info,$i,"orgname");
		$j = $i+1;
		echo "<tr>\n";
		echo "<td width=5% bgcolor=#CCFFCC><font size=5 color=#FF9999>".$j."</font></td>\n";
		echo "<td width=25% align=center>$org_name</td>\n";
		echo "</tr>\n";
		
	}
	echo "</table>\n";
	echo "<input type=submit value='�� ��' onclick=\"location.href='list.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
        
	mysql_close();
	exit();
}
if($xorg == 1){
	include "./inc/db.inc.php";
	
	$org_info = @mysql_query("SELECT orgname FROM org WHERE orgpos < 0 ORDER BY orgpos ASC LIMIT 0,10");
	$num = @mysql_num_rows($org_info);
	
	echo "<table border=2 cellpadding=0 cellspacing=0 bordercolor=#111111 width=100%>\n";
	for($i=0;$i<$num;$i++){
		$org_name = mysql_result($org_info,$i,"orgname");
		$j = $i+1;
		echo "<tr>\n";
		echo "<td width=5% bgcolor=#CCFFCC><font size=5 color=#FF9999>".$j."</font></td>\n";
		echo "<td width=25% align=center>$org_name</td>\n";
		echo "</tr>\n";
		
	}
	echo "</table>\n";
	echo "<input type=submit value='�� ��' onclick=\"location.href='list.php'\" style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
        
	mysql_close();
	exit();
}
?>
<h3 align=center>�������а�</h3>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" bgcolor="#99CCFF">
  <tr>
    <td width="25%"><a href=list.php?qiang=1>��ʮ�����</a></td>
    <td width="25%"><a href=list.php?xia=1>��ʮ������</a></td>
    <td width="25%"><a href=list.php?eren=1>��ʮ�����</a></td>
    <td width="25%"><a href=list.php?mon=1>��ʮ����</a></td>
  </tr>
  <tr>
    <td width="25%"><a href=list.php?zorg=1>��ʮ�����ɰ��</a></td>
    <td width="25%"><a href=list.php?xorg=1>��ʮ��а�ɰ��</a></td>
    <td width="25%"></td>
    <td width="25%"></td>
  </tr>
</table>
<?
	include "./include/back_xy.inc.php";
?>