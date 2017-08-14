<?
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta charset="euc-kr">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>한국기술교육대학교 웹프로그래밍 텀프로젝트</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value !=
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();

   }

   function reset_form()
   {
     document.member_form.id.value = "";
     document.member_form.pass.value = "";
     document.member_form.pass_confirm.value = "";
     document.member_form.name.value = "";
     document.member_form.nick.value = "";
     document.member_form.hp1.value = "010";
     document.member_form.hp2.value = "";
     document.member_form.hp3.value = "";
     document.member_form.email.value = "";
     document.member_form.idea.value="";
     document.member_form.design.value="";
     document.member_form.report.value="";
     document.member_form.marketing.value="";
     document.member_form.game.value="";
     document.member_form.science.value="";


      document.member_form.id.focus();

      return;
   }
</script>

</head>

<?
    include "dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = $email;

    $interest2=explode(",", $row[interest]);


    mysql_close();
?>
<body>

    <? include "top_menu.php";?>
        <div class="page-title-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 wow fadeIn">
                            <i class="fa fa-sign-in"></i>
                            <h1>Information /</h1>
                            <p>This pages are pages for Information modify.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio-container">
            <div class="container">
                <div class="col-lg-12">
                    <h1 class="page-header"><br>정보수정
                        <small></small>
                    </h1>

                </div>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <!-- Map Column -->

            <!-- Contact Details Column -->
            <div class="col-md-4">

            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
        <div class="row">
            <div class="col-md-12">
              <form name="member_form" method="post" action="modify.php" >
               <h5>*는 필수 입력사항 입니다.</h5>
                <form class ="form-horizontal">
                    <div class="form-group">
                            <div class="col-lg-12">
                            <label>* 아이디: <?= $row[id] ?> </label>
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 비밀번호 :</label>
                            <input type="password" class="form-control" id="password" name="pass" required data-validation-required-message="비밀번호를 입력해 주세요." value="<?=$row[pass] ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 비밀번호 확인 :</label>
                            <input type="password" class="form-control" id="password2" name="pass_confirm"required data-validation-required-message="" value="<?=$row[pass] ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 이름 :</label>
                            <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="이름을 입력해주세요." value="<?=$row[name] ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 닉네임 :</label>

                            <input type="text" class="form-control" id="nick" name ="nick"required data-validation-required-message="닉네임을 입력해주세요." value="<?=$row[nick] ?>">
                             <p class="help-block"></p>
                            <a id=nick2 class="btn btn-primary" onclick="check_nick()">중복확인</a>
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                            <label>* 휴대폰 : </label>
                      <select class="hp" name="hp1" value="<?= $hp1 ?>">
                                    <option value='010'>010</option>
                                    <option value='011'>011</option>
                                    <option value='016'>016</option>
                                    <option value='017'>017</option>
                                    <option value='018'>018</option>
                                    <option value='019'>019</option>
                    </select>  - <input type="text" class="hp" name="hp2" value="<?=$hp2 ?>"> - <input type="text" class="hp" name="hp3" value="<?=$hp3 ?>" >
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                            <label>이메일 :</label>
                            <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="이메일을 입력해주세요." value="<?=$row[email] ?>">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>관심분야 : &nbsp;</label>
                           <?
                           for($i=0;$i<sizeof($interest2); $i++){
                            if($interest2[$i] == "idea"){
                              $idea="checked=\"on\"";
                            }
                            if($interest2[$i] == "design"){
                              $design="checked=\"on\"";
                            }
                            if($interest2[$i] == "report"){
                              $report="checked=\"on\"";
                            }
                             if($interest2[$i] == "marketing"){
                              $marketing="checked=\"on\"";
                            }
                            if($interest2[$i] == "game"){
                              $game="checked=\"on\"";
                            }
                             if($interest2[$i] == "science"){
                              $science="checked=\"on\"";
                            }
                          }
                          ?>

                            <input type="checkbox"  name="interest[]" value="idea" <?php echo $idea ?>>&nbsp;기획/아이디어&nbsp;
                            <input type="checkbox"  name="interest[]" value="design" <?php echo $design ?> >&nbsp;디자인&nbsp;
                             <input type="checkbox"  name="interest[]" value="report" <?php echo $report ?>>&nbsp;논문/리포트&nbsp;
                            <input type="checkbox"  name="interest[]" value="marketing"<?php echo $marketing ?> >&nbsp;광고/마케팅&nbsp;
                            <input type="checkbox"  name="interest[]" value="game"<?php echo $game ?>>&nbsp;게임/소프트웨어&nbsp;
                            <input type="checkbox"  name="interest[]" value="science" <?php echo $science ?>>&nbsp;과학/공학&nbsp;

                        </div>
                    </div>

                    <!-- For success/fail messages -->
                    <input type="submit" value= "저장하기" class="btn btn-primary" onclick="check_input()">&nbsp;&nbsp;
                    <a id=cancel class="btn btn-primary"onclick="reset_form()">취소하기</a>

             </form>
        </div>

        </div>
        <!-- /.row -->

        <hr>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
   <? include "bottom_1.php" ?>
</body>

</html>
