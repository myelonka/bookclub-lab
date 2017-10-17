<html>
    <head>
        <title>Mati's Bookclub - Browse Books</title>
        <link rel="stylesheet" href="main.css">
        <meta charset="utf-8">
		<link rel='icon' href='images/logoalt.png'>
        <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Montserrat:400,500,700" rel="stylesheet">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		 <script type="text/javascript" src="script.js"></script>
    </head>
    <body>		
		
        <?php 
		$current = 'browse';
		include('config.php');
		include('header.php');?>
		
		<div class='pagecontainer'>
			<h1>Browse</h1><br><br><br>
			<p><strong>Search our catalogue</strong></p>
			<p>You may search by title, or by author, or both</p><br>
			<form action="browse.php" method="POST">
				<table>
					<tbody>
						<tr>
							<td><p>Title:</p><input type="search" name="searchtitle"></td>
						</tr>
						<tr>
							<td><p>Author</p><input type="search" name="searchauthor"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Submit"></td>
						</tr>
					</tbody>
				</table>
			</form>
			<?php
			# This is the mysqli version

			$searchtitle = "";
			$searchauthor = "";

			if (isset($_POST) && !empty($_POST)) {
			# Get data from form
				$searchtitle = trim($_POST['searchtitle']);
				$searchauthor = trim($_POST['searchauthor']);
			}

			//	if (!$searchtitle && !$searchauthor) {
			//	  echo "You must specify either a title or an author";
			//	  exit();
			//	}

			$searchtitle = addslashes($searchtitle);
			$searchauthor = addslashes($searchauthor);

			# Open the database
			@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

			if ($db->connect_error) {
				echo "could not connect: " . $db->connect_error;
				printf("<br><a href=index.php>Return to home page </a>");
				exit();
			}

			# Build the query. Users are allowed to search on title, author, or both

			$query = " SELECT * FROM books";
			if ($searchtitle && !$searchauthor) { // Title search only
				$query = $query . " WHERE title LIKE '%" . $searchtitle . "%'";
			}
			if (!$searchtitle && $searchauthor) { // Author search only
				$query = $query . " WHERE author LIKE '%" . $searchauthor . "%'";
			}
			if ($searchtitle && $searchauthor) { // Title and Author search
				$query = $query . " WHERE title LIKE '%" . $searchtitle . "%' AND author LIKE '%" . $searchauthor . "%'"; // unfinished
			}

			//echo "Running the query: $query <br/>"; # For debugging


			  # Here's the query using an associative array for the results
			//$result = $db->query($query);
			//echo "<p> $result->num_rows matching books found </p>";
			//echo "<table border=1>";
			//while($row = $result->fetch_assoc()) {
			//echo "<tr><td>" . $row['bookid'] . "</td> <td>" . $row['title'] . "</td><td>" . $row['author'] . "</td></tr>";
			//}
			//echo "</table>";


			# Here's the query using bound result parameters
				// echo "we are now using bound result parameters <br/>";
				$stmt = $db->prepare($query);
				$stmt->bind_result($bookId, $title, $author, $pagesNo, $edition, $yearPubl, $publisher, $onLoan);
				$stmt->execute();

				echo '<table id="browsetable">';
				echo '<tr id="toprow"><td id="col1">Title</td> <td id="col2">Author</td> <td id=""col3> </td> </tr>';
				while ($stmt->fetch()) {
					echo "<tr>";
					echo "<td> $title </td><td> $author </td>";
					echo '<td><a id="reservebook" href="reserve.php?bookId=' . urlencode($bookId) . '"> Reserve </a></td>';
					echo "</tr>";
				}
				echo "</table>";
				?>
		
		<?php include 'footer.html';?>
		
	</body>
</html>