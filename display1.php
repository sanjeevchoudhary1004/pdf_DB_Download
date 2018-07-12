<?php
extract($_POST);
if(isset($string))
{
    //$searchstr = $_POST['searchstr'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM register_user WHERE name LIKE '%".$searchstr."%' ";
    $search_result = filterTable($query);
     
}
 else {
    $query = "SELECT * FROM register_user";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "7ambn");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Display Records</title>
</head>
<body>
	<h1>Display DB Records!</h1>
  <div>
    <form method="post" action="">
  Search By Name:<input type="text" placeholder="Search By Name" name="searchstr">
  <input type="submit" name="string" value="Search!">
  </form>
  <a href="download_dbrecs.php">PDF Download</a><br>
  <a href="download_csv.php">CSV Download</a><br>
  <a href="download_excel.php">Excel Download</a>
</div><br><br>

	<table border="1px">
		<thead>
			<tr>
				<th>Sl.no</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Mobile</th>
				<th>Date</th>
				<th>Profile Pic</th>
        <th colspan="2">Action</th>
			</tr>			
		</thead>
		<tbody>
			<!--<?php
              require_once"dbconnect.php";
              $sql_qry="select * from register_user";
              $res=mysqli_query($conn,$sql_qry);
              $count=mysqli_num_rows($res);
              if($count>0){
              	$i=1;
              	while($row=mysqli_fetch_assoc($res))
              	{
                 ?>-->
                  <?php 
                  $i=1;
                  while($row = mysqli_fetch_array($search_result)):?>
                  <tr>
                  	<td><?php echo $i;?></td>
                  	<td><?php echo ucfirst($row['name']);?></td>
                  	<td><?php echo $row['email'];?></td>
                  	<td><?php echo $row['password'];?></td>
                  	<td><?php echo $row['mobile'];?></td>
                  	<td><?php echo $row['date'];?></td>
                  	<td><img src="uploads/<?php echo $row['profile_pic']; ?>" width=50 height=50/></td>
                    <td>
                      <a href="delete.php?uid=<?php echo base64_encode($row['user_id']);?>" onclick="return window.confirm('Are you sure to Delete');">Delete</a>
                      <a href="update.php?uid=<?php echo base64_encode($row['user_id']);?>">Update</a>
                    </td>
                  </tr>
                       <?php 
                         $i++;
                        endwhile;
                        ?>
                 <!--<?php
                 $i++;
              }
          }
              else{
                ?>
                <tr><td colspan="6"><p style="color:red"> No Record Found in DB..!!</p></td></tr>
                <?php

              }
			?>	-->	
		</tbody>
		
	</table>

</body>
</html>