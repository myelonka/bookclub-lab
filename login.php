<html>
	<head>
		<title>Mati's Bookclub - Login</title>
		<meta charset="utf-8">
		<link rel='icon' href='images/logoalt.png'>
        <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Montserrat:400,500,700" rel="stylesheet">
	</head>
	<body>
		
		<?php 
		include('config.php');
		session_start();
		@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);
		ini_set('session.cookie_httponly', true);
		$error = null;
		
		if($_SERVER["REQUEST_METHOD"] == "POST") {

		  $username = mysqli_real_escape_string($db,$_POST['username']);
		  $password = mysqli_real_escape_string($db,$_POST['userpass']); 

		  $sql = "SELECT id FROM user WHERE username = '$username' and userpass = '$password'";
		  $result = mysqli_query($db,$sql);
		  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		  $active = $row['active'];

		  $count = mysqli_num_rows($result);

		  if($count == 1) {
			 $_SESSION['login_user'] = $username;
	
			 header("location: backend/add.php");
		  }else {
			 $error = 'Your username or password is invalid!';
		  }
	    }
		?>
		
		<style>
	
			* {
				font-family: 'Montserrat', sans-serif;
			}
				form {
					width: 500px;
					margin: 0 auto;
			}

			/* Full-width inputs */
			input[type=text], input[type=password] {
				width: 100%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				box-sizing: border-box;
				border-radius: 2px;
			}

			/* Set a style for all buttons */
			button {
				background-color: #33B4E9;
				color: white;
				padding: 14px 20px;
				margin: 8px 0;
				border: none;
				cursor: pointer;
				width: 100%;
				border-radius: 2px;		

			}

			/* Add a hover effect for buttons */
			button:hover {
				opacity: 0.8;
			}

			/* Extra style for the cancel button (red) */
			.cancelbtn {
				width: auto;
				padding: 10px 18px;
				background-color: #f44336;
			}

			/* Center the avatar image inside this container */
			.imgcontainer {
				text-align: center;
				margin: 24px 0 12px 0;
			}

			/* Avatar image */
			img.avatar {
				width: 40%;
				border-radius: 50%;
			}

			/* Add padding to containers */
			.container {
				padding: 16px;
			}

			/* The "Forgot password" text */
			span.psw {
				float: right;
				padding-top: 16px;
			}


		</style>

		
		<form action="" method="POST">

		  <div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="userpass" required>

			<button type="submit" >Login</button>
			  
			  <div style = "color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

		  </div>
		</form>
		
	</body>
</html>

