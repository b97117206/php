<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$begin_buy=$_GET['$begin_buy'];
$D1=$_GET['D1'];
$buy=$_GET['buy'];
$wupin_use=$_POST['wupin_use'];
$wupin_idnum=$_POST['wupin_idnum'];
$wupin_sell=$_POST['wupin_sell'];

include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
==============
=��Ʒ���� (Ver 0.1.2)
=��Ԫ 2001��11��12��
==============
*/

include "./include/area_now_ct.inc.php";
$way = array("wupin_trade.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("����װ����","wupin_trade.php","$user_id");
?>

<?
if($begin_buy == 1){	
	include "./inc/db.inc.php";
	
	if(!$_SESSION['wupin_id']){
		echo "������ʲô?\n";
		exit();
	}
	/*
	$wupin_learned = mysql_query("SELECT wupinid FROM renwu_wupin WHERE id='$user_id' AND wupinid='$wupin_id'") or die("���ݿ�����\n");
	if(mysql_num_rows($wupin_learned)){
		echo "<br><font color=green>���Ѿ�����������Ʒ</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=wupin_trade.php\">";
		exit();
	}
	*/
	$user_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$user_mon = mysql_result($user_info,0,"mon");
	
	$user_mon -= $wupin_pri;
	
	mysql_query("UPDATE renwu_member SET mon='$user_mon' WHERE id='$user_id'");
	
	mysql_query("INSERT INTO renwu_wupin VALUES('','$user_id','$wupin_id','0','N','$wupin_cla')") or die("���ݿ�����\n");
	
	echo "��Ʒ".$wupin_name."�Ѿ�����\n";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=wupin_trade.php\">";
	mysql_close();
	exit();
}
?>

<?
if($buy == 1){
	include "./inc/db.inc.php";
	
	
	$wupin_info = mysql_query("SELECT * FROM zhuangbei_wupin WHERE id='$D1'");
	$wupin_name = mysql_result($wupin_info,0,"name");
	$wupin_pri = mysql_result($wupin_info,0,"pri");
	$wupin_at = mysql_result($wupin_info,0,"at");
	$wupin_de = mysql_result($wupin_info,0,"de");
	$wupin_te = mysql_result($wupin_info,0,"te");
	$wupin_sp = mysql_result($wupin_info,0,"sp");
	$wupin_des = mysql_result($wupin_info,0,"des");
	$wupin_cla = mysql_result($wupin_info,0,"cla");
	
	echo "�����ơ�[".$wupin_cla."]".$wupin_name."<br>\n";
	echo "�����ܡ�".$wupin_des."<br>\n";
	echo "���۸�".$wupin_pri."<br>\n";
	echo "����������".$wupin_at."<br>\n";
	echo "����������".$wupin_de."<br>\n";
	echo "���ʵء�".$wupin_te."<br>\n";
	echo "�����⡿".$wupin_sp."<br>\n";
	
	$user_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$user_mon = mysql_result($user_info,0,"mon");
	
	if($user_mon < $wupin_pri){
		echo "<br><font color=green>���Ǯ������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=wupin_trade.php\">";
		exit();
	}
	
	$wupin_id = $D1;
	session_register("wupin_id");
	session_register("wupin_cla");
	session_register("wupin_pri");
	session_register("wupin_name");
	echo "<br><a href=wupin_trade.php?begin_buy=1><font color=green>����</font></a>\n";
		
	mysql_close();
	echo "<hr align=center width=80%>";
}
?>

<?
	$empty_r=0;

	include "./inc/db.inc.php"; 	
	
	echo "<br>==============����װ����==============<br>";
	echo ("
		�����Ҫ�ʱ���ʲô�ط������ҵ��������Ҳ����Ķ�������ô����һ����˸�����
		�ڡ�����װ���꡿������һ���˸�������Ф�ϰ����������װ���꡿����һ���̵�
		��������ҵ��������������Ҫ�����ж�����
	");
    	$npc_org = "װ���̵�";
    	include "./include/list_npc.inc.php";
    	if($wupin_sell) include "./include/sell_wupin.inc.php";
    	echo "<br>==============����װ��==============";
	
        $my_wupin = mysql_query("SELECT id_num,name,used FROM renwu_wupin,zhuangbei_wupin WHERE zhuangbei_wupin.id=renwu_wupin.wupinid AND renwu_wupin.id='$user_id'");
	$wupin_num = mysql_num_rows($my_wupin);
	if($wupin_num > 0){
	echo "<form action=wupin_trade.php method=post>\n";
	echo "<select name=wupin_use size=1>\n";
	echo "<option value=>ѡ����Ʒ</option>\n";
	for($i=0;$i<$wupin_num;$i++){	
		$wupin_namei = mysql_result($my_wupin,$i,"name");
		$wupin_idnum = mysql_result($my_wupin,$i,"id_num");
		$wupin_used = mysql_result($my_wupin,$i,"used");
		if($wupin_used == "Y")	echo "<option value=$wupin_idnum>".$wupin_namei."��װ���У�</option>\n";
		else echo "<option value=$wupin_idnum>".$wupin_namei."</option>\n";
	}
	echo "</select>\n";
	echo "<input type=submit value=���� name=wupin_sell style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	echo "</form>\n";
	}else{
		echo "<br><font color=#cococo>���ڻ���Ȼһ��</font>\n";
	}
	function compare_array($temp,$array){
	$num=count($array);
	for($i=0;$i<$num;$i++){
     	if($temp == $array[$i])
          	return 0;
	}
	return 1;
	}

	$result=mysql_query("SELECT cla FROM zhuangbei_wupin");

	$num=mysql_num_rows($result);
	for($i=0;$i<$num;$i++){
     	$class_temp=mysql_result($result,$i,"cla");
     	if(compare_array($class_temp,$mainclass)){
          	$mainclass[$empty_r]=$class_temp;
          	$empty_r++;
     	}
	}

    $cla=$mainclass;
    
    for($k=0;$k<count($cla);$k++){
    
    	echo "<tr><td width=100%>\n";
    	echo "<form>\n";
    	echo "<select size=1 name=D1 onChange='window.location=form.D1.options[form.D1.selectedIndex].value'>\n";
    	$gongfu = mysql_query("SELECT id,name FROM zhuangbei_wupin WHERE cla='$cla[$k]' AND hidden='N' AND here='�����' ORDER BY pri ASC");
        $gongfu_num = mysql_num_rows($gongfu);
        echo "<option value=>$cla[$k].....</option>\n";
        for($i=0;$i<=$gongfu_num-1;$i++){
        	$gongfu_name = mysql_result($gongfu,$i,"name");
        	$gongfu_id = mysql_result($gongfu,$i,"id");
        	echo "<option value=wupin_trade.php?buy=1&D1=$gongfu_id>".$gongfu_name."</option>\n";
        }
                
        echo "</select>\n";
        echo "<a href=list_ziliao.php?mc=װ��&cla=$cla[$k]>��ϸ����</a>\n";
        echo "</form>\n";
        echo "</td>\n";
     }
     
     mysql_close();
     
     include "./include/back_xy.inc.php";
?>