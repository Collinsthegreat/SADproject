<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paystack Identity Verifier</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Verify Identity</h1>
    <hr>
    <div class="container">
        <form action="verify_identity.php" method="POST">
            <label for="">Account Number</label>
            <input type="text" name="account_number" placeholder="Account Number" id="">
            <label for="">Bank code</label>
            <input type="text" name="bank_code" placeholder="Bank code" id="">
            <input type="submit" name="identify" value="Verify account">
        </form>
    </div>    
</body>
</html>