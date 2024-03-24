<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root1234";
$dbname = "library";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
$count = 0; // Initialize $count

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Ensure that all expected POST variables are set
    if (isset($_POST['name'], $_POST['duration'], $_POST['calendarDate'], $_POST['timeslot'])) {
        // Assign form data to variables
        $name = $conn->real_escape_string($_POST['name']);
        $duration = intval($_POST['duration']);
        $calendarDate = $conn->real_escape_string($_POST['calendarDate']); // Fixed
        $timeslot = $conn->real_escape_string($_POST['timeslot']); // Fixed

        // Combine the calendar date and timeslot to create the datetime string
        $reserved_time_start = date('Y-m-d H:i:s', strtotime($calendarDate . ' ' . $timeslot));

        // Check if the date-time conversion was successful
        if (!$reserved_time_start) {
            $message = "Invalid date or time.";
        } else {
            $room_no = rand(1234, 1237); // Randomly assigns a room number

            // Check for existing reservation
            $checkQuery = "SELECT COUNT(*) FROM ROOM_RESERVED WHERE room_no = ? AND reserved_time_start = ?";
            if ($stmt = $conn->prepare($checkQuery)) {
                $stmt->bind_param("ss", $room_no, $reserved_time_start);
                $stmt->execute();
                $stmt->bind_result($count); // Fixed: Initialize $count before this line
                $stmt->fetch();
                $stmt->close();

                if ($count == 0) {
				// Generate a unique reservation_id using uniqid()
				$reservation_id = uniqid();

				// Proceed to insert the new reservation
				$insertQuery = "INSERT INTO ROOM_RESERVED (reservation_id, room_no, reserved_by_id, reserved_time_start, duration) VALUES (?, ?, ?, ?, ?)";
				if ($stmt = $conn->prepare($insertQuery)) {
					// Note: Ensure the $reserved_by_id variable is defined earlier in your code or use a placeholder value here
					$reserved_by_id = "0123456789"; // Example placeholder, replace with actual user ID
					$stmt->bind_param("ssssi", $reservation_id, $room_no, $reserved_by_id, $reserved_time_start, $duration);
					if ($stmt->execute()) {
						$message = "Reservation made successfully!";
					} else {
						$message = "Error executing reservation: " . $stmt->error;
					}
					$stmt->close();
				} else {
					$message = "Error preparing reservation: " . $conn->error;
				}
			} else {
				$message = "The room is already reserved for the selected time.";
			}
            } else {
                $message = "Error preparing to check reservation: " . $conn->error;
            }
        }
    } else {
        $message = "All form fields must be filled out.";
    }
} else {
    $message = "Please fill in the reservation form.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Room Reservation</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .calendar, .timeslot { margin-top: 20px; }
        .reservation-form { margin-top: 20px; }
        label { display: block; margin-top: 10px; }
        input, select, button { width: 100%; padding: 10px; margin-top: 5px; }
        .container2 {
            display: flex;
            flex-direction: column;
            background-color: #912a30;
            width: 100%;
            align-items: center;
            left: 0;
            right: 0;
            top: 0;
            }

            .navButton {
            border:none;
            color: white;
            background-color: transparent;
            padding: 10px;
            display: inline-block;
            font-size: 25px;
            border-left: .3px solid black;
            border-right: .3px solid black;
            }

            #buttons {
            display: flex;
            flex-direction: row;
            background-color: #7d2328;
            justify-content: center;
            width:100%;
            }

            h1 {
            font-family:"Andale Mono";
            color: white;
            letter-spacing: 2px;
            margin-bottom:30px;
            }
    </style>
</head>

<body>
<div class="container2">
            <div id="title">
                <h1>Cougar Library</h1>
            </div>

            <div id="buttons">
                <button class = "navButton" onclick="document.location='\\item-search\\item-search.php'">Item Search</button>
                <button class = "navButton" onclick="document.location='\\room-search\\room-search.php'">Room Search</button>
                <button class = "navButton" onclick="document.location='\\holds\\holds.php'">Holds</button>
                <button class = "navButton" onclick="document.location='\\checked-items\\checked-items.php'">Checkedout Items</button>
                <button class = "navButton" onclick="document.location='\\account\\account.php'">Account</button>
        </div>
</div>

    <div class="container">
        <h1>Study Room Reservation</h1>
        <?php if (!empty($message)): ?>
            <p><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <div class="calendar">
            <h2>Calendar View</h2>
            <p>Select a date from the input below to see available timeslots.</p>
            <form method="POST">
                <input type="date" id="calendarDate" name="calendarDate" required>
				<div class="timeslot">
					<h2>Available Timeslots</h2>
					<select id="timeslot" name="timeslot">
						<option value="09:00:00">09:00 AM</option>
						<option value="11:00:00">11:00 AM</option>
						<option value="13:00:00">01:00 PM</option>
						<option value="15:00:00">03:00 PM</option>
					</select>
				</div>
                <div class="reservation-form">
                    <h2>Reserve a Study Room</h2>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>                
                    <label for="duration">Duration (hours):</label>
                    <select id="duration" name="duration">
                        <option value="1">1 Hour</option>
                        <option value="2">2 Hours</option>
                        <option value="3">3 Hours</option>
                    </select>
                    <button type="submit" name="submit">Reserve</button>
                </form>
            </div>
        </div>

    <script>
        document.getElementById('calendarDate').addEventListener('change', function(e) {
            const timeslotSelect = document.getElementById('timeslot');
            timeslotSelect.innerHTML = ''; // Clear previous options
            const dateSelected = e.target.value;
            const timeslots = ['09:00:00', '11:00:00', '13:00:00', '15:00:00']; // Use 24-hour format for value
            
            // Populate timeslot dropdown based on the date selected
            timeslots.forEach(function(timeslot) {
                const timeString = dateSelected + ' ' + timeslot;
                const option = document.createElement('option');
                option.value = timeString; // The value will be the combined date and timeslot
                option.textContent = formatTime(timeslot); // Format for display
                timeslotSelect.appendChild(option);
            });
        });

        function formatTime(timeslot) {
            // Converts 24-hour time to 12-hour time for display
            const timeParts = timeslot.split(':');
            let hours = parseInt(timeParts[0]);
            const minutes = timeParts[1];
            const ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            return hours + ':' + minutes + ' ' + ampm;
        }

    </script>
</body>
</html>

   
