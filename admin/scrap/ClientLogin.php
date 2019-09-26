<?php
include_once("Common.php");
if(isset($_SESSION['Login']) && $_SESSION['Login']==true)
	redirect("MyDashboard.php");

	$msg1 = "";
	$msg2 = "";
	$msg3 = "";
	if(isset($_POST["action"]) && $_POST["action"] == "submit_form")
	{
		if(isset($_POST["email"]))
			$email=trim($_POST["email"]);
		if(isset($_POST["password"]))
			$password=trim($_POST["password"]);
			
		if ($email=="")
			$msg1 = "<div class=\"error\">Please Enter Email.</div>";
		else if($email != "")
		{
			if(!validEmailAddress($email))
			{
				$msg1 = "<div class=\"error\">Enter Valid Email.</div>";
			}
		}
		if ($password=="")
			$msg2 = "<div class=\"error\">Please Enter Password.</div>";
			
		if($msg1=='' && $msg2=='')
		{	
			$query="SELECT ID,FirstName,LastName,EmailAddress, Password,Role,Photo FROM client_users WHERE Status = 1 AND EmailAddress='".dbinput($email)."'";
			$result = mysql_query ($query) or die(mysql_error()); 
			$num = mysql_num_rows($result);

			
			if($num==0 || $num > 1)
			{
				$_SESSION["Login"]=false;
				$_SESSION["UserID"]='';
				$_SESSION["UserFullName"]='';
				$_SESSION["RoleID"]='';
				$_SESSION["EmailAddress"]='';
				$_SESSION["Photo"]='';
				$_SESSION["LockScreen"]=true;
				$msg3 = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Invalid Email/Password.</strong></div>';
				
			}
			else
			{
				$row = mysql_fetch_array($result,MYSQL_ASSOC);
				if(dboutput($row["Password"]) == md5($password))
				{
					$_SESSION["Login"]=true;
					$_SESSION["UserID"]=dboutput($row["ID"]);
					$_SESSION["UserFullName"]=dboutput($row["FirstName"]) .' '. dboutput($row["LastName"]);
					$_SESSION["RoleID"]=dboutput($row["Role"]);
					$_SESSION["EmailAddress"]=dboutput($row["EmailAddress"]);
					$_SESSION["Photo"]=dboutput($row["Photo"]);
					$_SESSION["LockScreen"]=false;
					if(isset($_POST["remember_me"])) 
					{
						$year = time() + 31536000;
						setcookie('remember_me_u', $_POST['email'], $year);
						setcookie('remember_me_p', $_POST['password'], $year);
					}
					else 
					{
						if(isset($_COOKIE['remember_me_u']))
						{
							$past = time() - 100;
							setcookie('remember_me_u', '', $past);
						}
						if(isset($_COOKIE['remember_me_p']))
						{
							$past = time() - 100;
							setcookie('remember_me_p', '', $past);
						}
					}
					
					mysql_close($dbh);
					header("Location: MyDashboard.php");
				}
				else
				{
					$_SESSION["Login"]=false;
					$_SESSION["UserID"]='';
					$_SESSION["UserFullName"]='';
					$_SESSION["RoleID"]='';
					$_SESSION["EmailAddress"]='';
					$_SESSION["Photo"]='';
					$_SESSION["LockScreen"]=true;
					$msg3 = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Invalid Email/Password.</strong></div>';
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
		
      <div class="login_wrapper">
	  
        <div class="animate form login_form">
		<?php 
					if(isset($msg3))
					echo $msg3
					?>
          <section class="login_content">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
              <h1>Login Form</h1>
              <div>
				<span style="color:red;font-size:12px;"><?php if(isset($msg1)){echo $msg1;}?></span>
                <input type="text" name="email" class="form-control" placeholder="Email"  value="<?php if(isset($_REQUEST['email'])){echo $_REQUEST['email'];}else{if(isset($_COOKIE['remember_me_u'])){echo $_COOKIE['remember_me_u'];}}?>" />
              </div>
              <div>
				<span style="color:red;font-size:12px;"><?php if(isset($msg2)){echo $msg2;}?></span>
                <input type="password" name="password" class="form-control" placeholder="Password" value="<?php if(isset($_COOKIE['remember_me_p'])){echo $_COOKIE['remember_me_p'];}?>" />
              </div>
              <div>
				<input type="hidden" name="action" value="submit_form" />
				<button type="submit" class="btn btn-default">Login</button>
        <label><input type="checkbox" name="remember_me" 
						<?php if(isset($_COOKIE['remember_me_u'])) {
						echo 'checked="checked"';
						}
						else {
							echo '';
						}
						?> />
        Remember me</label>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div>
                  <h1><img src="<?php echo (is_file(DIR_SETTINGS . $SETTING_Photo) ? DIR_SETTINGS . $SETTING_Photo : 'images/avatar2.png'); ?>" style="height:50px;width:50px;" /> <?php echo $SETTING_Name; ?></h1>
                  <p style="margin-top:-20px;">Copyright &copy; <?php echo date('Y'); ?> - All Rights Reserved</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>