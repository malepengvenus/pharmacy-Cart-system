
<?php include('include/admin/header.php');?>
    <section>
		<div class="container">
			<div class="row">
			<?php include('include/admin/sidebar.php');?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-left">Supplements sold last months</h2>
                        
          
          				          				<?php
 
print"<table border='1px'><tr bgcolor='pink'>
      
	  
      <td >Suppl_Id</td>
      <td >Description</td>
      <td> Inv_Num</td>
	   <td >Inv_date</td>
      </tr>";
      
$select  ="SELECT Suppl_id, Description, invnum, inv_date
FROM supplements, invoive
WHERE inv_date >=  '2017-06-01'
AND inv_date <  '2017-06-30'

 LIMIT 0 , 30";



$result = mysql_query($select) or die ("Query failed :" . mysql_error());
$num_rows = mysql_num_rows($result);

while($row = mysql_fetch_array($result)){


echo"<tr><td>";
print$row['Suppl_id'];
echo"</td><td>";
print$row['Description'];
echo"</td><td>";
print$row['invnum'];
echo"</td><td>";
print$row['inv_date'];



}
print"</table>";
?>
					
					
              </section>
<?php include('include/admin/footer.php'); ?>