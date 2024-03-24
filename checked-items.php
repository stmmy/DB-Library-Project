<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="checkoutpage.css">

<title>Checked out items</title>

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
  <h1>Checked out items</h1>
  <!-- Need to modify to placeholders for php data. Should be  -->
  <div class="box">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Due Date</th>
        </tr>
      </thead>
      <tbody>
        <!-- Placeholder items (should be replaced with data from PHP) -->
        <tr>
          <td>1</td>
          <td>Book</td>
          <td>2024-04-15</td>
        </tr>
        <tr>
          <td>2</td>
          <td>DVD</td>
          <td>2024-04-18</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Laptop</td>
          <td>2024-04-22</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Headphones</td>
          <td>2024-04-25</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Phone</td>
          <td>2024-04-28</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Umbrealla</td>
          <td>2024-05-12</td>
        </tr>




      </tbody>
    </table>
    <!-- <div class="sortButtons"> 
      <button onclick="sortBy('ID')">Sort by ID</button>
      <button onclick="sortBy('Name')">Sort by Name</button>
      <button onclick="sortBy('DueDate')">Sort by Due Date</button>
      <button onclick="toggleSortOrder()">Toggle Sort Order</button>
    </div> -->

  <label for="sortButton">Sort:</label>

  <select name="sortButtonTitle" id="sortButtonTitle">
    <option value="ID">ID</option>
    <option value="Name">Name</option>
    <option value="DueDate">Due Date</option>

  </select>

  <label for="sortButtonOrder">By:</label>

  <select name="sortButtonOrder" id="sortButtonOrder">
    <option value="Ascending">Ascending</option>
    <option value="Descending">Descending</option>

  </select>
  <button onclick="sortByButton()">Sort</button>

  </div>
  <div class="account-number-label">Account Number</div>
  <div class="account-number-value">123456789</div>
</div>


<!-- Sorting buttons  -->


<!-- Link to the javascript file -->
<script src ="/Project/frontend/checkoutpage.js"></script>  
</body>
</html>