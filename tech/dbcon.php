<?php
// db.php
function dbcon(){
    $user = "root";
    $pass = "";
    $host = "localhost:3307"; // Adjust as necessary
    $db = "thesis";
    
    // Create connection
    $conn = mysqli_connect($host, $user, $pass, $db);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function host(){
    $h = "http://".$_SERVER['HTTP_HOST']."/thesis/";
    return $h;
}

function hRoot(){
    $url = $_SERVER['DOCUMENT_ROOT']."/thesis/";
    return $url;
}

// Parse string
function gstr(){
    $qstr = $_SERVER['QUERY_STRING'];
    parse_str($qstr, $dstr);
    return $dstr;
}
?>
