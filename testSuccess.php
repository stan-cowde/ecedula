<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful</title>
</head>
<body>
    <h2>Payment Successful</h2>
    <p>Thank you for your payment. Your transaction has been completed successfully.</p>
    <h3>Receipt</h3>
    <div>
        <p>Transaction ID: <?php echo htmlspecialchars($_GET['transactionID']); ?></p>
        <p>Transaction Name: Joanna Olarte</p>
        <p>Transaction Amount: <?php echo htmlspecialchars($_GET['amount']) / 100; ?></p>
    </div>
</body>
</html>
