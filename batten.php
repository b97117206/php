<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$cla_c=$_GET['cla_c'];
include "./inc/attest.inc.php";

/*
================================
=ս��ϵͳ��� (Ver 0.1.2)
=��Ԫ��2001��11��14��
================================
*/
/*
================================
=����ʹ����� (Ver 0.1.2)
=��Ԫ��2001��11��18��
================================
*/
/*
================================
=ģ���� (Ver 0.1.2)
=��Ԫ��2001��11��25��
================================
*/
/*
================================
=��Ʒʹ��ģ�� (Ver 0.1.2)
=��Ԫ��2001��11��29��
================================
*/
/*
================================
=��֯ս��ģ�� (Ver 0.1.2)
=��Ԫ��2001��12��10��
================================
*/
/*
================================
=����ģ�� (Ver 0.1.2)
=��Ԫ��2001��12��14��
================================
*/
include "./inc/config.inc.php";
include "./inc/style.inc.php";
include "./include/area_now_ct.inc.php";
$way = array("batten.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("��֯�䶷��","batten.php","$user_id");
?>
<?
	echo "<br>==============������֯==============<br>";
	echo ("��������֯��ר��Ϊ��·������ʿ�ṩ��һ���໥�˽�ĵط���	
	");
	
    	$npc_org = "�䶷��";
    	include "./include/list_npc.inc.php";   
?>
<form method=POST action=batten.php?cla_c=1>
<pre>=========================���ְ����֯=========================</pre>
<?
	$empty_r=0;
    	
	function compare_array($temp,$array){
	$num=count($array);
	for($i=0;$i<$num;$i++){
     	if($temp == $array[$i])
          	return 0;
	}
	return 1;
	}

	$result=mysql_query("SELECT orgname,orgpos,orgp,orgopen,orglocation FROM org");

	$num=mysql_num_rows($result);
	
    	echo "<ul>\n";
    	for($k=0;$k<$num;$k++){
    	echo "<li>\n";
    	
    	$orgname = mysql_result($result,$k,"orgname");
    	$orgpos = mysql_result($result,$k,"orgpos");
    	$orgp = mysql_result($result,$k,"orgp");
    	$orgopen = mysql_result($result,$k,"orgopen");
    	$orglocation = mysql_result($result,$k,"orglocation");
    	
    	if($orgpos > 0) $px = "<font color=#918B75>����</font>";
    	if($orgpos == 0) $px = "������а";
    	if($orgpos < 0) $px = "<font color=#D223DC>а��</font>";
    	$name = mysql_query("SELECT name FROM renwu_member WHERE id='$orgp'");
    	$orgp = mysql_result($name,0,"name");
    	echo "��".$px."��<font color=#804040>$orgname</font>--���ԣ���".$orgp."������״̬��$orgopen ��̳λ�ã�$orglocation\n";
        echo "</li>\n";
     	}
     	echo "</ul>\n";
     	
     	mysql_close();
     	
     	include "./include/back_xy.inc.php";
?>
</form>