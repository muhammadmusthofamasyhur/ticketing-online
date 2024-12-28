<?php
include 'koneksi.php';

$query = "SELECT * FROM event";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Event Booking</h1>
        <div>
    </header>

    <div class="search-bar">
        <input type="text" placeholder="Search for events...">
    </div>

    <div class="events">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="event-card">
            <img src="cover/<?php echo $row['cover']; ?>" alt="Event Poster">
            <div class="details">
                <h3><?php echo $row['name']; ?></h3>
                <p>Date: <?php echo $row['date']; ?></p>
                <p>Price: <span class="price">Rp<?php echo $row['price']; ?></span></p>
                <p>Organizer: <?php echo $row['organizer']; ?></p>
                <a href="event-details.php?id=<?php echo $row['id']; ?>">View Details</a>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
