<?
/*
====================
=����ϵͳ
=
====================

*/
	include "./inc/db.inc.php";
	$talk = 100;                                # ע��3 
	
	if($notice_channel == "log"){
		if($notice_to == "login")	$write_file="$log_url/login.txt";
		if($notice_to == "wupin")	$write_file="$log_url/wupin.txt";
		if($notice_to == "money")	$write_file="$log_url/money.txt";
		if($notice_to == "ereng_b")	$write_file="$log_url/ereng_b.txt";
		$r = 300;
		$time = getdate(time());
		$nowtime = $time["mon"]."��".$time["mday"]."��".$time["hours"]."ʱ".$time["minutes"]."��";
	}else{
		$write_file="./chat/1.txt";
		$r = 25;
	}	

	$max_file_size = $r + 100;
	$file_size= filesize($write_file);           
	if ($file_size > $max_file_size) { 

	$lines = file($write_file); 
	$tmp= count($lines); 

	$u = $tmp - $r; 
	for($i = $tmp; $i >= $u ;$i--)
          { 
           $msg_old =  $lines[$i] . $msg_old; 
          } 
	$deleted = unlink($write_file);       # ע��6

	$fp = fopen($write_file,  "a+");      # ע��7 
	$fw = fwrite($fp, $msg_old); 
	fclose($fp); 
	} 

	$fp = fopen($write_file,  "a+"); 
	$channelcolor="#0066CC";
	$time = time();
	
	if($notice_channel == "��֯"){
	if($notice_to == "ս�Զ���"){
			$content = $my_org."�����˶�".$em_name."��ս�Զ��飡";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "����ս��"){
			$content = $my_org."���������ǵ�ս�Զ��飡";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "����֯"){
			$content = "�����ֳ�����һ������֯��".$org_name."��";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "����"){
			$content = $my_orgname."������".$B1."�������".$B1."��Ϊ�˽�����ʷ��";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	}
	
	if($notice_channel == "���"){
	if($notice_to == "�ɻ�"){
			$content = $marry_me_info."��".$user_id."��ʽ��Ϊ���ޣ���ϲ������ϲ������";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "�������"){
			$content = $user_id."�ܾ���".$marry_me_info."����飡���Ұ�����";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "���"){
			$content = $user_id."��".$duixiang_id."����ˣ�<b>������ԣ�</b>".$qiuhun_xy;
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "���"){
			$content = $user_id."��".$marry_me_info."����ˣ���ֱ���˼䱯�簡������";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	}
	if($notice_channel == "��Ʒ"){
	if($notice_to == "��ʯ��ָ"){
			$content = $user_id."�͸���".$e_name."һö�����䣡�Ա��".$user_id."�����а��⣡";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	}
	if($notice_channel == "log"){
	if($notice_to == "login")	$fw = fwrite($fp,  "\n����½��¼��".$user_id."��".$user_name."����½������".$nowtime."��");
	if($notice_to == "wupin")	$fw = fwrite($fp,  "\n����Ʒ���ס�".$user_id."��".$user_name."����".$wupin_person."(".$e_name.")".$wupin_name."��".$nowtime."��");
	if($notice_to == "money")	$fw = fwrite($fp,  "\n����Ʒ���ס�".$user_id."��".$user_name."����".$mon_person."(".$e_name.")".$mon_num."Ǯ��".$nowtime."��");
	if($notice_to == "ereng_b")	$fw = fwrite($fp,  "\n���������š�".$user_id."��".$user_name."���õ����˹ȱ�����".$nowtime."��");
	}
	if($notice_channel == "quit"){
	if($notice_to == "quit"){
			$content = "ĳĳĳ :[".$user_name."]�˳�����";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	}
	if($notice_channel == "����"){
	if($notice_to == "ereng_b"){
			$content = "[".$user_name."]���������������ڶ���ɽ�����ҵ��˴�˵�еı��ء�";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "di_lu"){
			$content = "[".$user_name."]սʤ����ʿ��ɣ��õ��˾�������֮һ�ġ���¹��������";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "qi_sd"){
			$content = "[".$user_name."]սʤ�����ˣ��õ��˾���ħ��֮һ�ġ���ɱ������";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "qis_tl"){
			$content = "[".$user_name."]սʤ����Ц�����õ��˾���ħ��֮һ�ġ���ɷ���ޡ���";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	}
	if($notice_channel == "������Ʒ"){	
	if($notice_to == "di_lu"){
			$content = "[".$user_name."]սʤ��[".$e_name_info."]���õ��˾�������֮һ�ġ���¹��������";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "qi_sd"){
			$content = "[".$user_name."]սʤ��[".$e_name_info."]���õ��˾���ħ��֮һ�ġ���ɱ������";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	if($notice_to == "qis_tl"){
			$content = "[".$user_name."]սʤ��[".$e_name_info."]���õ��˾���ħ��֮һ�ġ���ɷ���ޡ���";
			mysql_query("INSERT INTO chat VALUES('$time','','��ϵͳ��','$content','all')");
		}
	}
	fclose($fp); 
?>