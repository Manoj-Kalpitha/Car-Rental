<?php
include_once "./db.php";
session_start();

if (isset($_GET["search"])) {
    $search = $conn->real_escape_string($_GET["search"]);
    $sql = "SELECT * FROM cars WHERE make LIKE '%$search%' OR model LIKE '%$search%' OR year LIKE '%$search%' OR registration_no LIKE '%$search%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_all(MYSQLI_ASSOC));
    } else {
        echo json_encode([]);
    }
}
