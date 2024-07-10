<?php

session_start();
if (!$_SESSION['account'] == "user") {
    header('location:login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Payment Form</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .btn-amount {
            background-color: #4CAF50;
            color: red;
            height: 50px;
            width: auto;



        }
    </style>
</head>

<body>
    <div class="container">
        <h2> Card Payment Here&nbsp;!!!</h2>
        <center><strong><button
                    class="btn-amount"><?Php echo "Total-PayMent&nbsp; Rs:&nbsp;&nbsp;" . $_SESSION['totalamount'] . "/=" ?></button></strong>
        </center><br>
        <form action="process_payment.php" method="post" onsubmit="return validateForm()">
            <label for="card_holder">Card Holder's Name</label>
            <input type="text" id="card_holder" name="card_holder" required>

            <label for="card_number">Card Number</label>
            <input type="text" id="card_number" name="card_number" required>

            <label for="expiry_date">Expiry Date</label>
            <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" required>

            <button type="submit" name="submit">Pay Now</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var cardHolder = document.getElementById('card_holder').value;
            var cardNumber = document.getElementById('card_number').value;
            var expiryDate = document.getElementById('expiry_date').value;
            var cvv = document.getElementById('cvv').value;

            // ATM card validation (assuming ATM cards start with 6 and have 16 digits)
            var atmRegex = /^6\d{15}$/; // Regular expression for ATM card validation

            // CVV validation (assuming CVV has 3 digits)
            var cvvRegex = /^\d{3}$/; // Regular expression for CVV validation

            // Sample validation (check if all fields are filled)
            if (cardHolder.trim() === '' || cardNumber.trim() === '' || expiryDate.trim() === '' || cvv.trim() === '') {
                alert('Please fill in all fields.');
                return false; // Prevent form submission
            }

            // Check ATM card number format
            if (!atmRegex.test(cardNumber)) {
                alert('Please enter a valid ATM card number starting with 6 and having 16 digits in total.');
                return false; // Prevent form submission
            }

            // Check CVV format
            if (!cvvRegex.test(cvv)) {
                alert('Please enter a valid CVV containing 3 digits.');
                return false; // Prevent form submission
            }

            // You can add more validation logic here, such as checking the expiry date

            return true; // Allow form submission
        }
    </script>
</body>

</html>