<?
session_save_path("xytmp");
session_start();
include "./inc/attest.inc.php";

include "./inc/config.inc.php";
include "./inc/style.inc.php";

include "./include/area_now_ct.inc.php";
$user_id=$_SESSION["user_id"];
$way = array("batten.php","trade.php","xiao_x.php?here=1","xiao_x.php?here=2","xiao_x.php?here=3",
"xiao_x.php?here=4","xiao_x.php?here=5","board.php","explorer.php","kedian.php",
"listziliao.php","marry.php","list.php","organization.php","work.php","wugong_learn.php",
"wupin_trade.php","wuqi_trade.php","xy_city.php","xi_song.php","dong_song.php");

area_now($way,$user_id);
include "./include/location.inc.php";
up_location("�����","xy_city.php","$user_id");
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" colspan="3">
    <img src=<? echo $jzpic_url; ?>/xy_city_1.jpg border=0 align=left></img>
    <h2 align="center"><font color="#993300">�� �� ��</font></h2>
    ��ӭ��λ������ʿ�������ǡ�����ǡ�������ר��Ϊ���཭����ʿ�ṩ�˸��ַ������������������
    �õ�����Ҫ��һ�С�
    </td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=xi_song.php target=main>�����</a>��</td>
    <td width="42%" align=center><a href=wugong_learn.php target=main>������ѧԺ��</a></td>
    <td width="31%" align=center><a href=dong_song.php target=main>�����</a>��</td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=wupin_trade.php target=main>������װ���꡿</a>��</td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=xiao_x.php?here=1 target=main>��С�</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=xiao_x.php?here=2 target=main>��С�</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=work.php target=main>�������г���</a>��</td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=organization.php target=main>�������֯��</a></td>
    <td width="42%" align=center></a>��</td>
    <td width="31%" align=center><a href=kedian.php target=main>�����ķ�ׯ��</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=xiao_x.php?here=3 target=main>��С�</a></td>
    <td width="42%" align=center></td>
    <td width="31%" align=center><a href=wuqi_trade.php target=main>����������꡿</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=board.php target=main>�����԰塿</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=trade.php target=main>����վ��</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=xiao_x.php?here=4 target=main>��С�</a></td>
    <td width="42%" align=center></td>
    <td width="31%" align=center><a href=marry.php target=main>������ׯ��</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=listziliao.php target=main>�������ݡ�</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=list.php target=main>���������а�</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=batten.php target=main>����֯ѶϢ��</a></td>
    <td width="42%" align=center></td>
    <td width="31%" align=center><a href=xiao_x.php?here=5 target=main>��С�</a></td>
  </tr>
  <tr>
    <td width="27%" align=center></td>
    <td width="42%" align=center><a href=explorer.php target=main>
<pre>
==========
=  ����  =
=  ̽��  =
==========
</pre>
    </a></td>
    <td width="31%" align=center></td>
  </tr>
</table>

