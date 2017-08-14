<?
  session_start();
  $table="board";
  $ripple="free_ripple";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/common5.css" rel="stylesheet" type="text/css" media="all">
    <link href="assets/css/greet3.css" rel="stylesheet" type="text/css" media="all">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?
    include "dbconn.php";

    $scale=10;

    if ($mode=="search")
    {
        if(!$search)
        {
            echo("
                <script>
                 window.alert('검색할 단어를 입력해 주세요!');
                 history.go(-1);
                </script>
            ");
            exit;
        }

        $sql = "select * from $table where $find like '%$search%' order by num desc";
    }
    else
    {
        $sql = "select * from $table order by num desc";
    }

    $result = mysql_query($sql, $connect);

    $total_record = mysql_num_rows($result);


    if ($total_record % $scale == 0)
        $total_page = floor($total_record/$scale);
    else
        $total_page = floor($total_record/$scale) + 1;

    if (!$page)
        $page = 1;

    $start = ($page - 1) * $scale;

    $number = $total_record - $start;
?>


<body>

    <!-- Navigation -->
    <? include "top_menu.php" ?>

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
          <h3></h3>
  <div id="wrap">
  <div id="header">

  </div>  <!-- end of header -->

  <div id="menu">

  </div>  <!-- end of menu -->

        <form  name="board_form" method="post" action="list.php?mode=search">
        <div id="list_search">
            <div id="list_search1"> ▶ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
            <div id="list_search2"><img src="assets/img/select_search.gif"></div>
            <div id="list_search3">
                <select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>글쓴이</option>
                </select></div>
            <div id="list_search4"><input type="text" name="search"></div>
            <div id="list_search5"><input type="image" src="assets/img/list_search_button.gif"></div>
        </div>
        </form>

        <div class="clear"></div>

        <div id="list_top_title">
            <ul>
                <li id="list_title1"><img src="assets/img/list_title1.gif"></li>
                <li id="list_title2"><img src="assets/img/list_title2.gif"></li>
                <li id="list_title3"><img src="assets/img/list_title3.gif"></li>
                <li id="list_title4"><img src="assets/img/list_title4.gif"></li>
                <li id="list_title5"><img src="assets/img/list_title5.gif"></li>
            </ul>
        </div>


        <div id="list_content">
<?
   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysql_data_seek($result, $i);
      $row = mysql_fetch_array($result);

      $item_num     = $row[num];
      $item_id      = $row[id];
      $item_name    = $row[name];
      $item_nick    = $row[nick];
      $item_hit     = $row[hit];

      $item_date    = $row[regist_day];
      $item_date = substr($item_date, 0, 10);

      $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

      $sql = "select * from $ripple where parent='$item_num'";
      $result2=mysql_query($sql, $connect);
      $num_ripple=mysql_num_rows($result2);

?>
            <div id="list_item">
                <div id="list_item1"><?= $number ?></div>
                <div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a>
<?
if($num_ripple)
{
  echo "[$num_ripple]";
}
?>
                </div>
                <div id="list_item3"><?= $item_nick ?></div>
                <div id="list_item4"><?= $item_date ?></div>
                <div id="list_item5"><?= $item_hit ?></div>
            </div>
<?
       $number--;
   }
?>
            <div id="page_button">
                <div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp;
<?
   for ($i=1; $i<=$total_page; $i++)
   {
        if ($page == $i)
        {
            echo "<b> $i </b>";
        }
        else
        {
            echo "<a href='list.php?page=$i'> $i </a>";
        }
   }
?>
            &nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
                </div>
                <div id="button">
                    <a href="list.php?page=<?=$page?>"><img src="assets/img/list.png"></a>&nbsp;
<?
   // if($userid)
    {
?>
        <a href="write_form.php"><img src="assets/img/write.png"></a>

<?
    }
?>
                </div>
            </div> <!-- end of page_button -->

        </div> <!-- end of list content -->

        <div class="clear"></div>

    </div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->



    </div>

   <? include "bottom_1.php" ?>
</body>

</html>
