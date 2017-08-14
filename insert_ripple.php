<?
	session_start();
?>
<?	include "dbconn.php";
if(!$userid) {
	echo("
	<script>
		 window.alert('로그인 후 이용해 주세요.')
		 history.go(-1)
	 </script>
	");
	exit;
}
?>
<?
   $regist_day = date("Y-m-d (H:i)");


   $sql = "insert into free_ripple (parent, id, name, nick, content, regist_day) ";
   $sql .= "values($num, '$userid', '$username', '$usernick', '$ripple_content', '$regist_day')";

   mysql_query($sql, $connect);
   mysql_close();

   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num';
	   </script>
	";
?>
