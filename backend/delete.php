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
			$current = 'delete';
			include('config.php');
			include('session.php');
			ini_set('session.cookie_httponly', true);
		
		
			$query = " SELECT bookId, title, author FROM books ";
		
			$display = $db->prepare($query);
			$display->bind_result($bookId, $title, $author);
			$display->execute();
			
			
		
				if (isset($_GET['submit'])) {

					 $bookId = trim($_GET['bookId']);  
					 $bookId = addslashes($bookId);

					 @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

					 if ($db->connect_error) {
						  echo "could not connect: " . $db->connect_error;
						  printf("<br><a href=../index.php>Return to home page </a>");
						  exit();
				 }


				  $stmt = $db->prepare("DELETE FROM books WHERE bookId = ?");
				  $stmt->bind_param('i', $bookId);
				  $response = $stmt->execute();
				  printf("<br>Book deleted!");
				  printf("<br><a href=delete.php>Return</a><br><a href=../browse.php>Go to Browse</a>");

			  exit;
			}

		?>
		
		<div class="body-wrapper">
			
			<?php 
				include('adminheader.php')
			?>

			<div class="page-container">
				<h2>Delete a book</h2>
				<form action="delete.php" method="GET">
					 <?php
					echo '<select>';
					while ($display->fetch()) {
					echo '<option value="bookid">'.$title.' (by '.$author.')</option>';
					};
			echo '</select>';
					 echo '<input type="hidden" name="bookid" value=' . $bookId . '>';
					 ?>
					 <input type="submit" name="submit" value="Delete">
				</form>
			</div>
	</body>
    
    
    
    
</html>