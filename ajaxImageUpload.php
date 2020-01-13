<?php
$mypath = "uploads/pets/".$_POST['pid'];
if (!file_exists($mypath)) {
    mkdir($mypath, 0777, true);
}

$image = $_POST['image'];

list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name = time().'.png';
file_put_contents("uploads/pets/".$_POST['pid']."/".$image_name, $image);

$newname = $mypath.'/'.$image_name;
echo $newname;

include($_SERVER['DOCUMENT_ROOT'].'/inc/model/model.php'); // MODEL FILE....
$Object = new Model();
$Object->profileImage($image_name, $_POST['pid']); // ASSIGN CLASS DATA TO OBJECT...	


/* 

if (!file_exists($mypath)) {
    mkdir($mypath, 0777, true);
}
define ("MAX_SIZE","9000"); 
function getExtension($str)
{
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
}


$valid_formats = array("jpg", "png", "gif","jpeg");
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST") 
{

    foreach ($_FILES['photos']['name'] as $name => $value)
    {
	
        $filename = stripslashes($_FILES['photos']['name'][$name]);
        $size= filesize($_FILES['photos']['tmp_name'][$name]);
        //get the extension of the file in a lower case format
          $ext = getExtension($filename);
          $ext = strtolower($ext);
     	
         if(in_array($ext,$valid_formats))
         {
	       if ($size < (MAX_SIZE*1024))
	       {
		   $image_name = time().$filename;
		   
		   $newname = $mypath.'/'.$image_name;
		 
           if (move_uploaded_file($_FILES['photos']['tmp_name'][$name], $newname)) 
           {
			    echo $newname;
				include($_SERVER['DOCUMENT_ROOT'].'/inc/model/model.php'); // MODEL FILE....
				$Object = new Model();
				$Object->profileImage($image_name, $_POST['pid']); // ASSIGN CLASS DATA TO OBJECT...				
				
		   }
	       else
	       {
	        echo '<script>alert("You have exceeded the size limit! so moving unsuccessful!"); </script>';
            }

	       }
		   else
		   {
			echo '<script>alert("You have exceeded the size limit!"); </script>';
          
	       }
       
          }
          else
         { 
	     	echo '<script>alert("Unknown extension!"); </script>';
           
	     }
           
     }
} */

?>