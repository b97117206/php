<?
session_save_path("xytmp");
session_start();
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";


include "./include/area_now_ct.inc.php";

$user_id=$_SESSION["user_id"];
$D1=$_GET['D1'];
$xue=$_GET['xue'];
$begin_xue=$_GET['begin_xue'];
$wugong_name=$_GET['wugong_name'];



$way = array("wugong_learn.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("����ѧԺ","wugong_learn.php","$user_id");
?>

<?
if($begin_xue == 1){	
	include "./inc/db.inc.php";
	
	if(!session_is_registered("wugong_id")){
		echo "����ѧʲô��?\n";
		exit();
	}
	$wugong_learned = mysql_query("SELECT wugongid FROM renwu_wugong WHERE id='$user_id' AND wugongid='$wugong_id'") or die("���ݿ�����\n");
	if(mysql_num_rows($wugong_learned)){
		echo "<br><font color=green>���Ѿ�ѧ�����⹦��</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=wugong_learn.php\">";
		exit();
	}
	$my_info = mysql_query("SELECT mon FROM renwu_member WHERE id='$user_id'");
	$my_mon = mysql_result($my_info,0,"mon");
	
		
	if($my_mon <= $need_mon){
		echo "<br><font color=green>��ѧ�Ѳ�������ѧϰ</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=wugong_learn.php\">";
		exit();
		mysql_close();
	}
	
	$my_mon -= $need_mon;
	mysql_query("UPDATE renwu_member SET mon='$my_mon' WHERE id='$user_id'");
	mysql_query("INSERT INTO renwu_wugong VALUES('$user_id','$wugong_id','0','N','$wugong_cla')") or die("���ݿ�����\n");
	
	echo "�书".$wugong_name."�Ѿ�ѧ���ˡ�\n";
	echo "<meta http-equiv=\"refresh\" content=\"2; url=wugong_learn.php\">";
	mysql_close();
	exit();
}
?>

<?
if($xue == 1){
	include "./inc/db.inc.php";	
	
	
	
	$wugong_info = mysql_query("SELECT * FROM wugong_gongfu WHERE id='$D1'");
	$wugong_name = mysql_result($wugong_info,0,"name");
	$wugong_wep = mysql_result($wugong_info,0,"wep");
	$wugong_zao1 = mysql_result($wugong_info,0,"zao1");
	$wugong_zao2 = mysql_result($wugong_info,0,"zao2");
	$wugong_zao3 = mysql_result($wugong_info,0,"zao3");
	$wugong_zao4 = mysql_result($wugong_info,0,"zao4");
	$wugong_zao5 = mysql_result($wugong_info,0,"zao5");
	$wugong_cla = mysql_result($wugong_info,0,"cla");
	$wugong_des = mysql_result($wugong_info,0,"des");
	$wugong_xz = mysql_result($wugong_info,0,"xz");
	$wugong_poslimit = mysql_result($wugong_info,0,"poslimit");
	
	$wugong_xz = $wugong_xz*1000;
	$need_mon = $wugong_xz/10;
	
	echo "�����ơ�[".$wugong_cla."]".$wugong_name."<br>\n";
	echo "�����ܡ�".$wugong_des."<br>\n";
	if($wugong_wep == ''){
		echo "������ʹ�á���������<br>\n";
		}else
	echo "������ʹ�á�".$wugong_wep."<br>\n";
	echo "����Ҫ���顿".$wugong_xz."<br>\n";
	echo "����Ҫ������".$wugong_poslimit."<br>\n";
	echo "����һ�����ơ�".$wugong_zao1."<br>\n";
	echo "���ڶ������ơ�".$wugong_zao2."<br>\n";
	echo "�����������ơ�".$wugong_zao3."<br>\n";
	echo "�����������ơ�".$wugong_zao4."<br>\n";
	echo "�����������ơ�".$wugong_zao5."<br>\n";
	echo "��ѧ�ѡ�".$need_mon."<br>\n";
	
	$user_info = mysql_query("SELECT exp,pos FROM renwu_member WHERE id='$user_id'");
	$user_exp = mysql_result($user_info,0,"exp");
	$user_pos = mysql_result($user_info,0,"pos");
	
	if($user_exp < $wugong_xz){
		echo "<br><font color=green>�㾭�鲻������ѧϰ</font>\n";
		echo "<meta http-equiv=\"refresh\" content=\"2; url=wugong_learn.php\">";
		exit();
	}
	
	if($wugong_poslimit < 0){
		if($user_pos > $wugong_poslimit){
			echo "<br><font color=green>����������</font>\n";
			echo "<meta http-equiv=\"refresh\" content=\"2; url=wugong_learn.php\">";
			exit();
		}
	      }
	
	if($wugong_poslimit > 0){
		if($user_pos < $wugong_poslimit){
			echo "<br><font color=green>����������</font>\n";
			echo "<meta http-equiv=\"refresh\" content=\"2; url=wugong_learn.php\">";
			exit();
	      }
	}
		
	$wugong_id = $D1;
	session_register("wugong_id");
	session_register("wugong_cla");
	session_register("need_mon");
	echo "<br><a href=wugong_learn.php?begin_xue=1&wugong_name=$wugong_name><font color=green>ѧϰ</font></a>\n";
		
	mysql_close();
	echo "<hr align=center width=80%>";
}
?>

<?
	$empty_r=0;
	
	echo "<br>==============����ѧԺ==============<br>\n";
	echo ("
		������ǽ����ˣ�����һ�����᲻֪��������ѧԺ���������������ѧϰ�����������ȭ��
		���������ڹ�������˵������ѧ��֮�˵�ʥ�ء�
	");
	$npc_org = "����ѧԺ";
    	include "./include/list_npc.inc.php";
	function compare_array($temp,$array){
	$num=count($array);
	for($i=0;$i<$num;$i++){
     	if($temp == $array[$i])
          	return 0;
	}
	return 1;
	}

	$result=mysql_query("SELECT cla FROM wugong_gongfu");

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
    	$gongfu = mysql_query("SELECT id,name FROM wugong_gongfu WHERE cla='$cla[$k]' AND who_is='����' ORDER BY xz ASC");
        $gongfu_num = mysql_num_rows($gongfu);
        echo "<option value=>$cla[$k]........</option>\n";
        for($i=0;$i<=$gongfu_num-1;$i++){
        	$gongfu_name = mysql_result($gongfu,$i,"name");
        	$gongfu_id = mysql_result($gongfu,$i,"id");
        	echo "<option value=wugong_learn.php?D1=$gongfu_id&xue=1>".$gongfu_name."</option>\n";
        }
                
        echo "</select>\n"; echo "<a href=list_ziliao.php?mc=�书&cla=$cla[$k]>��ϸ����</a>\n";
        echo "<br></form></td>\n";
     }
     
     mysql_close();
     include "./include/back_xy.inc.php";
?>