<?
	session_start();
?>

<meta charset='utf-8'>
<head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>한국기술교육대학교 웹프로그래밍 텀프로젝트</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/flexslider/flexslider.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/media-queries.css">

        <!-- php5 Shim and Respond.js IE8 support of php5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

             <!-- Top menu -->
            <nav class="navbar" role="navigation">
               <div class="container">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                     </button>
                     <a class="navbar-brand" href="index.php">Andia - a super cool design agency...</a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="top-navbar-1">
                     <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="index.php"><i class="fa fa-home"></i><br>HOME</a>
                        </li>
                        <li>
                           <a href="competition.php"><i class="fa fa-list"></i><br>Competetion</a>
                        </li>
                        <li>
                           <a href="activities.php"><i class="fa fa-list"></i><br>Activities</a>
                        </li>
												<li>
                           <a href="list.php"><i class="fa fa-list-alt"></i><br>Board</a>
                        </li>
												<li>
                           <a href="calendar.php"><i class="fa fa-calendar"></i><br>Calendar</a>
                        </li>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="100">
                              <i class="fa fa-eye"></i><br>Blog <span class="caret"></span>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-left" role="menu">
                              <li><a target="_balnk" href="http://blog.naver.com/zxdv1992">BLOG_DONGWOO</a></li>
                              <li><a target="_balnk" href="http://blog.daum.net/dnflwlq6657">BLOG_AH-HYEON</a></li>
                           </ul>
                        </li>
                        <li>
                           <a href="contact.php"><i class="fa fa-envelope-square"></i><br>Contact</a>
                        </li>


                              <?
                              if(!$userid){
                              ?>
                              <li>
                              <a href="login.php"><i class="fa fa-sign-in"></i><br>LogIn</a>
                              </li>
                              <li>
                              <a href="sign_up_form.php"><i class="fa fa-users"></i><br>SignUp</a>
                              </li>
                              <?
                                }
                              else{
                              ?>
                              <li>
                              <a href="logout.php"><i class="fa fa-sign-out"></i><br>Logout</a>
                              </li>
                              <li>
                              <a href="member_form_modify.php"><i class="fa fa-gear"></i><br>Information</a>
                              </li>
                              <?
                              }
                              ?>


                     </ul>
                  </div>
               </div>
            </nav>
