<?

include "inc/config.inc.php";
include "inc/style.inc.php";

?>
<?
//echo "login".$login.$_GET[login];
//echo "T1".$T1;
$login=$_GET['login'];

if($login==1){//�ύע��ҳ���login��Ϊ1
	   $T1=$_POST['T1'];//��Ϸ�û���
     $T2=$_POST['T2'];//��Ϸ����
     $D3=$_POST['D3'];//����
     $D4=$_POST['D4'];//�ǻ�
     $D5=$_POST['D5'];//����
     $D6=$_POST['D6'];//����
     $D7=$_POST['D7'];//��־
     $R1=$_POST['R1'];//�����Ա�
     $R2=$_POST['R2'];//�����Ը�
     $icon=$_POST['icon'];
	   
     
     
     include "inc/db.inc.php";//�������ݿ�  
     echo "<p align=center><img src=$pic_url/zhuceinfo.jpg></img>\n<br><ul>";
     //�����������
     $nowmember = mysql_query("SELECT id FROM renwu_member");
     if($maxmember <= mysql_num_rows($nowmember)){
          echo "<p align=center><img src=$pic_url/w.gif></img><br>";
          echo "<font size=4>ע�������Ѿ��ﵽ����������ʺ�����ϵ����Ա</font>\n";
          echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
          exit(10);//������ע������С�ڵ�����ע������������ʾ��ϵ����Ա������ҳ��
     }
     //����
         
     mysql_select_db($DBdatabase);
     $userid = mysql_query("SELECT id FROM renwu_member WHERE id='$T1'");//or die("Invalid query: " . mysql_error());
     //echo "userid".$userid;     
     if(mysql_num_rows($userid)){
          echo "<p align=center><img src=$pic_url/w.gif></img><br>";
          echo "<font size=4>ʮ�ֱ�Ǹ����ID�Ѿ���ע�ᣡ</font>\n";
          echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
          exit(1);//�����Ϸ�û���T1�Ƿ�ע�ᣬ������ʾ�ѱ�ע�Ტ����ҳ�棬����ʲô������
     }
     mysql_close();
     
     
     //������
     //echo "����2 T1".$T1;
     //$user_pd = mysql_query("SELECT pw FROM renwu_member WHERE id='$T1'");
     //if($T2 != $user_pd){
     //     echo "<p align=center><img src=$pic_url/w.gif></img><br>";
     //     echo "<font size=4>������������⣬����</font>\n";
     //     echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
     //     exit(2);//��������Ƿ���ԭ������һ�£������һ����ʾ���������Ⲣ����ҳ�棬�����ӡ����
     //}else echo "<li>������룺".$T2."<br>\n";     
     
     
     
     //�������
     if($T1 == "" || strlen($T1) > 10){
          echo "<p align=center><img src=$pic_url/w.gif></img><br>";
          echo "<font size=4>������������⣬����</font>\n";
          echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
          exit(3);//�������T1Ϊ�ջ��߳��ȴ���10����ʾ���������Ⲣ����ҳ�棬�����ӡ����
     }else echo "<li>���������".$T1."<br>\n";
     //����
     
     //�����������
     $all = $D3 + $D4 + $D5 + $D6 + $D7;
     if($all != 80){
          echo "<p align=center><img src=$pic_url/w.gif></img><br>";
          echo "<font size=4>��������ܺ�û���ڹ涨��Χ��</font>\n";
          echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
          exit(5);
     }
     //����
     echo "<li>�����Ա�".$R1."<br>\n";
     echo "<li>�����Ը�".$R2."<br>\n";
     echo "<li>����������".$D3."<br>\n";
     echo "<li>�����ǻۣ�".$D4."<br>\n";
     echo "<li>�������ʣ�".$D5."<br>\n";
     echo "<li>�������ݣ�".$D6."<br>\n";
     echo "<li>������־��".$D7."<br>\n";
     echo "<li>����ͷ��<img src=$pic2_url/$icon.jpg border=0><br>\n";

     echo "<form action=login_member.php?login=2 method=post>\n";//���ύһ��
     echo "<input type=hidden name=id value=$T1>";
     echo "<input type=hidden name=pw value=$T2>";
     echo "<input type=hidden name=name value=$T3>";
     echo "<input type=hidden name=sex value=$R1>";
     echo "<input type=hidden name=cha value=$R2>";
     echo "<input type=hidden name=str value=$D3>";
     echo "<input type=hidden name=zhi value=$D4>";
     echo "<input type=hidden name=con value=$D5>";
     echo "<input type=hidden name=spe value=$D6>";     
     echo "<input type=hidden name=pur value=$D7>";
     echo "<input type=hidden name=icon value=$icon>";
     echo "<input type=submit value=ȷ�� name=B1 style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
     echo "</form>\n";
     
     echo "<form action=login_member.php?login=0 method=post>\n";
     echo "<input type=submit value=���� name=B2 style=\"font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633\">\n";
     echo "</form>\n";
      
     include "help/copyright.inc.php";
     exit();//ȷ��ע����Ϣ������ע��ɹ���ҳ��
}
?>
<?
if($login==2){
	   $id=$_POST['id'];
	   $pw=$_POST['pw'];
	   $name=$_POST['name'];
	   $sex=$_POST['sex'];
	   $cha=$_POST['cha'];
	   $str=$_POST['str'];
	   $zhi=$_POST['zhi'];
	   $con=$_POST['con'];
	   $spe=$_POST['spe'];
	   $pur=$_POST['pur'];
	   $icon=$_POST['icon'];
	   
     if(!$id){
          echo "<p align=center><img src=$pic_url/w.gif></img><br>";
          echo "<font size=4>�밴��ȷ˳��ע���ʺ�</font>\n";
          echo "<a href=\"javascript:history.back(1)\"><img valign=bottom border=0 src=\"$pic_url/back.gif\">����</a>\n";
          exit();
     }
     echo "<p>��ʼ��ʼ������........\n";
     //���ݳ�ʼ��
     
     $hp=$con*10;//����
     $hpnow=$hp;
     $en=0;//����
     $ennow=$en;
     $po=$zhi*10;//����
     $ponow=$po;
     $lev=0;//�ȼ�
     $yun=5+rand(1,20);//����
     $col=10+rand(1,15);//��ò
     $pos=1;//����
     $time=time();
     $mon=0;
     $org="����֯";
     $nick="ƽ��";
          
     $person_info="��ӭ����".$main_title."�����ǽ�������Ϊ���ṩ��õ���Ϸ������\n";
     
     echo "<p>���ݳ�ʼ����ɣ���ʼ��������......\n";
     include "inc/db.inc.php";
     
     mysql_query("INSERT INTO renwu_member (id, pw, name, exp, hp, hpnow, en, ennow, po, ponow, sex, cha, pos, str, zhi, con, spe, pur, col, yun, icon, org, time, mon, nick) VALUES
      ('$id', '$pw', '$id', '$exp', '$hp', '$hpnow', '$en', '$ennow','$po', '$ponow', '$sex', '$cha', '$pos', '$str', '$zhi', '$con', '$spe', '$pur', '$col', '$yun', '$icon', '$org', '$time', '$mon', '$nick')") or die("���ݿ�������⣡\n");
     mysql_query("INSERT INTO misc(id,person_info,logintime) VALUES('$id','$person_info','$time')") or die("���ݿ�������⣡\n");
     echo "<p>����ȫ�����!��ȴ���½.........\n<p>";
     echo "<meta http-equiv=\"refresh\" content=\"0; url=index.htm\">";
     
     include "help/copyright.inc.php";
     mysql_close();
     exit();
}
?>
<form action="login_member.php?login=1" method=post>
<center>
<table border="0" cellpadding="1" cellspacing="1" style="border-collapse: collapse" width="760">
  <tr>
    <td width="100%" bgcolor="#0099CC">
    <p align="center"><img src=<? echo $pic_url; ?>/t1.gif border=0></img><font face="����_GB2312" size="5" color="#FFFF00"><? echo $main_title; ?></font><img src=<? echo $pic_url; ?>/t1.gif border=0></img></td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" height="106">
  
  <tr>
    <td width="20%" height="106" rowspan="8" align=right valign=top>     
    </td>
    <td width="13%" height="15" bgcolor="#fffff7">
    <p align="center">��Ϸ�û���</td>
    <td width="48%" height="15" colspan="3">
    <input type="text" name="T1" size="13"> <font size="2" color="#660088">
    ������Ϊ������Ϸ�û����������Ϊ5�����֣�</font></td>
    <td width="19%" height="106" rowspan="8">��</td>
  </tr>
  <tr>
    <td width="12%" height="10" bgcolor="#fffff7">
    <p align="center">��Ϸ����</td>
    <td width="49%" height="10" colspan="3">
    <input type="password" name="T2" size="20"> <font size="2" color="#660088">
    ������Ϊ��ע�����Ϸ���룩</font></td>
  </tr> 
  <!--<tr>
    <td width="12%" height="10" bgcolor="#fffff7">
    <p align="center">��������</td>
    <td width="49%" height="10" colspan="3">
    <input type="text" name="T3" size="13"> <font size="2" color="#660088">�����������ƽ�������Ϸ����������֣���ʹ��5�����֣�</font></td>
  </tr>-->
  <tr>
    <td width="12%" height="14" bgcolor="#fffff7">
    <p align="center">�����Ա�</td>
    <td width="24%" height="14">
    ����<input type="radio" value="����" checked name="R1">&nbsp;&nbsp;&nbsp;
    ��Ů<input type="radio" name="R1" value="��Ů">
    </td>
  </tr>
  <tr>
    <td width="12%" height="10" bgcolor="#fffff7">
    <p align="center">�����Ը�</td>
    <td width="49%" height="10" colspan="3">
    ����<input type="radio" value="����" checked name="R2">�����������ķ�չ���а�����<br>
    ��ƽ<input type="radio" value="��ƽ" name="R2">�������ǻ۵ķ�չ���а�����<br>
    ��С<input type="radio" value="��С" name="R2">�������ٶȵķ�չ���а�����<br>
    ���<input type="radio" value="���" name="R2">��������־�ķ�չ���а�����<br>
    ����<input type="radio" value="����" name="R2">���������ʵķ�չ���а�����<br>
    </tr>
  </tr>
  <tr>
    <td width="61%" height="13" colspan="4" bgcolor="#FFFFCC">
    <p align="center"><font color=#33CC33>���������趨�����������ܺͱ���Ϊ��80��</font></td>
  </tr>
  <tr>
    <td width="61%" height="17" colspan="4">
   ����<select size="1" name="D3">
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16" selected>16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    </select>���������㹥����ǿ�ȣ�<br>
    �ǻ�<select size="1" name="D4">
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16" selected>16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    </select>(���������ѧϰ���ȣ�<br>
    ����<select size="1" name="D5">   
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16" selected>16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    </select>���������������״̬��<br>
    ����<select size="1" name="D6">
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16" selected>16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    </select>������������ٶȣ�<br>
    ��־<select size="1" name="D7">
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16" selected>16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    </select>����������ľ���״����
    </td>
  </tr>
  <tr>
    <td width="61%" height="15" colspan="4">
    </td>
  </tr>
  <tr>
    <td width="61%" height="15" colspan="4">
    <p align="center">���������趨:
    <select name=icon>
	<?
	     for($i=1;$i<$max_pic;$i++){
	          echo "<option value=\"$i\">ICON No.$i\n";
	     }
	?>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=icon.php target=_blank>�鿴������������</a></td>
  </tr>
  <tr>
    <td width="100%" height="12" colspan="4" align=center>
    <input type="submit" value="ע��" name="B1" style="font-family: ����; border-style: ridge; border-width: 0; background-color: #CCFF99; color:#666633"></td>
  </tr>
</table>
</form>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%">
  <tr>
    <td width="100%"><? include "help/copyright.inc.php"; ?>��</td>
  </tr>
</table>

</body>

</html>