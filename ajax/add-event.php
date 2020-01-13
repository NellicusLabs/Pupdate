<?php 
include($_SERVER['DOCUMENT_ROOT'].'/inc/config.php'); // FUNCTIONS FILE....
include($_SERVER['DOCUMENT_ROOT'].'/inc/model/model.php'); // FUNCTIONS FILE....
$Object = new Model();
$Object->addEvent($_POST);
$Result = $Object->getEvents($_POST['pid']);
return $Result;
?>