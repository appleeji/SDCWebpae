<?
  session_start();
?>



<!DOCTYPE html>


<head>

    <meta charset="utf-8">
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
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");
          document.member_form.id.focus();
          return;
      }

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


<body>
    <!-- Navigation -->
    <? include "top_menu.php" ?>
    <? include "dbconn.php";?>
	<!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-users"></i>
                        <h1>SignUp /</h1>
                        <p>This pages are pages for Sign-Up.</p>
                    </div>
                </div>
            </div>
        </div>

            <!-- Brand and toggle get grouped for better mobile display -->


    <!-- Page Content -->
    <div class="portfolio-container">
	<div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><br>회원가입
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
              <form name="member_form" method="post" action="insert.php" >


               <h5>*는 필수 입력사항 입니다.</h5>
					<form class ="form-horizontal">
                    <div class="form-group">

                            <div class="col-lg-12">
                            <label>* 아이디:</label>
                            <input type="text" class="form-control" id="id" name="id" required data-validation-required-message="ID를 입력하세요.">
                            <p class="help-block"></p>
                            <a id="id2"  class="btn btn-primary" onclick="check_id()">중복확인</a>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 비밀번호 :</label>
                            <input type="password" class="form-control" id="password" name="pass" required data-validation-required-message="비밀번호를 입력해 주세요.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 비밀번호 확인 :</label>
                            <input type="password" class="form-control" id="password2" name="pass_confirm"required data-validation-required-message="">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 이름 :</label>
                            <input type="text" class="form-control" id="name" name="name" required data-validation-required-message="이름을 입력해주세요.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>* 닉네임 :</label>

                            <input type="text" class="form-control" id="nick" name ="nick"required data-validation-required-message="닉네임을 입력해주세요.">
                             <p class="help-block"></p>
                            <a id=nick2 class="btn btn-primary" onclick="check_nick()">중복확인</a>
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                            <label>* 휴대폰 : </label>
                      <select class="hp" name="hp1">
                                    <option value='010'>010</option>
                                    <option value='011'>011</option>
                                    <option value='016'>016</option>
                                    <option value='017'>017</option>
                                    <option value='018'>018</option>
                                    <option value='019'>019</option>
                    </select>  - <input type="text" class="hp" name="hp2"> - <input type="text" class="hp" name="hp3">
                        </div>
                    </div>
                     <div class="control-group form-group">
                        <div class="controls">
                            <label>이메일 :</label>
                            <input type="email" class="form-control" id="email" name="email" required data-validation-required-message="이메일을 입력해주세요.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">

                            <label>관심분야 : &nbsp;</label>

                            <input type="checkbox"  name="interest[]" value="idea" >&nbsp;기획/아이디어&nbsp;
                            <input type="checkbox"  name="interest[]" value="design">&nbsp;디자인&nbsp;
                             <input type="checkbox"  name="interest[]"  value="report">&nbsp;논문/리포트&nbsp;
                            <input type="checkbox"  name="interest[]"  value="marketing">&nbsp;광고/마케팅&nbsp;
                            <input type="checkbox"  name="interest[]"  value="game">&nbsp;게임/소프트웨어&nbsp;
                            <input type="checkbox"  name="interest[]"  value="science">&nbsp;과학/공학&nbsp;

                        </div>
                    </div>
					</form>
                    <!-- For success/fail messages -->
                    <input type="submit" value= "저장하기" class="btn btn-primary" onclick="check_input()">
                    <a id=cancel class="btn btn-primary"onclick="reset_form()">취소하기</a>

             </form>
        </div>
		</div>
        </div>
        <!-- /.row -->

        <hr>
        <!-- Footer -->
		 <? include "bottom_1.php" ?>

</body>

</html>
