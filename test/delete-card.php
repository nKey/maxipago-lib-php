<?php
require_once "../lib/maxiPago.php";

try {

    $maxiPago = new maxiPago;

    // Before calling any other methods you must first set your credentials
    $maxiPago->setCredentials("100", "merchant_key");

    $maxiPago->setDebug(true);
    $maxiPago->setEnvironment("TEST");
    $data = array(
        "customerId" => "11006", // REQUIRED - Customer ID created by maxiPago! after "add-customer" command //
        "token" => "z1FuQQ0qSBA=", // REQUIRED - Card token assigne by maxiPago! after "add-card-onfile" command //
    );
    $maxiPago->deleteCreditCard($data);

    if ($maxiPago->isErrorResponse()) {
        echo "Request has failed<br>Error message: ".$maxiPago->getMessage();
    }

    else {
        echo "Credit Card Removed";
    }

}

catch (Exception $e) { echo $e->getMessage()." in ".$e->getFile()." on line ".$e->getLine(); }
?>