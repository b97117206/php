<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$begin_buy=$_GET['begin_buy'];
$buy=$_GET['buy'];
$D1=$_GET['D1'];
$wuqi_use=$_POST['wuqi_use'];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "../inc/style.inc.php";
/*
==============
=���˴��������� (Ver 0.4.2)
=��Ԫ 2002��1��7��
==============
*/

include "../include/area_now.inc.php";
$way = array("ereng/erenc.php","ereng/erenc_wuqi_trade.php");
area_now($way,$user_id);

include "../include/location_lu.inc.php";
up_location("����������","ereng/erenc_wuqi_trade.php","$user_id");
?>
<?
if($begin_buy == 1){	
	include "../inc/db.inc.php";
	
	if(!$_SESSION['wuqi_id']){
		echo "������ʲô��?\n";
		exit();
	}
	
	$user_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$user_mon = mysql_result($user_info,0,"mon");
	
	$user_mon -= $wuqi_pri;
	
	mysql_query("UPDATE renwu_member SET mon='$user_mon' WHERE id='$user_id'");
	
	mysql_query("INSERT INTO renwu_wuqi VALUES('','$user_id','$wuqi_id','0','N','$wuqi_cla')") or die("���ݿ�����\n");
	
	echo "��Ʒ".$wuqi_name."�Ѿ�����\n";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=erenc_wuqi_trade.php\">";
	mysql_close();
	exit();
}
?>

<?
if($buy == 1){
	include "../inc/db.inc.php";
		
	$wuqi_info = mysql_query("SELECT * FROM zhuangbei_wuqi WHERE id='$D1'");
	$wuqi_name = mysql_result($wuqi_info,0,"name");
	$wuqi_pri = mysql_result($wuqi_info,0,"pri");
	$wuqi_at = mysql_result($wuqi_info,0,"at");
	$wuqi_de = mysql_result($wuqi_info,0,"de");
	$wuqi_te = mysql_result($wuqi_info,0,"te");
	$wuqi_des = mysql_result($wuqi_info,0,"des");
	$wuqi_cla = mysql_result($wuqi_info,0,"cla");
	
	echo "�����ơ�[".$wuqi_cla."]".$wuqi_name."<br>\n";
	echo "�����ܡ�".$wuqi_des."<br>\n";
	echo "���۸�".$wuqi_pri."<br>\n";
	echo "����������".$wuqi_at."<br>\n";
	echo "����������".$wuqi_de."<br>\n";
	echo "���ʵء�".$wuqi_te."<br>\n";
	
	$user_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$user_mon = mysql_result($user_info,0,"mon");
	
	if($user_mon < $wuqi_pri){
		echo "<br><font color=green>���Ǯ������</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=erenc_wuqi_trade.php\">";
		exit();
	}
			
	$wuqi_id = $D1;
	session_register("wuqi_id");
	session_register("wuqi_cla");
	session_register("wuqi_pri");
	session_register("wuqi_name");
	echo "<br><a href=erenc_wuqi_trade.php?begin_buy=1><font color=green>����</font></a>\n";
		
	mysql_close();
	echo "<hr align=center width=80%>";
}
?>
<?
	$empty_r=0;	
	
	echo "<br>==============����������==============<br>";
	echo ("���Ƕ��˴��������忪�������̵꣬����Կ������ﲼ�õ�ʮ�����գ��ƺ�ÿ�������ж�����������ԩ�ꡣ������������򵽡����˴塿���е�������
	");
	
    	$npc_org = "����������";
    	include "../include/list_npc.inc.php";   
    	 	
    	echo ("
	<br>
	������Է���==><br>	
	<a href=./erenc.php>�����˴塿<a/><br>
	");
	
    	if($wuqi_sell) include "../include/sell_wuqi.inc.php";	
	
	echo "<br>==============��������==============";
        $my_wuqi = mysql_query("SELECT id_num,name,used,sk FROM renwu_wuqi,zhuangbei_wuqi WHERE zhuangbei_wuqi.id=renwu_wuqi.wuqiid AND renwu_wuqi.id='$user_id'");
	$wuqi_num = mysql_num_rows($my_wuqi);
	if($wuqi_num){
	echo "<form action=erenc_wuqi_trade.php method=post>\n";
	echo "<select name=wuqi_use size=1>\n";
	echo "<option value=>ѡ������</option>\n";
	for($i=0;$i<$wuqi_num;$i++){
		$wuqi_namei = mysql_result($my_wuqi,$i,"name");
		$wuqi_idnum = mysql_result($my_wuqi,$i,"id_num");
		$wuqi_used = mysql_result($my_wuqi,$i,"used");
		$wuqi_sk = mysql_result($my_wuqi,$i,"sk");
		if($wuqi_used == "Y")	echo "<option value=$wuqi_idnum>".$wuqi_namei."��װ���У���".$wuqi_sk."</option>\n";
		else echo "<option value=$wuqi_idnum>".$wuqi_namei."��".$wuqi_sk."</option>\n";
	}
	echo "</select>\n";
	echo "<input type=submit value=���� name=wuqi_sell style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	echo "</form>\n";
	}else{
		echo "<br><font color=#cococo>�㻹û���Լ�������</font>\n";
	}
	
	function compare_array($temp,$array){
	$num=count($array);
	for($i=0;$i<$num;$i++){
     	if($temp == $array[$i])
          	return 0;
	}
	return 1;
	}

	$result=mysql_query("SELECT cla FROM zhuangbei_wuqi");

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
    	$gongfu = mysql_query("SELECT id,name FROM zhuangbei_wuqi WHERE cla='$cla[$k]' AND hidden='N' AND here='���˴�' ORDER BY pri ASC");
        $gongfu_num = mysql_num_rows($gongfu);
        echo "<option value=>$cla[$k].......</option>\n";
        for($i=0;$i<=$gongfu_num-1;$i++){
        	$gongfu_name = mysql_result($gongfu,$i,"name");
        	$gongfu_id = mysql_result($gongfu,$i,"id");
        	echo "<option value=erenc_wuqi_trade.php?buy=1&D1=$gongfu_id>".$gongfu_name."</option>\n";
        }
                
        echo "</select>\n";
        echo "<a href=../list_ziliao.php?mc=����&cla=$cla[$k]>��ϸ����</a>\n";
        echo "</form>\n";
        echo "</td>\n";
     }
     
     mysql_close();     
?>