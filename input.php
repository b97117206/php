<?
session_save_path("../xytmp");
session_start();

include "../inc/config.inc.php";
include "../inc/style.inc.php";
include "../inc/db.inc.php";
?>
<meta http-equiv="refresh" content="300; url=input.php" charset="utf-8">
<?
$user_name=$_SESSION['user_name'];
$people = $user_name;
//if(!session_is_registered("comein")){
if(!$SESSION_['comein']){
	//session_register("comein");
	$time = time();
	$content = "ĳĳĳ :[".$user_name."]���߽�������";
	mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
	}	
?>
<form action=input.php method="post"> 
<font size=2>��Ƶ����
<select name=room size=1>
<option value=���� selected>����</option>
<option value=ҥ��>ҥ��</option>
<option value=����>����</option>
<option value=��ս>��ս</option>
<option value=����>����</option>
<option value=���>���</option>
<?
	//if($user_id == "���") echo "<option value=ϵͳ>ϵͳ</option>";
?>
</select>
<br>
<font size=2>��������<font color=#CC9900 size=2><? echo $people; ?></font>
<?
//���߼�¼

$filename="online.txt"; 
$onlinetime=300; //�೤ʱ������ߣ���λ���� 

$online_id=file($filename); 
$total_online=count($online_id); 
$nowtime=time(); 

//ɾ���ѵ�����������û� 
for($i=0;$i<$total_online;$i++){ 
$olduser=explode("|*|",$online_id[$i]); 

$hasonlinetime=$nowtime-$olduser[0]; 
if($hasonlinetime<$onlinetime and $user_name!=$olduser[1]) $nowonline[]=$online_id[$i]; 
} 

//��¼��ǰIP�û� 
$nowonline[]=$nowtime."|*|".$user_name."|*|"; 

//�õ���ǰ��������������д���ļ� 
$total_online=count($nowonline); 
$fp=fopen($filename,"w"); 
rewind($fp); 

echo "<br>�����͸���<select name=give_to size=1>";
if(!empty($to)) echo "<option value=".$to.">".$to."</option>\n";
else echo "<option value=all>������.</option>\n";
for($i=0;$i<$total_online;$i++){ 

fputs($fp,$nowonline[$i]); 
$online_name=explode("|*|",$nowonline[$i]);
echo "<option value=".$online_name[1].">".$online_name[1]."</option>\n";
fputs($fp,"\n"); 
} 
echo "</select>\n";
fclose($fp); 
?>
<input type="text" name="message" size=28> <br>
<input type="submit" value="����" style="font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633">
</form>

<?
//������
$sp_info = mysql_query("SELECT name FROM renwu_wuqi,renwu_member WHERE renwu_wuqi.id=renwu_member.id AND wuqiid='di_lu'");
$dilu_name = @mysql_result($sp_info,0,"name");
$sp_info = mysql_query("SELECT name FROM renwu_wuqi,renwu_member WHERE renwu_wuqi.id=renwu_member.id AND wuqiid='qi_sd'");
$qisa_name = @mysql_result($sp_info,0,"name");
$sp_info = mysql_query("SELECT name FROM renwu_wuqi,renwu_member WHERE renwu_wuqi.id=renwu_member.id AND wuqiid='qis_tl'");
$qstl_name = @mysql_result($sp_info,0,"name");
echo ("
<pre>
====<font color=#DA9B45>������Ϣ</font>======<a href=http://www.chunplay.com/bbs/ target=_blank><font size=2>��̳</font></a>
������¬�������ߣ�$dilu_name
������ɱ���������ߣ�$qisa_name
������ɷ���ޡ������ߣ�$qstl_name
================================
[16/02]���ٻ��ǡ����š��μ����С�
[14/02]���ٻ��ǡ�ʥ�ֻش������԰������
	����С��100���˻ָ���150
</pre>
");
?> 
<?
$r = 25;
$r_r = $r + 5;
$del_what = @mysql_query("SELECT time FROM chat ORDER BY time DESC LIMIT $r,$r_r");
for($i=0;$i<mysql_num_rows($del_what);$i++){
$del_time = @mysql_result($del_what,$i,"time");
@mysql_query("DELETE FROM chat WHERE time='$del_time'");
}
$message=$_POST['message'];
$room=$_POST['room'];
$msg = str_replace ( "\n", " ", $message); 
$msg = str_replace ( "<", "&lt",$msg); 
$msg = str_replace ( ">", "&gt",$msg); 
$msg = stripslashes ($msg);         

if ($msg !=  ""){
	$now_time = time();
	if($rumor_b == 1){	
		if((time()-$rumor_time)>$rumor_busytime){
		}else{
		$content = "ĳĳĳ :[".$people."]������ҥ,Ҳ���±��˷���!";
		mysql_query("INSERT INTO chat VALUES('$time','$people','��ҥ�ԡ�','$content','all')");
		}
		$rumor_time = time();
		session_register("rumor_time");
		$content = "ĳĳĳ :$msg";
		mysql_query("INSERT INTO chat VALUES('$time','$people','��ҥ�ԡ�','$content','all')");
				
		$write_file="rumor_log.txt";
		$fp = fopen($write_file,  "a+");
		$fw = fwrite($fp,  "\n��ҥ�Լ�¼��$people :$msg");
		
	}else if($give_to == "all"){
		$people = "[".$user_nick."]".$people;
		$channel = "��".$room."��";
		mysql_query("INSERT INTO chat VALUES('$now_time','$people','$channel','$msg','all')");
	}else{
	$people = "[$user_nick]$people";	
	mysql_query("INSERT INTO chat VALUES('$now_time','$people','���Ի���','$msg','$give_to')");
	}
}
mysql_close();
?>