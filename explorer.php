<?
session_save_path("xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "./inc/attest.inc.php";

/*
================================
=̽�� (Ver 0.2.1)
=��Ԫ2001��12��1��
================================
*/
include "./inc/config.inc.php";
include "./inc/style.inc.php";
include "./include/area_now_ct.inc.php";
$way = array("explorer.php","xy_city.php","ereng/lu_1.php","bhc/lu_1.php","org_zt/dgjp_1.php");
area_now($way,$user_id);
include "./include/location.inc.php";
up_location("��·��","explorer.php","$user_id");

echo ("
<p align=center><img src=".$pic3_url."/xiake/xiake16.jpg border=0></img><br>
</p>
");
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" colspan="6">
    ������ͨ�����ص�һ����·�ڣ�����Կ�������������������ʮ�ֶ࣬��ΧҲʮ�����֡�
    <?
    $npc_org = "��·��";
    include "./include/list_npc.inc.php";   
    ?>
    </td>
  </tr>
  <tr>
    <td width="100%" colspan="6">��</td>
  </tr>
  <tr>
    <td width="25%">�������ͨ��==><br><a href=./ereng/lu_1.php><font color=#977E6A>�����������</font><a/>  </td>
    <td width="25%"><br><a href=./bhc/lu_1.php><font color=#977E6A>���������</font><a/>��</td>
    <td width="25%">��</td>
    <td width="25%"><br><a href=./org_zt/dgjp_1.php><font color=#977E6A>�����½��ɡ�</font><a/>��</td>
  </tr>
  <tr>
    <td width="100%" colspan="6" align=center><a href=xy_city.php>����������ǡ�<a/></td>
  </tr>
</table>
