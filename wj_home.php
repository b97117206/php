<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$buy=$_GET['buy'];
$home_name=$_POST['home_name'];
$home_des=$_POST['home_des'];
//$id=$_GET['id'];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=��Ҵ�
=��Ԫ 2002��1��24��
==============
*/
//�ж�˲��
include "../include/area_now.inc.php";
$way = array("bhc/bhc.php","bhc/wj_home.php");

include "../inc/db.inc.php";
$home_info = mysql_query("SELECT id FROM wj_home");
for($i=0;$i<mysql_num_rows($home_info);$i++){
	$b = mysql_result($home_info,$i,"id");
	$b = "bhc/wj_bhome.php?id=".$b;
	$way[] = $b;	
}
mysql_close();

area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("��Ҵ�","bhc/wj_home.php","$user_id");
?>
<?
	echo "<br>=============��Ҵ�===============<br>";
	echo ("�����ǡ�������Ҵ壬������������򷿡��ÿ͡�ÿλ��ҿ��������ﹺ��һ���Լ��ķ��ӣ����ڷ���Ϊʮ�������Լ��ķ��ӾͿ��԰�ȫ�����Լ����������ˡ�<br>
	");
		
/*
	$npc_org = "";
    	include "../include/list_npc.inc.php";  
*/
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./bhc.php>���ٻ��ǡ�<a/>
	");
	
	
	echo ("
		<center>
		<hr width=80%>
		<a href=wj_home.php?buy=1>��ҷ����ð�</a>
		<hr width=80%>			
	");
	
	include "../inc/db.inc.php";
	
	if($buy == 1){
		echo ("
			<form action=wj_home.php?buy=2 method=post>
			ȡ��<input type=text name=home_name size=10>(���5������)<br>
			��������<input type=text name=home_des size=15><br>
			<input type=submit name=B1 value='�� ��' style='font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633'>
			</form>
		");
	}
	if($buy == 2){
		$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
		$mon = mysql_result($my_info,0,"mon");
		
		if($mon < 100000){
			echo "<br><font color=green>��û����ô��Ǯ�ɣ�</font>\n";
			echo "<meta http-equiv=\"refresh\" content=\"5; url=wj_home.php\">";
			mysql_close();
			exit();	
		}
		
		$e_info = @mysql_query("SELECT id FROM wj_home WHERE id='$user_id'");
		$e_name = @mysql_result($e_info,0,"id");
		
		if(!empty($e_name)){
			echo "<br><font color=green>���Ѿ��з�����</font>\n";
			echo "<meta http-equiv=\"refresh\" content=\"5; url=wj_home.php\">";
			mysql_close();
			exit();
		}
		
		mysql_query("INSERT INTO wj_home VALUES('$user_id','$home_name','$home_des','Y')");
		mysql_query("UPDATE renwu_member SET mon=mon-100000 WHERE id='$user_id'");
		echo "<font color=red>��ķ����Ѿ��ð���ˣ����뷿��Ϳ������á�</font>";
	}
	
	$now_home = mysql_query("SELECT id,home_name FROM wj_home");
	$num = mysql_num_rows($now_home);
	
	for($i=0;$i<$num;$i++){
		$home_id = mysql_result($now_home,$i,"id");
		$home_name = mysql_result($now_home,$i,"home_name");
		if($i%2 == 0)	echo "<a href=wj_bhome.php?id=$home_id>��".$home_name."��</a>==========";
		else echo "<a href=wj_bhome.php?id=$home_id>��".$home_name."��</a><br>";
		
	}
?>