<?php
    include('admin/lib/dbcon.php');
    $conn = dbcon(); 
    session_start();	
    $username = $_POST['username'];
    $password = $_POST['password'];

    /*................................................ admin .....................................................*/
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_array($result);
    $num_row = mysqli_num_rows($result);

    /*...................................................Technical Staff ..............................................*/
    $query_client = mysqli_query($conn, "SELECT * FROM client WHERE username='$username' AND password='$password'");

    if (!$query_client) {
        die("Query failed: " . mysqli_error($conn));
    }

    $num_row_client = mysqli_num_rows($query_client);
    $row_client = mysqli_fetch_array($query_client);

    if ($num_row > 0) { 
        $_SESSION['id'] = $row['admin_id'];
        echo 'true_admin';

        $insert_query = "INSERT INTO user_log (username, login_date, admin_id) VALUES ('$username', NOW(), " . $row['admin_id'] . ")";
        if (!mysqli_query($conn, $insert_query)) {
            die("Insert query failed: " . mysqli_error($conn));
        }
    } else if ($num_row_client > 0) {
        $_SESSION['client'] = $row_client['client_id'];
        echo 'true';

        $insert_query_client = "INSERT INTO user_log (username, login_date, client_id) VALUES ('$username', NOW(), " . $row_client['client_id'] . ")";
        if (!mysqli_query($conn, $insert_query_client)) {
            die("Insert query failed: " . mysqli_error($conn));
        }
    } else { 
        echo 'false';
    }

    // Close the connection
    mysqli_close($conn);
?>
