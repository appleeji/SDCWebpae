<meta charset="utf-8">

<?
   $hp = $hp1."-".$hp2."-".$hp3;

  for($i=0;$i<sizeof($interest);$i++){
    $sinterest.=$interest[$i];

    if($i!=sizeof($interest)-1){
      $sinterest.=",";
    }
  }

   $ip = $REMOTE_ADDR;

   include "dbconn.php";

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);
   $exist_id = mysql_num_rows($result);

   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {
	    $sql = "insert into member(id, pass, name, nick, hp, email,interest) ";
		$sql .= "values('$id', '$pass', '$name', '$nick', '$hp', '$email','$sinterest')";

		mysql_query($sql, $connect);
   }

   mysql_close();
   echo ("
	   <script>
	    location.href = 'index.php';
	   </script>
	");
?>
