<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$D1=$_GET['D1'];
$buy=$_GET['buy'];
$begin_buy=$_GET['begin_buy'];
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
==============
=武器交易 (Ver 0.1.2)
=公元 2001年11月12日
==============
*/

include "./include/area_now_ct.inc.php";
$way = array("wuqi_trade.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("随风武器店","wuqi_trade.php","$user_id");
?>
<?
if($begin_buy == 1){	
	include "./inc/db.inc.php";
	
	if(!session_is_registered("wuqi_id")){
		echo "你想买什么阿?\n";
		exit();
	}
	/*
	$wuqi_learned = mysql_query("SELECT wuqiid FROM renwu_wuqi WHERE id='$user_id' AND wuqiid='$wuqi_id'") or die("数据库问题\n");
	if(mysql_num_rows($wuqi_learned)){
		echo "<br><font color=green>你已经有了这种物品</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=wuqi_trade.php\">";
		exit();
	}
	*/
	$user_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$user_mon = mysql_result($user_info,0,"mon");
	
	$user_mon -= $wuqi_pri;
	
	mysql_query("UPDATE renwu_member SET mon='$user_mon' WHERE id='$user_id'");
	
	mysql_query("INSERT INTO renwu_wuqi VALUES('','$user_id','$wuqi_id','0','N','$wuqi_cla')") or die("数据库问题\n");
	
	echo "物品".$wuqi_name."已经购买。\n";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=wuqi_trade.php\">";
	mysql_close();
	exit();
}
?>

<?
if($buy == 1){
	include "./inc/db.inc.php";
		
	$wuqi_info = mysql_query("SELECT * FROM zhuangbei_wuqi WHERE id='$D1'");
	$wuqi_name = mysql_result($wuqi_info,0,"name");
	$wuqi_pri = mysql_result($wuqi_info,0,"pri");
	$wuqi_at = mysql_result($wuqi_info,0,"at");
	$wuqi_de = mysql_result($wuqi_info,0,"de");
	$wuqi_te = mysql_result($wuqi_info,0,"te");
	$wuqi_des = mysql_result($wuqi_info,0,"des");
	$wuqi_cla = mysql_result($wuqi_info,0,"cla");
	
	echo "【名称】[".$wuqi_cla."]".$wuqi_name."<br>\n";
	echo "【介绍】".$wuqi_des."<br>\n";
	echo "【价格】".$wuqi_pri."<br>\n";
	echo "【攻击力】".$wuqi_at."<br>\n";
	echo "【防御力】".$wuqi_de."<br>\n";
	echo "【质地】".$wuqi_te."<br>\n";
	
	$user_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$user_mon = mysql_result($user_info,0,"mon");
	
	if($user_mon < $wuqi_pri){
		echo "<br><font color=green>你的钱还不够</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"5; url=wuqi_trade.php\">";
		exit();
	}
			
	$wuqi_id = $D1;
	session_register("wuqi_id");
	session_register("wuqi_cla");
	session_register("wuqi_pri");
	session_register("wuqi_name");
	echo "<br><a href=wuqi_trade.php?begin_buy=1><font color=green>购买</font></a>\n";
		
	mysql_close();
	echo "<hr align=center width=80%>";
}
?>
<?
	$empty_r=0;	
	
	echo "<br>==============随风武器店==============<br>";
	echo ("这是城里最有名的一家武器店，为什么取名【随风】，江湖传说是因为这里的老板以前是一名
	随风流浪的剑客，但不知发生了什么事情不再能随风了，所以现在才在这里开了武器店。你可以
	看到店里装饰古朴大方，但又不失江湖气概。这里十八般兵器样样都有，件件寒光闪闪，看来老板十分爱惜它们。
	");
	
    	$npc_org = "武器商店";
    	include "./include/list_npc.inc.php";    	
    	
    	if($wuqi_sell) include "./include/sell_wuqi.inc.php";	
	
	echo "<br>==============出售武器==============";
        $my_wuqi = mysql_query("SELECT id_num,name,used,sk FROM renwu_wuqi,zhuangbei_wuqi WHERE zhuangbei_wuqi.id=renwu_wuqi.wuqiid AND renwu_wuqi.id='$user_id'");
	$wuqi_num = mysql_num_rows($my_wuqi);
	if($wuqi_num){
	echo "<form action=wuqi_trade.php method=post>\n";
	echo "<select name=wuqi_use size=1>\n";
	echo "<option value=>选择武器</option>\n";
	for($i=0;$i<$wuqi_num;$i++){
		$wuqi_namei = mysql_result($my_wuqi,$i,"name");
		$wuqi_idnum = mysql_result($my_wuqi,$i,"id_num");
		$wuqi_used = mysql_result($my_wuqi,$i,"used");
		$wuqi_sk = mysql_result($my_wuqi,$i,"sk");
		if($wuqi_used == "Y")	echo "<option value=$wuqi_idnum>".$wuqi_namei."（装备中）＋".$wuqi_sk."</option>\n";
		else echo "<option value=$wuqi_idnum>".$wuqi_namei."＋".$wuqi_sk."</option>\n";
	}
	echo "</select>\n";
	echo "<input type=submit value=出售 name=wuqi_sell style=\"font-family: 宋体; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
	echo "</form>\n";
	}else{
		echo "<br><font color=#cococo>你还没有自己的武器</font>\n";
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
    	$gongfu = mysql_query("SELECT id,name FROM zhuangbei_wuqi WHERE cla='$cla[$k]' AND hidden='N' AND here='侠域城' ORDER BY pri ASC");
        $gongfu_num = mysql_num_rows($gongfu);
        echo "<option value=>$cla[$k].......</option>\n";
        for($i=0;$i<=$gongfu_num-1;$i++){
        	$gongfu_name = mysql_result($gongfu,$i,"name");
        	$gongfu_id = mysql_result($gongfu,$i,"id");
        	echo "<option value=wuqi_trade.php?buy=1&D1=$gongfu_id>".$gongfu_name."</option>\n";
        }
                
        echo "</select>\n";
        echo "<a href=list_ziliao.php?mc=武器&cla=$cla[$k]>详细资料</a>\n";
        echo "</form>\n";
        echo "</td>\n";
     }
     
     mysql_close();
     
     include "./include/back_xy.inc.php";
?>