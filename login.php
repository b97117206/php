<?
session_save_path("xytmp");
session_start();

include "inc/config.inc.php";
include "inc/style.inc.php";

?>
<?
	include "./inc/db.inc.php";
	
	$member_num = mysql_query("SELECT COUNT(id) FROM renwu_member");
	
	$member_num = mysql_fetch_row($member_num);	
	
	echo "<p align=center>����Ա��<a href=mailto:".$useremail."><font color=blue>".$userid."</font></a>&nbsp;&nbsp;";
	echo "ע�������<font color=blue>".$member_num[0]."/".$maxmember."</font>&nbsp;&nbsp;";
	echo "��������ʱ�ޣ�<font color=blue>".$data_day."��</font>";
	
	mysql_close();
?>
<?
$login=$_GET[login];
//echo "����login��".$login;
if($login == 1){
	include "./inc/db.inc.php";
	$T1=$_POST[T1];
	$T2=$_POST[T2];
	
	//$user_id = $T1; 
	$_SESSION["user_id"]=$T1;
	$user_login = mysql_query("SELECT name,pw FROM renwu_member WHERE id='$T1'");
	if(!@mysql_num_rows($user_login)){
		echo "<p align=center><img src=$pic_url/w.gif></img><br>";
        	echo "<font size=4>��Ǹ��û������ʺ�</font>\n";
        	echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
        	exit();
        }else{
        	$password = mysql_result($user_login,0,"pw");
        	if($password == $T2){
        		$user_name = mysql_result($user_login,0,"name");  		
        		//session_register("user_id");
        		//session_register("user_name");
        		
        		$_SESSION["user_name"]=$T1;
        		$nowtime = time();
        		
        		//IP,ID���
        		$now_ip = $REMOTE_ADDR;
        		$distance_time = $nowtime - 3600;
        		mysql_query("DELETE FROM ip_date WHERE login_time<'$distance_time'");
        		$ip_info = mysql_query("SELECT id FROM ip_date WHERE ip='$now_ip' ORDER BY login_time DESC");
        		$id = @mysql_result($ip_info,0,"id");
        		/*if($id != $user_id && $id != "" && $now_ip != "61.133.169.238"){
        			echo "<p align=center><img src=$pic_url/w.gif></img><br>";
	        		echo "<font size=4>ϵͳ��⵽����ͼ�ڶ�ʱ����ͬʱ��½����ID�����ѱ���Ϊ�Ƿ���Ϊ��</font>\n";
	        		echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
	        		exit();
        		}*/
        		mysql_query("INSERT INTO ip_date VALUES('$user_id','$now_ip','$nowtime')");
        		echo "<meta http-equiv=\"refresh\" content=\"2; url=xy.php?login=1\">";
        		        		
        		mysql_query("UPDATE misc SET logintime='$nowtime' WHERE id='$user_id'");
        		
        		//���ݱ���������ѯ
        		$limit_time = time() - $data_day * 86400;
        		$del_person = mysql_query("SELECT id FROM misc WHERE logintime < '$limit_time'");
        		$del_num = mysql_num_rows($del_person);
        		for($i=0;$i<$del_num;$i++){
        			$del_id = mysql_result($del_person,$i,"id");
        			include "./include/data_del.inc.php";        			
        		}
        		mysql_close();
        		
        		exit();
        	}else{
            		echo "<p align=center><img src=$pic_url/w.gif></img><br>";
        		echo "<font size=4>��¼������ִ����û�".$user_id."���ܽ���</font>\n";
        		echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
        		exit();            		
     		}
     	}
}
?>