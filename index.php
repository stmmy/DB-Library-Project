<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="wrapper">
        <form action="" method="GET">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" name="username" id="username">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="pw">
            </div>
            <input type="submit" value="Submit" name="submit" class="btn">
        </form>
        
        <?php
            $conn = mysqli_connect("localhost", "root", "root1234", "library");

            if (isset($_GET['submit']) && !empty($_GET['username'])) {
                $uname = $_GET['username'];
                $query = "SELECT * FROM accounts WHERE account_uname LIKE '%$uname%'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result)==1) {
                    session_start();
                    $r = mysqli_fetch_assoc($result);
                    $_SESSION["ID"] = $r["account_id"];
                    header('location: holds/holds.php');
                }
                unset($_GET['submit']);
            }
        ?>
    </div>

</body>
</html>