<?php
function config(){
/*
-----------------------------------------------------------------------------------------------------------------
START OF CONFIGURATION YOU NEED TO EDIT
-----------------------------------------------------------------------------------------------------------------
*/

//MySQL host
$DB_HOST="localhost";

//MySQL username
$DB_USER="someusername";

//MySQL password
$DB_PASS="somepassword";

//MySQL database
$DB_NAME="somedatabase";

//MySQL port
$DB_PORT="3306";

/*
-----------------------------------------------------------------------------------------------------------------
DO NOT EDIT ANYTHING BELOW THIS LINE.
-----------------------------------------------------------------------------------------------------------------
*/
if (!empty($DB_HOST) && !empty($DB_USER) && !empty($DB_NAME) && filter_var($DB_PORT, FILTER_VALIDATE_INT))
    {
		$DB = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME,$DB_PORT);
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			exit();
		}
		return $DB;
	}
}
?>