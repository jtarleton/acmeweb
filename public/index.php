<?php 
require __DIR__ . '/head.php'; ?>
<h2>Welcome</h2>
<div class="well" style="padding:5px;">
Acme is a fictional company used for developing a model enterprise web application.  We sell various fictional products, none of which exist in reality.  
As a start-up, our business is growing rapidly, currently expanding by 24 new fictional customers and 24 new fictional orders per day. Submit a fictional online order if you wish; as noted in our <a href="terms_conditions.php">Terms and Conditions</a>, it will not be fulfilled.
</div>
<h2>Product Catalog</h2>
<div class="well">
<?php $rows = $pdo->query("SELECT * FROM acme_product");
?><table border="1" style="width:100%;"><?php
foreach($rows as $row): ?>	
<?php echo sprintf('<tr><td>%s</td><td>%s</td></tr>', 

sprintf('<a href="product_detail.php?product_id=%s">%s</a>', $row['product_id'],
	
		$row['product_description']
	
		),

money_format('$%i', $row['product_price']) 

); 
?>
<?php endforeach; ?></table></div>
<?php require __DIR__ . '/foot.php';
