<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$id=$_GET['id'];
$edit=$_GET['edit'];
$home_name=$_POST['home_name'];
$home_des=$_POST['home_des'];
$R1=$_POST['R1'];
$kickout=$_GET['kickout'];
$sleep=$_GET['sleep'];

include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=
=��Ԫ 2002������
==============
*/
//�ж�˲��
include "../include/area_now.inc.php";
$way = array("bhc/wj_home.php");
$way[] = "bhc/wj_bhome.php?id=".$id;
area_now($way,$user_id);
?>
<?
	if(empty($id)){
			echo "��Ч����";
			exit();
		}
		
	include "../inc/db.inc.php";
	$home_info = mysql_query("SELECT * FROM wj_home WHERE id='$id'");
	$home_id = mysql_result($home_info,0,"id");	
	$home_open = mysql_result($home_info,0,"open");
	
	if($home_open == "N" && $home_id != "$user_id"){
		echo "<br><font color=green>�����Ѿ����������ˣ������ȥ��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=wj_home.php\">";
		mysql_close();
		exit();	
	}
	
	if($edit == 1){		
		echo ("
		<center>
			<form action=wj_bhome.php?edit=2&id=$id method=post>
			ȡ����<input type=text name=home_name size=10>(���5������)<br>
			����������<input type=text name=home_des size=15><br>
			����״̬����<input type=radio value=Y checked name=R1>��<input type=radio value=N name=R1>
			<input type=submit name=B1 value='����' style='font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633'>
			</form>
		</center>
		");
	}
	if($edit == 2){
		if($home_id != "$user_id"){
		echo "<br><font color=green>�������˲����㣬����ô����������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=wj_home.php\">";
		mysql_close();
		exit();	
		}
		mysql_query("UPDATE wj_home SET home_name='$home_name',home_des='$home_des',open='$R1' WHERE id='$id'");
		echo "����������ϡ�";
		$home_info = mysql_query("SELECT * FROM wj_home WHERE id='$id'");
	}
	if($kickout == 1){
		if($home_id != "$user_id"){
		echo "<br><font color=green>�������˲����㣬����ô����������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=wj_home.php\">";
		mysql_close();
		exit();	
		}
		$at = "bhc/wj_bhome.php?id=".$id;
		mysql_query("UPDATE misc SET location_id='bhc/wj_home.php',location='��Ҵ�' WHERE location_id='$at'");
		echo "����������ϡ�";
	}
	
	if($sleep == 1){
	$my_info = mysql_query("SELECT kedian FROM misc WHERE id='$id'");
	$my_kedian = mysql_result($my_info,0,"kedian");
	
	$at = "wj_bhome.php?id=".$id;
	if(time() < $my_kedian+300){
		echo "<br><font color=green>��ϢҲ̫Ƶ���ˣ����ڶ�û���κ�Ч���ˣ�</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"3; url=".$at."\">";
		mysql_close();
		exit();	
	}
		
	$time = time();
	
	mysql_query("UPDATE renwu_member SET hpnow=hp,ponow=po WHERE id='$id'");
	mysql_query("UPDATE misc SET kedian='$time' WHERE id='$id'");
	
	echo "<font color=#B3A43E>��������˯��һ�������������泩.....</font><br>\n";	
	}
	
	$home_name = mysql_result($home_info,0,"home_name");
	$home_des = mysql_result($home_info,0,"home_des");
	
	echo "<br>=============".$home_name."===============<br>";
	echo $home_des."��<br>\n";
	
	if($home_id == $user_id){
	echo "<br>�����==><a href=wj_bhome.php?edit=1&id=$id>���÷���</a>|<a href=wj_bhome.php?kickout=1&id=$id>�Ϳ�</a>|<a href=wj_bhome.php?sleep=1&id=$id>��Ϣ</a><br>";
	}
/*
	$npc_org = "";
    	include "../include/list_npc.inc.php";  
*/
	//��¼λ��
	include "../include/location_lu.inc.php";
	up_location("�Լ���","bhc/wj_bhome.php?id=$id","$user_id");
	
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./wj_home.php>����Ҵ塿<a/>
	");
?>