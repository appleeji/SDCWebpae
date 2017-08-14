<?
  session_start();
?>
<!DOCTYPE php>

 <? include "top_menu.php" ?>

<form name ="member_form.php" method ="post" action="login2.php">
 <title>Login</title>

<body>

    <!-- Page Content -->
    <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-sign-in"></i>
                        <h1>LogIn /</h1>
                        <p>This pages are pages for LogIn.</p>
                    </div>
                </div>
            </div>
        </div>



        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
     <div class="portfolio-container">
	 <div class = "container">
    <form class="form-signin">
      <h2 class="form-signin-heading">login</h2>
      <input type="text" class="form-control" name="id" placeholder="ID" required=""/>
      <input type="password" class="form-control" name="pass" placeholder="Password" required	=""/>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<? include "bottom_1.php" ?>
</body>

</html>
