<?php 
 if(isset($_GET["filename"]) && $_GET["filename"] !=""){
 	$file="uploads/".$_GET["filename"];

 	header('Content-type:application/force_download');
 	header('Content-disposition:attachment; filename="'.basename($file).'"');
 	header('Content-length:'.filesize($file));
 	readfile($file);
 }
 else{
 	header("location:display1.php?error=Error:Invalid Filename");
 }
 ?>