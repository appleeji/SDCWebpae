<?
	session_start();
?>
<meta charset="utf-8">
<?
   $hp = $hp1."-".$hp2."-".$hp3;
   $email = $email;

    for($i=0;$i<sizeof($interest);$i++){
    $sinterest.=$interest[$i];

    if($i!=sizeof($interest)-1){
      $sinterest.=",";
    }
   }

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

   include "dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "update member set pass='$pass', name='$name' , ";
   $sql .= "nick='$nick', hp='$hp', email='$email', interest='$sinterest' where id='$userid'";

   mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행

   mysql_close();                // DB 연결 끊기
   echo "
	   <script>
	    location.href = 'index.php';
	   </script>
	";
?>
