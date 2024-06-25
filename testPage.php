<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay with GCash</title>
</head>
<body>
    <h2>Pay with GCash</h2>
    <form action="paymongoCheckoutPage.php" method="POST">
        <label for="amount">Amount to Pay (PHP):</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Pay Now</button>
    </form>
</body>
</html>
