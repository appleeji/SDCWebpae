<?
   session_start();
   $table="board";
   $ripple="free_ripple";
?>
<?
   include "dbconn.php";

   $sql = "select * from $table where num=$num";
   $result = mysql_query($sql, $connect);
   $row = mysql_fetch_array($result);

   $item_num     = $row[num];
   $item_id      = $row[id];
   $item_name    = $row[name];
  $item_nick    = $row[nick];
   $item_hit     = $row[hit];

   $image_name[0]   = $row[file_name_0];
   $image_name[1]   = $row[file_name_1];
   $image_name[2]   = $row[file_name_2];

   $image_copied[0] = $row[file_copied_0];
   $image_copied[1] = $row[file_copied_1];
   $image_copied[2] = $row[file_copied_2];

  $item_date    = $row[regist_day];
   $item_subject = str_replace(" ", "&nbsp;", $row[subject]);
   $item_content = $row[content];
   $is_html      = $row[is_html];

   if ($is_html!="y")
   {
      $item_content = str_replace(" ", "&nbsp;", $item_content);
      $item_content = str_replace("\n", "<br>", $item_content);
   }

   for ($i=0; $i<3; $i++)
   {
      if ($image_copied[$i])
      {
         $imageinfo = GetImageSize("assets/data/".$image_copied[$i]);

         $image_width[$i] = $imageinfo[0];
         $image_height[$i] = $imageinfo[1];
         $image_type[$i]  = $imageinfo[2];

         if ($image_width[$i] > 785)
               $image_width[$i] = 785;
      }
      else
      {
         $image_width[$i] = "";
         $image_height[$i] = "";
         $image_type[$i]  = "";
      }
   }

   $new_hit = $item_hit + 1;

   $sql = "update $table set hit=$new_hit where num=$num";
   mysql_query($sql, $connect);
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="euc-kr">
<link href="assets/css/common7.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/concert.css" rel="stylesheet" type="text/css" media="all">
<script>z
    function del(href)
    {
        if(confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n 정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>

<body>
     <div id="menu">
      <? include "top_menu.php"; ?>
   </div>  <!-- end of menu -->
      <!-- Page Content -->
      <div class="page-title-container">
                  <div class="container">
                        <div class="row">
                              <div class="col-sm-12 wow fadeIn">
                                    <i class="fa fa-list-alt"></i>
                                    <h1>Board /</h1>
                                    <p>This pages are pages for Sharing Information.</p>
                              </div>
                        </div>
                  </div>
            </div>
            <!-- Page Heading/Breadcrumbs -->
            <h3>
               게시판
            </h3>
            <h3></h3>
  <div id="wrap">
  <div id="header">

  </div>  <!-- end of header -->
   <div id="menu">
</div>

   <div id="col2">

      <div id="title">

      </div>

      <div id="view_title">
         <div id="view_title1"><?= $item_subject ?></div><div id="view_title2"><?= $item_nick ?> | 조회 : <?= $item_hit ?>
                               | <?= $item_date ?> </div>
      </div>

      <div id="view_content">
<?
   for ($i=0; $i<3; $i++)
   {
      if ($image_copied[$i])
      {
         $img_name = $image_copied[$i];
         $img_name = "assets/data/".$img_name;
         $img_width = $image_width[$i];

         echo "<img src='$img_name' width='$img_width'>"."<br><br>";
      }
   }
?>
         <?= $item_content ?>
      </div>

<div id="ripple">
   <?
   $sql="select *from free_ripple where parent='$item_num'";
   $ripple_result=mysql_query($sql);

   while($row_ripple=mysql_fetch_array($ripple_result))
   {
      $ripple_num = $row_ripple[num];
      $ripple_id=$rod_ripple[id];
      $ripple_nick=$row_ripple[nick];
			$ripple_content=str_replace("\n", "<br>", $row_ripple[content]);
      $ripple_content=str_replace(" ", "$nbsp;", $ripple_content);
      $ripple_date=$row_ripple[regist_day];
?>
      <div id="ripple_writer_title">
				 <ul>
            <li id="writer_title1"> <?=$ripple_nick?></li>
            <li id="writer_title2"> <?=$ripple_date?></li>
            <li id="writer_title3"> <?=$ripple_content?></li>
<?
if($userid=="admin" || $userid==$ripple_id)
   echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp[삭제]</a>";
   ?>
</ul>
</div>
<div class="hor_line_ripple"></div>
<?
   }
   ?>

   <form name="ripple_form" method="post"
   action="insert_ripple.php?table=<?=$ripple?>&num=<?$item_num?>">
   <div id="ripple_box">

      <div id="ripple_box1"><img src="assets/img/title_comment.gif"></div>
      <div id="ripple_box2">
         <textarea rows="7" cols="110" name="ripple_content"></textarea>
      </div>
      <div id="ripple_box3"><a href="insert_ripple.php?table=<?=$ripple?>&num=<?=$item_num?>&page=<?=$page?>&content=<?=$ripple_content?>">
         <img src="assets/img/ok_ripple.gif" onclick="check_input()"></a></div>
      </div>
   </form>
</div>

      <div id="view_button">
         <h3></h3>
            <a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="assets/img/list.png"></a>&nbsp;
<?
   if($userid==$item_id || $userid="admin" || $userlevel==1 )
   {
?>
            <a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><img src="assets/img/modify.png"></a>&nbsp;
            <a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><img src="assets/img/delete.png"></a>&nbsp;
<?
   }
?>
<?
   if($userid)
   {
?>
            <a href="write_form.php?table=<?=$table?>"><img src="assets/img/write.png"></a>
<?
   }
?>
      </div>

      <div class="clear"></div>

   </div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->
<? include "bottom_1.php" ?>
</body>
</html>
