
<?php include('include/admin/header.php');?>
    <section>
		<div class="container">
			<div class="row">
			<?php include('include/admin/sidebar.php');?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">low stock</h2>
                        
          
          				
					
					<?php
  
print"<table border='1px'><tr bgcolor='pink'>
 
	   <td>Supplement ID</td>
      <td>Description</td>
	    <td>Cost Excl</td>
		  <td>Cost Incl</td>
		    <td>Perc Inc</td>
			  <td>Cost Client</td>
			    <td>Suppier ID</td>
				  <td>Minimum Levels</td>
				    <td>Stock Levels</td>
      </tr>";
	  

	  
      
$select  ="SELECT Suppl_id, Description, Cost_excl, Cost_incl, Perc_inc, Cost_client, Supplier_id, Min_levels, Stock_levels
FROM `supplements`
WHERE stock_levels <=30
ORDER BY stock_levels

LIMIT 0 , 30";
$result = mysql_query($select) or die ("Query failed :" . mysql_error());
$num_rows = mysql_num_rows($result);

while($row = mysql_fetch_array($result)){


     
echo"<tr><td>";
print$row['Suppl_id'];
echo"</td><td>";
print$row['Description'];
echo"</td><td>";
print$row['Cost_excl'];
echo"</td><td>";
print$row['Cost_incl'];
echo"</td><td>";
print$row['Perc_inc'];
echo"</td><td>";
print$row['Cost_client'];
echo"</td><td>";
print$row['Supplier_id'];
echo"</td><td>";
print$row['Min_levels'];
echo"</td><td>";
print$row['Stock_levels'];




}
print"</table>";
?>
              </section>
<?php include('include/admin/footer.php'); ?>