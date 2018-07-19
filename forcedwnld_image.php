<?php
//DbConnection
 $conn = mysqli_connect("localhost","root","");
 mysqli_select_db($conn ,"7ambn");
 //Getting Records From Table
        $sql_read = "select * from register_user";
		$res = mysqli_query($conn ,$sql_read);
		$count = mysqli_num_rows($res);
 if($count>0){
 	while($row=mysqli_fetch_assoc($res)){
 		echo "<div class='frame'>";
 		echo "<img src='uploads/".$row['profile_pic']."'>";
 		echo "<br>";
        echo "<a href='download_image.php?filename=".$row['profile_pic']." '>Download</a>";
 		echo "</div>";
 	}
 }
?>