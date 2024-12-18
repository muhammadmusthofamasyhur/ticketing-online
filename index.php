<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <!-- Link ke file CSS eksternal -->
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
        <!-- Event Card 1 -->
        <div class="event-card">
            <img src="event1.jpg" alt="Event Poster">
            <div class="details">
                <h3>Music Fiesta 2024</h3>
                <p>Date: January 20, 2024</p>
                <p>Price: <span class="price">$50</span></p>
                <p>Organizer: XYZ Productions</p>
                <a href="event-details.html?id=1">View Details</a>
            </div>
        </div>

        <!-- Event Card 2 -->
        <div class="event-card">
            <img src="event2.jpg" alt="Event Poster">
            <div class="details">
                <h3>Art & Soul Festival</h3>
                <p>Date: February 15, 2024</p>
                <p>Price: <span class="price">$40</span></p>
                <p>Organizer: ABC Events</p>
                <a href="event-details.html?id=2">View Details</a>
            </div>
        </div>

        <!-- Event Card 3 -->
        <div class="event-card">
            <img src="event3.jpg" alt="Event Poster">
            <div class="details">
                <h3>Rock & Roll Night</h3>
                <p>Date: March 10, 2024</p>
                <p>Price: <span class="price">$60</span></p>
                <p>Organizer: Rockers Inc.</p>
                <a href="event-details.html?id=3">View Details</a>
            </div>
        </div>
    </div>
</body>
</html>
