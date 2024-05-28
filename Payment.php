<?php
    // $servername = "localhost"; // or your database server
    // $username = "root"; // replace with your database username
    // $password = ""; // replace with your database password
    // $dbname = "oahmsdb";

    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    // }
    // catch(PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facility Services Payment Form</title>
</head>

<body>
    <p style="font-size:30px;color: green"><strong>Our minimum payment for facility services is in six months and after six months the patient should be paid for the remaining months. You are welcome to our Foundation.</strong></p>
    <p style="font-size:30px;color: green">one month = 1,300,000/= but it can be paid for two terms within six months</p>
    <input type="hidden" id="price" value="1300000">
    <h2>Facility Services Payment Form</h2>
    <form method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="service">Facility Service:</label>
        <select id="month" name="month" required>
            <option value="1">One month</option>
            <option value="2">Two months</option>
            <!-- ... (other options) ... -->
            <option value="12">Twelve months</option>
        </select><br><br>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" readonly><br><br>

        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required><br><br>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YY" required><br><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>

        <button type="submit" onclick="payment(event)">Submit Payment</button>
    </form>
    <script>
        // function payment(event){
        //     event.preventDefault();
        //     var price = document.getElementById('price').value;
        //     var service = parseInt(document.getElementById('month').value);
        //     var amount = price * service;
        //     document.getElementById('amount').value = amount;
        //     console.log(amount);
        // }

        document.addEventListener('DOMContentLoaded', function() {
        // Get the price and amount elements
        var priceInput = document.getElementById('price');
        var amountInput = document.getElementById('amount');
        var serviceSelect = document.getElementById('month');

        // Add event listener to the service select element
        serviceSelect.addEventListener('change', function() {
            // Calculate the amount based on the selected service months and the price
            var price = parseInt(priceInput.value);
            var service = parseInt(serviceSelect.value);
            var amount = price * service;

            // Update the amount input field with the calculated amount
            amountInput.value = amount;
        });
    });
    </script>
</body>
</html>



<?php
    $servername = "localhost"; // or your database server
    $username = "root"; // replace with your database username
    $password = ""; // replace with your database password
    $dbname = "oahmsdb";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect and sanitize input data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $service = htmlspecialchars($_POST['service']);
        $amount = htmlspecialchars($_POST['amount']);
        $card_number = htmlspecialchars($_POST['card_number']);
        $expiry_date = htmlspecialchars($_POST['expiry_date']);
        $cvv = htmlspecialchars($_POST['cvv']);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO payment (name, email, phone, service, amount, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $name, $email, $phone, $service, $amount, $card_number, $expiry_date, $cvv);

        // Execute the statement
        if ($stmt->execute()) {
            echo "payment paid successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
?>