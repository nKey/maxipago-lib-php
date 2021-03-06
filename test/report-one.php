<?php
require_once "../lib/maxiPago.php";

try {

    $maxiPago = new maxiPago;

    // Before calling any other methods you must first set your credentials
    $maxiPago->setCredentials("100", "merchant_key");

    $maxiPago->setDebug(true);
    $maxiPago->setEnvironment("TEST");
    $data = array(
        "transactionID" => "421365", // REQUIRED - TransactionID created by maxiPago! //
    );
    $maxiPago->pullReport($data);

    if ($maxiPago->isErrorResponse()) {
        echo "Request has failed<br>Error message: ".$maxiPago->getMessage();
    }
    
    else {
        if ($maxiPago->getTotalNumberOfRecords() > 0) { print_r($maxiPago->getReportResult()); }
        else { echo "Query was executed sucessfully but no transactions were found."; }
    }

}

catch (Exception $e) { echo $e->getMessage()." in ".$e->getFile()." on line ".$e->getLine(); }
?>