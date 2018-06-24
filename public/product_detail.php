<?php 
require __DIR__ . '/head.php'; ?>
<h2>Product <?php echo intval($_GET['product_id']); ?></h2>

<div class="well">

<?php $row = new AcmeProduct(intval($_GET['product_id'])); ?>
<table border="1" style="width:100%;">
<?php echo sprintf('<tr><td>%s</td>
<td>%s</td>
<td>%s</td>
<td>
<form action="cart_process.php?action=add" id="cart_add_%s" class="form_cart_add" method="POST">
<input type="hidden" name="product_id" value="%s"></input>
<input type="submit" value="Add to Cart"></input?
</form>
</td></tr>', 
$row->product_id, 
$row->product_description, 
$row->getProductPrice(),
$row->product_id,
$row->product_id
); 
?>
</table>

</div>

<?php require __DIR__ . '/foot.php';
