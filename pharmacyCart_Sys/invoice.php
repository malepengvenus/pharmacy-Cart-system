<?php include('include/home/header1.php'); ?>
  	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
			
			
			<h1>INVOICE DETAILS</h1>
			 <td>            
			 
			 
			 
			 
                                   <p>order number:V99745</p>
                                    inv_date: <?php echo date("d-m-Y");?><br>
								
								<Date: <?php echo date('d/m/Y');?> <br>
								Time: <?php echo date('H:ia'); ?><br><br><br>
								
								
								
								 <p>Health First For You<br/>Pretoria Sunnyside<br/>PRETORIA<br/>0001</p>
                                </td>
					
				<div class="col-sm-12">
                    <table class="table table-bordered table-responsive">
					
					
					
					
                        <thead class="bg-primary">
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
                        <?php if(isset($_SESSION['cart'])){ ?>
                            <?php foreach($_SESSION['cart'] as $row): ?>
                                <?php if($row['qty'] != 0): ?>
                                <tr>
                                    <td class="text-center"><strong><?php echo $row['product'];?></strong></td>
                                    <td class="text-center"><?php echo $row['price'];?></td>
                                    <td class="text-center">
                                        <form action="cart/data.php?q=updatecart&id=<?php echo $row['proID'];?>" method="POST">
                                        <input type="number" name="qty" "<?php echo $row['qty'];?>"  style="width:50px;"/>
                                       
                                        </form>
                                    </td>
                                    <?php $itotal = $row['price'] * $row['qty']; ?>
                                    <td class="text-center"><font class="itotal"><?php echo $itotal; ?></font></td>
                                  
                                </tr>
                                
                                <?php $total = $total + $itotal;?>  
                                <?php endif;?>
                            <?php endforeach; ?> 
                                <?php $_SESSION['totalprice'] = isset($_SESSION['totalprice']) ? $_SESSION['totalprice'] : $total; ?>
                                <?php $vat = $total * 0.15; ?>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Sub Total</strong></td>
                                    <td colspan="2" class="text-primary"><?php echo number_format($total - $vat,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>VAT (15%)</strong></td>
                                    <td colspan="2" class="text-danger"><?php echo number_format($vat,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                    <td colspan="2" class="text-danger"><strong><?php echo number_format($total,2) ?></strong></td>
                                </tr>
                                                   
                        </tbody>
                    </table>
                    <div class="pull-right">
					
					<button onclick="myFunction()">Print this page</button>
                      
                        <a href="success.php" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
                    </div>
                    <?php }else{ ?>
                            <tr><td colspan="5" class="text-center alert alert-danger"><strong>*** Your Cart is Empty ***</strong></td></tr>
                            </tbody>
                        </table>
                    <?php } ?>
				</div>
			</div>
		</div>
		
	
<script>
function myFunction() {
    window.print();
}
</script>
	</section><!--/form-->
	<?php include('include/home/modal.php'); ?>
