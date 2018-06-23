<?php 
require __DIR__ . '/head.php'; ?>
<h2>Cart</h2>

<div class="well">
<form action="cart_process.php?action=edit" id="cart_edit_%s" class="form_cart_edit" method="POST">
<table border="1" style="width:100%;">
<thead><tr><th>Product</th><th>Quantity</th></tr></thead>
<tbody>
<?php 

$format = '<tr>
	<td><input style="background-color:transparent; border:0;" type="text" readonly="readonly" name="product[%s][pid]" value="%s"></input></td>
<td><input type="input" name="product[%s][qty]" value="%s"></td>
</tr>';

?>

<?php foreach($_SESSION['cart'] as $pid => $item): ?>

<?php echo sprintf($format,

	$pid, $pid, $pid, $item['qty']

);

?>
<?php endforeach; ?>


</tbody>
</table>

<div style="float:left">
<input type="submit" value="Update Cart"></input>
</div>

<div style="float:left;"><a 
onclick="return confirm('Really? All selections will be removed.');" 
href="cart_process.php?action=clear">
<button type="button">Clear Cart
</button></a>
</div>

<div style="float:left;">
<a href="cart_process.php?action=checkout">
<button type="button">Checkout</button>
</a>
</div>
<div style="clear:both;">
</form>
</div>
<?php require __DIR__ . '/foot.php';
