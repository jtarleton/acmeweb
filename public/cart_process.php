<?php 
require __DIR__ . '/pre.php';

if ($_GET['action'] === 'add') {

$pid = strip_tags($_POST['product_id']);
$qty = isset($_SESSION['cart'][$pid]['qty'])
	? $_SESSION['cart'][$pid]['qty'] 
	: 0;
$_SESSION['cart'][$pid] = array('pid' => $pid, 'qty' => ++$qty);
$_SESSION['flash_msgs'][] = 'Added selection to cart.';
header(sprintf('Location: %s',
	sprintf('http://acme.jamestarleton.com/product_detail.php?product_id=%s', 
	$pid)
	)
);

}

elseif ($_GET['action'] === 'edit') {

	foreach($_POST['product'] as $item) {
		$_SESSION['cart'][$item['pid']]['qty'] = $item['qty'];
	}
	$_SESSION['flash_msgs'][] = 'Cart has been updated.';
	header(sprintf('Location: %s',
		        'http://acme.jamestarleton.com/cart_edit.php'
				        
				));

}
elseif ($_GET['action'] === 'clear') {

	$_SESSION['cart'] = null;
	$_SESSION['flash_msgs'][] = 'Cart has been cleared.';
	     header(sprintf('Location: %s',
		                             'http://acme.jamestarleton.com/cart_edit.php'
					                                             
					                                     ));
}
elseif ($_GET['action'] === 'checkout') {


	$customer_id = $_SESSION['logged_in_customer_id'];
		$pdo->beginTransaction();
		$pdo->exec("CALL make_new_order($customer_id);");
		$pdo->commit();

		$sql = sprintf('SELECT order_id
			FROM acme_order 
			WHERE order_customer_id = %s
			ORDER BY order_created DESC LIMIT 1', $customer_id);
		$res = $pdo->query($sql);
		$last = $res->fetch(PDO::FETCH_ASSOC);
		$_SESSION['order']['order_id'] = (int) $last['order_id'];

	  $_SESSION['flash_msgs'][] = sprintf('Order %s has been submitted.', $_SESSION['order']['order_id']);
	               header(sprintf('Location: %s',
			       'http://acme.jamestarleton.com/orderdetail.php?order_id=' . $_SESSION[
			       'order']['order_id']

									                                                                                 ));

}
exit();
