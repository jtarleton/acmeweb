<?php

require __DIR__ .'/QuickDB.class.php';
//add customer
$pdo = QuickDB::getInstance();

try
{
$pdo->beginTransaction();
$pdo->exec("CALL add_person('steve','Jones');");
//make_new_order
$rs = $pdo->query('SELECT @someid as someid');
$obj = $rs->fetchObject();
$lastid = (int) $obj->someid;
if ($lastid > 0 ) {
$pdo->exec("CALL make_new_order($lastid);");
$pdo->commit(); 
echo "Added ID $lastid" . PHP_EOL;
}
else {
throw new Exception('Error getting last insert id.');
}
}
catch(PDOException $pdoe) {
$pdo->rollback();
echo 'PDO error: '. $pdoe->getMessage();
}
catch(Exception $e) {
echo $e->getMessage();
}

