<?
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
================================
=��ϸ���ϲ�ѯ (Ver 0.4.1)
=��Ԫ 2001��12��27��
================================
*/
?>
<?
$mc=$_GET['mc'];
$cla=$_GET['cla'];
if($mc == "�书"){
	include "./inc/db.inc.php";
	
	$wugong_ziliao = mysql_query("SELECT * FROM wugong_gongfu WHERE cla='$cla' ORDER BY xz ASC");
	$wugong_num = mysql_num_rows($wugong_ziliao);
	
	echo ("
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%'>
  			<tr>
    			<td width='50%' bgcolor='#669999'><font color=#FF8000>�����Ƽ����ܡ�</font>��</td>
    			<td width='25%' bgcolor='#669999'><font color=#FF8000>���书������</font>��</td>
    			<td width='25%' bgcolor='#669999'><font color=#FF8000>��Ҫ��</font>��</td>
  			</tr>
  		");
  		
	for($i=0;$i<$wugong_num;$i++){	
		$wugong_name = mysql_result($wugong_ziliao,$i,'name');
		$wugong_zao1 = mysql_result($wugong_ziliao,$i,'zao1');
		$wugong_zao2 = mysql_result($wugong_ziliao,$i,'zao2');
		$wugong_zao3 = mysql_result($wugong_ziliao,$i,'zao3');
		$wugong_zao4 = mysql_result($wugong_ziliao,$i,'zao4');
		$wugong_zao5 = mysql_result($wugong_ziliao,$i,'zao5');
		$wugong_des = mysql_result($wugong_ziliao,$i,'des');
		$wugong_xz = mysql_result($wugong_ziliao,$i,'xz');
		$wugong_poslimit = mysql_result($wugong_ziliao,$i,'poslimit');
	
		$wugong_xz = $wugong_xz*1000;
		$need_mon = $wugong_xz/10;
		
		echo ("
  			<tr>
    			<td width='50%'>��".$wugong_name."������".$wugong_des."��</td>
    			<td width='25%'>".$wugong_zao1."<br>".$wugong_zao2."<br>".$wugong_zao3."<br>".$wugong_zao4."<br>".$wugong_zao5."</td>
    			<td width='25%'>Ҫ���飺".$wugong_xz."<br>Ҫ��������".$wugong_poslimit."<br>ѧ�ѣ�".$need_mon."��</td>
  			</tr>
  		");
	}
	echo "</table>\n";
	mysql_close();
	exit();
}
if($mc == "װ��"){
	include "./inc/db.inc.php";
	
	$wupin_ziliao = mysql_query("SELECT * FROM zhuangbei_wupin WHERE cla='$cla' ORDER BY pri ASC");
	$wupin_num = mysql_num_rows($wupin_ziliao);
	
	echo ("
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%'>
  			<tr>
    			<td width='50%' bgcolor='#669999'><font color=#FF8000>�����Ƽ����ܡ�</font>��</td>
    			<td width='25%' bgcolor='#669999'><font color=#FF8000>�����ԡ�</font>��</td>
    			<td width='25%' bgcolor='#669999'><font color=#FF8000>����ֵ��</font>��</td>
  			</tr>
  		");
	
	for($i=0;$i<$wupin_num;$i++){
		$wupin_name = mysql_result($wupin_ziliao,$i,"name");
		$wupin_pri = mysql_result($wupin_ziliao,$i,"pri");
		$wupin_at = mysql_result($wupin_ziliao,$i,"at");
		$wupin_de = mysql_result($wupin_ziliao,$i,"de");
		$wupin_te = mysql_result($wupin_ziliao,$i,"te");
		$wupin_sp = mysql_result($wupin_ziliao,$i,"sp");
		$wupin_des = mysql_result($wupin_ziliao,$i,"des");
		$wupin_xz = mysql_result($wupin_ziliao,$i,"xz");
		$wupin_here = mysql_result($wupin_ziliao,$i,"here");
		
		echo ("
  			<tr>
    			<td width='50%'>��".$wupin_name."������".$wupin_des."��</td>
    			<td width='25%'>����Ч����".$wupin_at."<br>����Ч����".$wupin_de."<br>��Ʒ�ʵأ�".$wupin_te."<br>������Ҫ��".($wupin_xz*100)."<br>�����أ�".$wupin_here."<br>����Ч����".$wupin_sp."</td>
    			<td width='25%'>".$wupin_pri."��</td>
  			</tr>
  		");
	}
	echo "</table>\n";
	mysql_close();
	exit();
}
if($mc == "����"){
	include "./inc/db.inc.php";
	
	$wuqi_ziliao = mysql_query("SELECT * FROM zhuangbei_wuqi WHERE cla='$cla' ORDER BY pri ASC");
	$wuqi_num = mysql_num_rows($wuqi_ziliao);
	
	echo ("
			<table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%'>
  			<tr>
    			<td width='50%' bgcolor='#669999'><font color=#FF8000>�����Ƽ����ܡ�</font>��</td>
    			<td width='25%' bgcolor='#669999'><font color=#FF8000>�����ԡ�</font>��</td>
    			<td width='25%' bgcolor='#669999'><font color=#FF8000>����ֵ��</font>��</td>
  			</tr>
  		");
  		
  	for($i=0;$i<$wuqi_num;$i++){
		$wuqi_name = mysql_result($wuqi_ziliao,$i,"name");
		$wuqi_pri = mysql_result($wuqi_ziliao,$i,"pri");
		$wuqi_at = mysql_result($wuqi_ziliao,$i,"at");
		$wuqi_de = mysql_result($wuqi_ziliao,$i,"de");
		$wuqi_te = mysql_result($wuqi_ziliao,$i,"te");
		$wuqi_des = mysql_result($wuqi_ziliao,$i,"des");
		$wuqi_xz = mysql_result($wuqi_ziliao,$i,"xz");
		$wuqi_here = mysql_result($wuqi_ziliao,$i,"here");
		
		echo ("
  			<tr>
    			<td width='50%'>��".$wuqi_name."������".$wuqi_des."��</td>
    			<td width='25%'>����Ч����".$wuqi_at."<br>����Ч����".$wuqi_de."<br>������Ҫ��".($wuqi_xz*100)."<br>�����أ�".$wuqi_here."<br>��Ʒ�ʵأ�".$wuqi_te."</td>
    			<td width='25%'>".$wuqi_pri."��</td>
  			</tr>
  		");
  	}
  	echo "</table>\n";
	mysql_close();
	exit();
}
?>