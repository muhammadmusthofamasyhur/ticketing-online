<?php
include 'koneksi.php';

$eventId = $_GET['id'];
$query = "SELECT * FROM event WHERE id = $eventId";
$result = mysqli_query($conn, $query);
$event = mysqli_fetch_assoc($result);

if (!$event) {
    echo '<h1 style="text-align: center; margin-top: 50px;">Event not found</h1>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        h1 {
            margin-top: 20px;
        }

        p {
            font-size: 1.1rem;
            color: #555;
            margin: 10px 0;
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .back-link:hover {
            background-color: #0056b3;
        }

        .tab-container {
            margin-top: 30px;
        }

        .tab-buttons {
            display: flex;
            border-bottom: 2px solid #ddd;
        }

        .tab-buttons button {
            background: none;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            outline: none;
        }

        .tab-buttons button.active {
            border-bottom: 2px solid #007BFF;
            color: #007BFF;
        }

        .tab-content {
            display: none;
            padding: 20px 0;
        }

        .tab-content.active {
            display: block;
        }

        .ticket-option {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .ticket-option p {
            margin: 5px 0;
            font-size: 1rem;
        }

        .ticket-option input {
            width: 60px;
            padding: 5px;
            margin-right: 10px;
            text-align: center;
        }

        .buy-tickets-btn {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
        }

        .buy-tickets-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>Event Details</h1>
    </header>

    <div class="container">
        <img id="event-image" src="cover/<?php echo $event['cover']; ?>" alt="Event Image">
        <h1 id="event-title"><?php echo $event['name']; ?></h1>
        <p id="event-date">Date: <?php echo $event['date']; ?></p>
        <p class="price" id="event-price">Price: $<?php echo $event['price']; ?></p>
        <p id="event-organizer">Organizer: <?php echo $event['organizer']; ?></p>

        <div class="tab-container">
            <div class="tab-buttons">
                <button class="tab-button active" onclick="showTab('description')">Deskripsi</button>
                <button class="tab-button" onclick="showTab('tickets')">Tiket</button>
            </div>

            <div id="description" class="tab-content active">
                <h2>Event Description</h2>
                <p id="event-full-description"><?php echo $event['description']; ?></p>
            </div>

            <div id="tickets" class="tab-content">
                <h2>Available Tickets</h2>
                <div id="ticket-options">
                    <!-- Tickets will be dynamically populated -->
                </div>
                <a href="#" class="buy-tickets-btn" onclick="proceedToCheckout()">Beli Tiket</a>
            </div>
        </div>

        <a href="index.php" class="back-link">Back to Events</a>
    </div>

    <script>
        function showTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.tab-button').forEach(button => button.classList.remove('active'));
            document.getElementById(tabName).classList.add('active');
        }

        function proceedToCheckout() {
            const selectedTickets = [];
            const quantities = document.querySelectorAll('[id^="ticket-quantity-"]');
            quantities.forEach((input, index) => {
                const quantity = parseInt(input.value);
                if (!isNaN(quantity) && quantity > 0) {
                    selectedTickets.push({
                        ticketName: event.tickets[index].name,
                        quantity: quantity,
                        price: event.tickets[index].price
                    });
                }
            });

            if (selectedTickets.length > 0) {
                // Store selected tickets in local storage or pass them to the next page
                localStorage.setItem('selectedTickets', JSON.stringify(selectedTickets));

                // Redirect to the checkout page
                window.location.href = `checkout.php?id=<?php echo $eventId; ?>`;
            } else {
                alert('Please select at least one ticket and enter the quantity.');
            }
        }
    </script>
</body>
</html>