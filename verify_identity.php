<?php

if(isset($_POST["identify"])){
    //sanitize form inputs
$sanitize = filter_var_array($_POST, FILTER_SANITIZE_STRING);

//Gather form inputs
$accountNumber = $sanitize["account_number"];
$bankCode = $sanitize["bank_code"];
}
if(empty($accountNumber) OR empty($bankcode)){
    die("Go back and fill the fields");
}

//Paystack Integration
$curl = curl_init(); //init curl

//Turn off mandatory ssl
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

//Resolve account endpoint
$url = "https://api.paystack.co/bank/resolve?account_number="  .  $accountNumber  .  "&bank_code="  .  $bankCode;

//Configure curl options
curl_setopt_array($curl, array(
        //Set the above endpoint in cURL
        CURLOPT_URL => $url,

        //Make cURL return data
        CURLOPT_RETURNTRANSFER => true,

        //Set cURL headers
        CURLOPT_HTTPHEADER => [
            "accept: application/json",
            "authorization: Bearer sk_test_71ab933b865dee9d4f92ab82094201ca358f11df",
            "cache-control: no-cache"
        ],

    )
        	
);
//execute the cURL
$response = curl_exec($curl);

//Control Error
$err = curl_error($curl);

if($err){
	die("Curl returned some errors" . $err);
}

//Convert to Object
$identity = json_decode($response);
echo "<pre>" .$response . "<pre>";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Beneficiary</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Your Identity Has Been Verified</h1>
    <hr>
    <div class="container">
        <h3>Response: <i>Account Resolved</i></h3>
        <h3>Account Name: <i>John Doe</i></h3>
        <h3>Account Number: <i>2345456789</i></h3>
    </div>
     
</body>
</html>