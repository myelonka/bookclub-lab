<html>
    <head>
        <title>Mati's Bookclub - Gallery</title>
        <link rel="stylesheet" href="main.css">
        <meta charset="utf-8">
		<link rel='icon' href='images/logoalt.png'>
        <link href="https://fonts.googleapis.com/css?family=Arapey:400,400i|Montserrat:400,500,700" rel="stylesheet">
		 <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		 <script type="text/javascript" src="script.js"></script>
    </head>
    <body>		
		
        <?php 
		$current = 'gallery';
		include('config.php');
		include('header.php');?>
		
		<div class='pagecontainer'>
			<h1>User Gallery</h1><br><br><br>
			
			<?php
			$files = glob("uploadedfiles/*.*");
			for ($i=0; $i<count($files); $i++)
			{
				$num = $files[$i];
				echo '<img src="'.$num.'" id="userimg">'."&nbsp;&nbsp;";
				}
			?>
			
		</div>
		
		<?php include 'footer.html';?>
		
	</body>
</html>