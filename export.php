<?php

include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=menu.xls");

echo "Menu Name\tDescription\tprice\tcategory\n";

$result = $conn->query("SELECT * FROM Menu WHERE user_id = " . $_SESSION['user_id']);

while ($row = $result->fetch_assoc()) {
    echo $row['iname'] . "\t" .
         $row['description'] . "\t" .
         $row['price'] . "\n";
         $row['category'] . "\n";
}
exit();
?>