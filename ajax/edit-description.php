<?php 
include($_SERVER['DOCUMENT_ROOT'].'/inc/config.php'); // FUNCTIONS FILE....
include($_SERVER['DOCUMENT_ROOT'].'/inc/model/model.php'); // FUNCTIONS FILE....
$Object = new Model();
$Result = $Object->editDescription($_POST);
return $Result;
?>