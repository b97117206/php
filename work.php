<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
$work=$_GET['work'];
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";
/*
==================
=����
=��Ԫ2001��12��19��
==================
*/

if($work == "fandian") include "./include/work/fandian.inc.php";
if($work == "chaoxie") include "./include/work/chaoxie.inc.php";
if($work == "caishi") include "./include/work/caishi.inc.php";
if($work == "maihua") include "./include/work/maihua.inc.php";
if($work == "xiyi") include "./include/work/xiyi.inc.php";
if($work == "datie") include "./include/work/datie.inc.php";
if($work == "peilian") include "./include/work/peilian.inc.php";

include "./include/area_now_ct.inc.php";
$way = array("work.php","xy_city.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("�����г�","work.php","$user_id");
?>
<?	
	echo "<br>==============�����г�==============<br>";
	echo ("���ǳ���ר�Ÿ���ҵ��ʿ�ṩ�����ġ������г�����������������ҵ�����
	�õĹ�������������ã����п��ܵõ������˵İ����أ�
	");
	
	$npc_org = "�����г�";
    	include "./include/list_npc.inc.php";    	
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="41%"><a href=work.php?work=fandian>���۹�</a></td>
    <td width="59%"><hr>����һ�������ķ��꣬������ڿ����ر�࣬�ƹ��׼����һЩС������Ȼ���ʲ��ߣ������ڲ�̤�뽭��������˵�����ﻹ��������·�ѡ������ͣ�40/�Σ���</td>
  </tr>
  <tr>
    <td width="41%"><a href=work.php?work=chaoxie>��дԱ</a></td>
    <td width="59%"><hr>���ǵ����һ�������ҪһЩ��дԱ����ɲ���һ���򵥵Ĺ�����������Ҫ������д��Ҫ���㲻�Ǻܱ��������ͣ�100/�Σ�</td>
  </tr>
  <tr>
    <td width="41%"><a href=work.php?work=caishi>��ʯ��</a></td>
    <td width="59%"><hr>����һ�Ҳ�ʯ����������һ���͹���ֻҪ����ǿ��׳�������˶�����ȥ�������ͣ�110/�Σ�</td>
  </tr>
   <tr>
    <td width="41%"><a href=work.php?work=maihua>��������</a></td>
    <td width="59%"><hr>����Ļ�������ҪһЩ����Ư����Ů��ȥ������������������Լ����Ļ��㲻����ȥ���԰ɣ������ͣ�130/�Σ�</td>
  </tr>
  <tr>
    <td width="41%"><a href=work.php?work=xiyi>ϴ�µ�</a></td>
    <td width="59%"><hr>�����ϴ�µ���ҪһЩ��������Ů��ϴ��Щ��Ǯ�˵��·�����Ҫ��Ҫ��һ������Ĳ���Ŷ�������ͣ�160/�Σ�</td>
  </tr>
  <tr>
    <td width="41%"><a href=work.php?work=datie>����</a></td>
    <td width="59%"><hr>����һ��ʮ�ּ����ʺ��������Ĺ���������������Լ����ԳԿ࣬��ô���������ԡ������ͣ�180/�Σ�</td>
  </tr>  
  <tr>
    <td width="41%"><a href=work.php?work=peilian>����</a></td>
    <td width="59%"><hr>�����в��ٳ���ĸ��˼�Ϊ��ѧ�㹦����Ҫ��һЩ�Ṧ����˵�����������㲻���ð�����ʧ��ݾ�ȥ���ɡ������ͣ�200/�Σ�</td>
  </tr>
</table>
<?	
     include "./include/back_xy.inc.php";
?>