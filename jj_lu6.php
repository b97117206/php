<?
include "../inc/attest_lu.inc.php";
/*
===============================================================
=                 ����(Ver 0.9.0) ʹ�ù���汾(Ver 0.2)       =
             �˳������а�Ȩ��ԭ��������. �˰�Ȩ��Ϣ����ɾ��.
= Copyright (C) 2001-2002  WFoxd                              =
=                                                             =
=��Ȩ����(C)2002������ ��Ұ������� δ����� ����ʹ�� ����    =
=E-MAIL:wfoxd@cnnetgame.com                                   =
=http://www.cnnetgame.com                                     =
===============================================================
*/
include "../inc/config.inc.php";
include "../inc/style.inc.php";
//�ж�˲��
include "../include/area_now.inc.php";
$way = array("dl/jj_lu4.php","dl/jj_lu9.php","dl/jj_lu6.php","dl/jj_lu8.php");
area_now($way,$user_id);
//��¼λ��
include "../include/location_lu.inc.php";
up_location("����·","dl/jj_lu6.php","$user_id");
?>
<?
	echo "<br>=============����·===============<br>";
	echo ("����һ�������˾�����С·��һֱ���쵽��ɭ���<br>
	");
	
	include "../include/tianqi.inc.php";
	
	$damage = weather_info(20);
	include "../include/xiaohao.inc.php";
	xiaohao($damage,$user_id);
	
/*
	$npc_org = "";
    	include "../include/list_npc.inc.php";  
*/
	echo ("
	<br>
	�������ͨ��==><br>	
	<a href=./jj_lu9.php>������·��<a/>
	<a href=./jj_lu4.php>������·��<a/>
	<a href=./jj_lu8.php>������·��<a/>
	");
?>