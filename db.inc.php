<?
/*
===============================================================
=                 ����(Ver 0.9.0) ʹ�ù���汾(Ver 0.2)     =
 �˳������а�Ȩ��ԭ��������. �˰�Ȩ��Ϣ����ɾ��.
= Copyright (C) 2001-2002  WFoxd                              =
=                                                             =
=��Ȩ����(C)2002������ ��Ұ������� δ����� ����ʹ�� ����    =
=E-MAIL:wfoxd@cnnetgame.com                                   =
=http://www.cnnetgame.com                                     =
===============================================================
*/
$DBhost   =   "localhost";   //���ݿ�λ��

$DBuser   =   "chunplay_warrior";    //���ݿ��û���

$DBpasswd  =  "ecnu214337";    //���ݿ�����

$DBdatabase  =  "chunplay_warrior";   //���ݿ�����

$SetCharacterSetSql = "SET NAMES 'gbk'";

$link=@mysql_connect($DBhost,$DBuser,$DBpasswd) or die("���ݿ����Ӵ���");

$Recordset1 = mysql_query($SetCharacterSetSql, $link) or die(mysql_error());

mysql_select_db($DBdatabase);

?>