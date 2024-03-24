<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="account.css">
</head>
<body>

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

    <div id = "accountContainer">
        <div>
            <h2>Account Summary</h2>                    
        </div>

        <div class="innerContainer">
            <div id="info">
                <h3>Info:<h3>
                <label>Name</label></br>
                <label>ID</label>
            </div>
            <div id="fees">
                <h3>Fees:<h3>
                <label>Fee 1</label></br>
                <label>Fee 2</label>
            </div>
        </div>

        <div class="innerContainer" >
            <div id="Checkedout-Items">
                <h3>Checkedout Items:<h3>
                <label>Item 1</label></br>
                <label>Item 2</label>
            </div>
            <div id="Reserved-Rooms">
                <h3>Fees:<h3>
                <label>Reserved Room 1</label></br>
                <label>Reserved Room 2</label>
            </div>
        </div>
    </div>
</body>
</html>