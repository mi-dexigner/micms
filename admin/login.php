<?php
require_once("../include/inc_head.php");
if(isset($_SESSION['Login']) && $_SESSION['Login']==true)
	redirect("dashboard.php");

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

			if ( isset( $_COOKIE['retry'] ) && $_COOKIE['retry'] > 4 ) {
				if ( !isset( $_COOKIE['timestamp'] )) {          // First failed attempt
		        setcookie('timestamp', time() + 200 );     // 3600 Seconds = 1 hour
		    } else if ( $_COOKIE['timestamp'] > time() ) {  // Wait an hour
		       $msg1 = 'The number of login attempts are exhausted. Pleas wait an hour for next retry!';
		    } else {                                        // Timeout has passed
		        setcookie('retry', 0 );
		        unset( $_COOKIE['timestamp'] );
		    }
		} else {
		    setcookie('retry', 0);
		}

		if($msg1=='' && $msg2=='')
		{
			$query="SELECT ID,FirstName,LastName,EmailAddress, Password,Role,Photo FROM users WHERE Status = 1 AND EmailAddress='".dbinput($email)."'";
			$result = $db->query($query) or die(mysqli_error());
			$num = mysqli_num_rows($result);


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
				$row = mysqli_fetch_assoc($result);
				if(dboutput($row["Password"]) == md5($password))
				{
					if ( isset( $_COOKIE['retry'] ) );
					unset($_COOKIE['retry']);
					$_SESSION["Login"]=true;
					session_regenerate_id(true);
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

					mysqli_close($dbh);
					header("Location: dashboard.php");
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

						     if ( isset( $_COOKIE['retry'] ) ) {
						        setcookie( 'retry', $_COOKIE['retry'] + 1);
						    } else {
						        setcookie( 'retry', 1 );
						    }
				}
			}
		}
	}
?>



<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">

    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <link rel="stylesheet" href="assets/login.css">
  </head>

  <body class="align">

    <div class="grid">

      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="form login">

        <div class="form__field">
        	<span style="color:red;font-size:12px;"><?php if(isset($msg1)){echo $msg1;}?></span>
          <label for="login__username"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#user"></use></svg><span class="hidden">Email Address</span></label>
          <input id="login__username" type="text" name="email" class="form__input" placeholder="Email" required value="<?php if(isset($_REQUEST['email'])){echo $_REQUEST['email'];}else{if(isset($_COOKIE['remember_me_u'])){echo $_COOKIE['remember_me_u'];}}?>">
        </div>

        <div class="form__field">
        	<span style="color:red;font-size:12px;"><?php if(isset($msg2)){echo $msg2;}?></span>
          <label for="login__password"><svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#lock"></use></svg><span class="hidden">Password</span></label>
          <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" value="<?php if(isset($_COOKIE['remember_me_p'])){echo $_COOKIE['remember_me_p'];}?>" required>
        </div>

        <div class="form__field">
        	<input type="hidden" name="action" value="submit_form" />
          <input type="submit" value="Login">
        </div>
<!-- <label><input type="checkbox" name="remember_me"
						<?php if(isset($_COOKIE['remember_me_u'])) {
						echo 'checked="checked"';
						}
						else {
							echo '';
						}
						?> />
        Remember me</label> -->
      </form>

     <!--  <p class="text--center">Not a member? <a href="#">Sign up now</a> <svg class="icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="assets/images/icons.svg#arrow-right"></use></svg></p> -->

    </div>

    <svg xmlns="http://www.w3.org/2000/svg" class="icons"><symbol id="arrow-right" viewBox="0 0 1792 1792"><path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z"/></symbol><symbol id="lock" viewBox="0 0 1792 1792"><path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z"/></symbol><symbol id="user" viewBox="0 0 1792 1792"><path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z"/></symbol></svg>

  </body>

</html>
