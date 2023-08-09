<?php
include 'Database.php';
$sql = "SELECT * FROM customer where saleledger='sales'";
$result = mysqli_query($conn, $sql);
if ($result) {
    // Fetch the data
    $sum=0;
    while ($row = mysqli_fetch_assoc($result)) {
  
        $Netamount = $row['Netamount'];
        $sum=$Netamount+$sum;
    }
    echo $sum."<br>";
}
$sql = "SELECT * FROM payment";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Fetch the data
    $p=0;
    while ($row = mysqli_fetch_assoc($result)) {
  
        $Netamount = $row['amount'];
        $p=$Netamount+$p;
    }
    print_r ($p)."<br>";
}

$sql = "SELECT * FROM receipt";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Fetch the data
    $r=0;
    while ($row = mysqli_fetch_assoc($result)) {
  
        $Netamount = $row['amount'];
        $r=$Netamount+$r;
    }
    print_r ($r)."<br>";
}
$bal=($sum+$r)-($p+$P);
?>