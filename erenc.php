<?
session_save_path("../xytmp");
session_start();
$user_id=$_SESSION["user_id"];
include "../inc/attest_lu.inc.php";

include "../inc/config.inc.php";
include "/home/chunplay/public_html/warrior/inc/style.inc.php";
include "../include/area_now.inc.php";
$way = array("ereng/erenc.php","ereng/lu_6.php","ereng/erenc_kd.php","ereng/erenc_wuqi_trade.php",
"ereng/erenc_wupin_trade.php","ereng/erenc_xiao_x.php?here=1","ereng/erenc_xiao_x.php?here=2","ereng/erenc_xiao_x.php?here=3",
"ereng/erenc_xiaowu.php","ereng/ereng_lu1.php");
area_now($way,$user_id);
include "/home/chunplay/public_html/warrior/include/location_lu.inc.php";
up_location("���˴�","ereng/erenc.php","$user_id");
?>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%">
  <tr>
    <td width="100%" colspan="3">
    <img src=<? echo $jzpic_url; ?>/xesg.jpg border=0 align=left></img>
    <h2 align="center"><font color="#993300">�� �� ��</font></h2>
    �����˴塿����Щ�����ж��˾ۼ����γɵ�һ����ׯ������ס��ȫ������ʮ������ˡ�һ���������ʿ
    �ǲ�м�������ĵط��ġ�
    </td>
  </tr>
  <tr>
    <td width="27%">��</td>
    <td width="42%" align=center>
    <a href=lu_6.php target=main>
<pre>
==========
=  ����  =
=  ���  =
==========
</pre>
    </a>
    </td>
    <td width="31%">��</td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=erenc_kd.php target=main>����ɷ��ׯ��</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=erenc_xiao_x.php?here=1 target=main>��С·��</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=erenc_xiao_x.php?here=2 target=main>��С·��</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=erenc_wuqi_trade.php target=main>�����������꡿</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=erenc_xiaowu.php target=main>�����˴�С�ݡ�</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center><a href=erenc_wupin_trade.php target=main>������װ���꡿</a></td>
  </tr>
  <tr>
    <td width="27%" align=center><a href=erenc_xiao_x.php?here=3 target=main>��С·��</a></td>
    <td width="42%" align=center>��</td>
    <td width="31%" align=center></td>
  </tr>  
  <tr>
    <td width="27%" align=center></td>
    <td width="42%" align=center><a href=ereng_lu1.php target=main>
<pre>
==========
=  а��  =
=  ɽ��  =
==========
</pre>
    </a></td>
    <td width="31%" align=center></td>
  </tr>
</table>
