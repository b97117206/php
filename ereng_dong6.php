<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˹� 1/9/2002
==============
*/
include "../include/area_now.inc.php";
$way = array("ereng/ereng_dong4.php","ereng/ereng_dong6.php","ereng/ereng_dong9.php","ereng/ereng_dong8.php");
area_now($way,$user_id);
?>
<?
	echo "<br>==============���ڲ�·4==============<br>";
	echo ("
	ɽ��������ֲ���������а��֮���������������˵�����һ���ܲ��˵ġ�����Կ���
	������ʮ��ʮ����ֵ�ʯ���ƺ���ס�����ȥ·��<br>
	");
	
	include "./inc/ereng_xiaohao.inc.php";	
    	include "../inc/db.inc.php";
    	$my_info = mysql_query("SELECT exp FROM renwu_member WHERE id='$user_id'");
    	$my_exp = mysql_result($my_info,0,"exp");
    	if($my_exp < 100000){
    		echo ("
    			<br><br><font color=#4F88BB>��Ŭ��ʩչ��ƽ����ѧ���������޷�ͨ����Щʯ��.....</font><br>
    			���޷�ǰ���ˣ�������ֻ�е�ͷ��ȥ�ˡ�<br>
    			<a href=./ereng_dong4.php>�����ڲ�·2��<a/>
    		");
    		exit();
    	}else{
    		echo ("
    			<br><br><p align=center><img src=$pic3_url/xiake/xiake10.jpg border=0></img><br>
    			<font color=#4F88BB>��ʩչƽ����ѧ�������׵�������ʮ��ʯ��</font><br></p>
    		");
    	}
    	
    	include "../include/location_lu.inc.php";
	up_location("����","ereng/ereng_dong6.php","$user_id");
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./ereng_dong9.php>�����ڲ�·7��<a/>
	<a href=./ereng_dong4.php>�����ڲ�·2��<a/>
	<a href=./ereng_dong8.php>�����ڲ�·6��<a/>
	");
?>