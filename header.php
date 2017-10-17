<header>
	<nav class='large'>
	  <div class="container">
		<div><div class='logoframe'>
			<a href='index.php'><img id='bookclublogo' src='images/logo.png' alt='Matis Bookclub Logo'></a>
			</div>
		  </div>
		<div>
		  <ul class='navlist'>
			<li> <a <?php if($current == 'home') {echo ' id=\'current\'';} ?> href='index.php'>Home</a>
					</li>
					<li> <a <?php if($current == 'about') {echo 'id=\'current\'';} ?> href='about.php'>About Us</a>
					</li>
					<li> <a <?php if($current == 'browse') {echo 'id=\'current\'';} ?> href='browse.php'>Browse</a>
					</li>
					<li> <a <?php if($current == 'mybooks') {echo 'id=\'current\'';} ?> href='mybooks.php'>My Books</a>
					</li>
					<li> <a <?php if($current == 'gallery') {echo 'id=\'current\'';} ?> href='gallery.php'>Gallery</a>
					</li>
		  </ul>
		</div>
	  </div>
	</nav>
</header>