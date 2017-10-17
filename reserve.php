<?php 

include ("config.php");


$bookId = trim($_GET['bookId']);
echo '<INPUT type="hidden" name="bookId" value=' . $bookId . '>';

$bookId = trim($_GET['bookId']);      // From the hidden field
$bookId = addslashes($bookId);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "Could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page >></a>");
        exit();
    }
    
   echo "You are reserving book with the ID:" .$bookId;

    // Prepare an update statement and execute it
    $stmt = $db->prepare("UPDATE books SET onloan=1 WHERE bookId = ?");
    $stmt->bind_param('i', $bookId);
    $stmt->execute();
    printf("<br>Book Reserved!");
    printf("<br><a href=browse.php>Search and Book more Books </a>");
    printf("<br><a href=mybooks.php>Return to Reserved Books </a>");
    printf("<br><a href=index.php>Return to home page </a>");
    exit;
    

?>