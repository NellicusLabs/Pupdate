<?php 
	include('init.php'); // INCLUDE INITIATE FILE WHICH HAVE ALL FUNCTIONS FILES..
	$Object = new Pet(); // CALL CLASS BY OBJECT OF CLASS...
	$Result = $Object->dashboard(); // ASSIGN CLASS DATA TO OBJECT...

	include('./header.php'); // INCLUDE HEADER FILE...	
	include('html/dashboard.html'); // INCLUDE HTML FILE...
	include('./footer.php'); // INCLUDE FOOTER FILE...
	
?>