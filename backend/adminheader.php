<header>
	<h1>Admin Panel</h1>
	<ul class='nav'>
		<li> <a <?php if($current == 'add') {echo ' id=\'current\'';} ?> href='add.php'>Add Books</a>
		</li>
		<li> <a <?php if($current == 'delete') {echo 'id=\'current\'';} ?> href='delete.php'>Delete Books</a>
		</li>
		<li> <a <?php if($current == 'upload') {echo 'id=\'current\'';} ?> href='fileUpload.php'>Upload a Pic</a>
		</li>
		<li> <a id='logout' href='../logout.php'>Logout</a>
		</li>
	</ul>
</header>