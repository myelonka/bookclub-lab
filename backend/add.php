<html>
    <head>
        <title>Mati's Bookclub Admin - Add Book</title>
        <link rel="stylesheet" href="../backend/admin.css">
        <meta charset="utf-8">
		<link rel='icon' href='../images/logoalt.png'>
        <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Montserrat:400,500,700" rel="stylesheet">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		 <script type="text/javascript" src="../script.js"></script>
    </head>
	<body>
		
      <?php 
			$current = 'add';
			include('config.php');
			include('session.php');
			ini_set('session.cookie_httponly', true);
		
				if (isset($_POST['newbooktitle'])) {
			 // This is the postback so add the book to the database
			 # Get data from form
			 $newbooktitle = trim($_POST['newbooktitle']);
			 $newbookauthor = trim($_POST['newbookauthor']);
			 $newpagesno = trim($_POST['newpagesno']);
			 $newedition = trim($_POST['newedition']);
			 $newyearpubl = trim($_POST['newyearpubl']);
			 $newpublisher = trim($_POST['newpublisher']);
			 $newbooktitle = htmlentities($newbooktitle);
			 $newbookauthor = htmlentities($newbookauthor);
			 $newpagesno = htmlentities($newpagesno);
			 $newedition = htmlentities($newedition);
			 $newyearpubl = htmlentities($newyearpubl);
			 $newpublisher = htmlentities($newpublisher);
			

			 if (!$newbooktitle || !$newbookauthor) {
				  printf("You must specify at least a title and an author");
				  printf("<br><a href=../index.php>Return to home page </a>");
				  exit();
			 }

			 $newbooktitle = addslashes($newbooktitle);
			 $newbookauthor = addslashes($newbookauthor);
			 $newpagesno = addslashes($newpagesno);
			 $newedition = addslashes($newedition);
			 $newyearpubl = addslashes($newyearpubl);
			 $newpublisher = addslashes($newpublisher);

			 # Open the database using the "librarian" account
		@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

			 if ($db->connect_error) {
				  echo "Could not connect: " . $db->connect_error;
				  printf("<br><a href=../index.php>Return to home page </a>");
				  exit();
			 }

			 // Prepare an insert statement and execute it
			 $stmt = $db->prepare("INSERT INTO books(title, author, pagesNo, edition, yearPubl, publisher) VALUES (?, ?, ?, ?, ?, ?)");
			 $stmt->bind_param('ssisis', $newbooktitle, $newbookauthor, $newpagesno, $newedition, $newyearpubl, $newpublisher);
			 $stmt->execute();
			 printf("<br>Book Added!");
			 printf("<br><a href=add.php>Return</a><br><a href=../browse.php>Go to Browse</a>");
			 exit;
		}

		// Not a postback, so present the book entry form
		?>
		
		<div class="body-wrapper">
			
			<?php 
				include('adminheader.php')
			?>

			<div class="page-container">
				<h2>Add a new book</h2>
				<br>
				<form action="add.php" method="POST">
					 <table cellpadding="6">
						  <tbody>
								<tr>
									 <td>Title:</td>
									 <td><input type="text" name="newbooktitle"></td>
								</tr>
								<tr>
									 <td>Author:</td>
									 <td><input type="text" name="newbookauthor"></td>
								</tr>
							  <tr>
									 <td>No. of Pages:</td>
									 <td><input type="number" name="newpagesno"></td>
								</tr>
							  <tr>
									 <td>Edition:</td>
									 <td><input type="text" name="newedition"></td>
								</tr>
							  <tr>
									 <td>Year Published:</td>
									 <td><input type="number" name="newyearpubl"></td>
								</tr>
							  <tr>
									 <td>Publisher:</td>
									 <td><input type="text" name="newpublisher"></td>
								</tr>
								<tr>
									 <td></td>
									 <td><input type="submit" name="submit" value="Add Book"></td>
								</tr>
							  
						  </tbody>
					 </table>
				</form>
			</div>
			
		</div>
	</body>