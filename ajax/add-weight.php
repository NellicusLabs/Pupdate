<?php 
include($_SERVER['DOCUMENT_ROOT'].'/inc/config.php'); // FUNCTIONS FILE....
include($_SERVER['DOCUMENT_ROOT'].'/inc/model/model.php'); // FUNCTIONS FILE....
$Object = new Model();
$Result = $Object->addWeight($_POST);
return $Result;
?>