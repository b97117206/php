<?
session_save_path("xytmp");
session_start();

?>

<?
if(!session_is_registered(user_id) || !session_is_registered(user_name))
{
     include "./inc/style.inc.php";     
     echo "�������ϵͳ����ʶ�������µ�½��";
     echo "<br><a href=index.htm target=_parent>��¼ϵͳ</a>\n";
     exit();
}
?>