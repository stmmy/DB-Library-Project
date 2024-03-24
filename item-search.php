<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        position: relative;
        min-height: 100vh; 
        z-index: 0; 
        overflow-x: hidden;
        background-color: #1a1a1a;
    }

body::after {
    content: "";
    background-size: cover;
    opacity: 0.4; 
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    position: absolute;
    z-index: -1; 
}

    .search-wrapper {
    position: relative;
    max-width: 400px;
    margin: auto;
    padding-top: calc(100vh / 6 - 20px);
    
    }

    .input-icon-container {
    display: flex;
    align-items: center; 
    width: 100%;
    background-color: rgba(255, 255, 255, 0.4);
    border: 1px solid #ccc;
    border-radius: 12px;
    }

    .input-icon-container ::placeholder {
    color: black; 
    opacity: 1; 
    }

    .search-input { 
    display: flex;
    flex-grow: 1;
    padding: 10px;
    border: none; 
    border-radius: 12px;
    outline: none;
    background-color: rgba(255, 255, 255, 0.0);
    }
    

    .search-icon {
    padding: 10px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center; 
    }

    .results {
        display: grid;
        grid-template-columns: repeat(4,1fr); /* Adjust column width as needed */
        gap: 20px; 
        padding: 20px;
    }

    .result-row {
    display: flex;
    background-color: #f9f9f9;
    margin-bottom: 10px; 
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px; 
    box-shadow: 0 2px 4px rgba(0,0,0,0.1); 
    background-color: rgba(255, 255, 255, 0.5);
    }
    
    .dropdowns-container{
        display: flex;
        justify-content: center;
        max-width: 400px; 
        margin: 15px auto; 
        gap: 20px;
        
    }

    .result-row img{
        max-width: 200px; 
        max-height: 200px;
        margin-right: 20px; 
    }
    .text-content {
    
    flex-grow: 1;
    }
    .rowbuttons{
        display: flex;
        justify-content: flex-start; /* Adjust button alignment as needed */
        width: 100%; /* Take full width */
    margin-top: 10px; /* Space between text and buttons */
    }

    .container {
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
<script >
        function removeAll(s2){
            for (var i = s2.options.length - 1; i >= 0; i--){
                s2.remove(i);
            }
        }
        function insertOptions(s1, s2){
            var s1 = document.getElementById(s1);
            var s2 = document.getElementById(s2);

            if(s1.options[s1.selectedIndex].value == "item_book"){
                var o1 = document.createElement('option');
                var o2 = document.createElement('option');
                var o3 = document.createElement('option');
                var o4 = document.createElement('option');
                var o5 = document.createElement('option');

                o1.value = "ID";
                o1.innerHTML = "ID";
                o2.value = "ISBN";
                o2.innerHTML = "ISBN";
                o3.value = "title";
                o3.innerHTML = "title";
                o4.value = "author";
                o4.innerHTML = "author";
                o5.value = "genre";
                o5.innerHTML = "genre";
                removeAll(s2);
                s2.options.add(o1)
                s2.options.add(o2)
                s2.options.add(o3)
                s2.options.add(o4)
                s2.options.add(o5)
            }


            if(s1.options[s1.selectedIndex].value == "item_laptop" || s1.options[s1.selectedIndex].value == "item_camera"){
                var o1 = document.createElement('option');
                var o2 = document.createElement('option');
                var o3 = document.createElement('option');

                o1.value = "ID";
                o1.innerHTML = "ID";
                o2.value = "brand";
                o2.innerHTML = "brand";
                o3.value = "model";
                o3.innerHTML = "model";
                removeAll(s2);
                s2.options.add(o1)
                s2.options.add(o2)
                s2.options.add(o3)
            }
            if(s1.options[s1.selectedIndex].value == "room"){
                var o1 = document.createElement('option');
                var o2 = document.createElement('option');
                var o3 = document.createElement('option');

                o1.value = "room_no";
                o1.innerHTML = "room number";
                o2.value = "capacity";
                o2.innerHTML = "capacity";
                removeAll(s2);
                s2.options.add(o1)
                s2.options.add(o2)
            }
            if(s1.options[s1.selectedIndex].value == ""){
                var o1 = document.createElement('option');

                o1.value = "Search by";
                o1.innerHTML = "Search by";
                removeAll(s2);
                s2.options.add(o1)
            }
            
        }


    </script>

<div class="container">
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

<form action="item-search.php" method="post">
    <div class="search-wrapper">
    <div class="input-icon-container">
        <input required type="text" name="search" placeholder="search" class="search-input">
        <div class="search-icon" onclick="document.forms[0].submit();">
           
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </div>
    </div>
    </div>
    <div class="dropdowns-container">
        <select required name="table" id="table" onchange="insertOptions('table', 'column')" > 
            <option value="">Select item type</option>
            <option value="item_book">Book</option>
            <option value="room">Room</option>
            <option value="item_laptop">Laptop</option>
            <option value="item_camera">Camera</option>
        </select><br>

        <select required name="column" id="column">
            <option value="">Search by</option>
        </select><br>
    </div>
 
</form>


<div class="results">
    <?php
    
    $server = 'localhost'; // The host you want to connect to.
    $username = 'root'; // Your database username.
    $password = 'root1234'; // Your database password.
    $database = 'library'; // Your database name.
        

// Establishes the connection

    $conn = mysqli_connect($server, $username, $password, $database);

// Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    echo "";
    if (isset($_POST['checkout'])) {
        $itemId = mysqli_real_escape_string($conn, $_POST['item_id']);
        $sqlUpdate = "UPDATE item SET isCheckedout = TRUE WHERE item_id = '$itemId'";
        
        if (mysqli_query($conn, $sqlUpdate)) {
            echo "Book is checked out.";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    function isCheckedOut($conn, $itemId) {
        $sql = "SELECT isCheckedout FROM item WHERE item_id = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $itemId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $isCheckedOut);
            if (mysqli_stmt_fetch($stmt)) {
                return $isCheckedOut;
            }
            mysqli_stmt_close($stmt);
        }
        return false; // Default to false if not found or error
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hold_bttn'])) {
        $itemId = mysqli_real_escape_string($conn, $_POST['item_id']);

        // Update position in holds_waitlist
        $query = "UPDATE holds_waitlist SET position = position + 1 WHERE item_id = ?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "s", $itemId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }
   

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['table']) && isset($_POST['column']) && isset($_POST['search']) && !empty($_POST['search']) && !empty($_POST['table']) && !empty($_POST['column'])) {
       
        $table = mysqli_real_escape_string($conn, $_POST['table']);
        $column = mysqli_real_escape_string($conn, $_POST['column']);
        $search = mysqli_real_escape_string($conn, $_POST['search']);
       
        // Construct the SQL query
        $sql = "SELECT * FROM `$table` WHERE `$column` LIKE '%$search%'";
    
        // Execute the query
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='grid-wrapper'>";
                    //div class used to seperate the background box from the text in to its proper layer in order allow for seperate styling
                    echo "<div class='result-row'>" ;
        
                
                    if (!empty($row['image'])) {
                        echo '<img src="' . htmlspecialchars($row['image']) . '">';
                    }
                    $itemIsCheckedOut = isCheckedOut($conn, $row['ID']);
                    
                    //div class to seperate the text from the result box in order to allow for seperate styling
                    echo "<div class='text-content'>";
                
                
                    foreach ($row as $column => $value) {
                        if($column != 'image' && $column != 'ID'){
                        echo "<strong>" . ucfirst($column) . ":</strong> " . htmlspecialchars($value) . "<br>";
                        }
                    }
                echo "<div class='rowbuttons'>";
                    echo "<form id = 'checkoutForm' action='item-search.php' method='post'>";
                    if ($itemIsCheckedOut) {
                        // Display hold button
                        echo "<input type = 'hidden' name = 'item_id' value='". htmlspecialchars($row['ID']) ."'>";
                        echo "<button type='submit' name = 'hold_bttn'>Hold</button>";
                    } else {
                        echo "<input type = 'hidden' name = 'item_id' value='". htmlspecialchars($row['ID']) ."'>";
                        echo "<input type = 'hidden' name = 'checkout' value='true'>";
                        echo "<button type = 'submit' name = 'chk-bttn'>check-out</button>";
                        }
                echo "</form>";
                echo "</div>"; 
                echo "</div>"; 
                echo "</div>"; 
                echo "</div>"; 
                
            }
        } else {
            echo "0 records found";
        }
        
    }
    
    $conn->close();
    
        ?>
    
</div>
</body>
</html>