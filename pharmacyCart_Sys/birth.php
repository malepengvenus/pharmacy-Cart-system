
<?php include('include/admin/header.php');?>
    <section>
		<div class="container">
			<div class="row">
			<?php include('include/admin/sidebar.php');?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-left">Upcoming Birthdays</h2>
                        
          
          				<?php
 
print"<table border='1px'><tr bgcolor='pink'>
      
	  
      <td >Name</td>
      <td >Surname</td>
      <td> Email</td>
	   <td >Birthdays</td>
      </tr>";
      
$select  ="SELECT C_name, C_surname, C_Email, BornDay
FROM client_data LIMIT 0 , 30";


$result = mysql_query($select) or die ("Query failed :" . mysql_error());
$num_rows = mysql_num_rows($result);

while($row = mysql_fetch_array($result)){


echo"<tr><td>";
print$row['C_name'];
echo"</td><td>";
print$row['C_surname'];
echo"</td><td>";
print$row['C_Email'];
echo"</td><td>";
print$row['BornDay'];



}
print"</table>";
?>
					
					
              </section>
<?php include('include/admin/footer.php'); ?>