<?
/*
========
=�����ж�
=
========
*/	
	function area_now($need_way,$user_id){//$need_way�Ǵ�����һ�����飬�����˿��ܾ�����·;�ļ������뵱ǰλ���ļ������бȽϣ��������ͬ��Ϸ�
		include "/home/chunplay/public_html/warrior/inc/db.inc.php";
		$feifa = 1;
		//echo "����user_id".$user_id;
		$my_location = mysql_query("SELECT location_id FROM misc WHERE id='$user_id'");
		//echo "����my_location".$my_location;
		$my_location = mysql_result($my_location,0,"location_id");
		//echo "����my_location".$my_location;
		$my_info = mysql_query("SELECT hpnow FROM renwu_member WHERE id='$user_id'");
		//�Լ��Ļ�����Ϣ
		$my_hpnow_info = mysql_result($my_info,0,"hpnow");
	
		if($my_hpnow_info < 10){
			echo "<font color=#4697C8>��̫���ˣ�������Ϣ��Ϣ�ټ�����·�ɣ�</font>\n";
			exit();
			mysql_close();
			}
		//echo "����need_way".$need_way[0];
		
		for($i=0;$i<count($need_way);$i++){
			if($need_way[$i] == $my_location){
				$feifa = 0;
				break;
			}
		}
		if($feifa == 1){
				echo "<font color=red>��ô���㻹��˲�ư���</font>\n";
				echo "<font color=red>ϵͳ�жϵ�������зǷ�������������гͷ���</font>\n";
				mysql_query("UPDATE renwu_member SET exp=exp-100 WHERE id='$user_id'");
				mysql_close();
				exit();
		}
		mysql_close();	
	}
?>