<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "test");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    $query = "SELECT * FROM patient WHERE email = '$email' OR mobile = '$mobile'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        echo 'exists'; // Return 'exists' if the mobile or email already exists
    } else {
        echo 'unique'; // Return 'unique' if the mobile and email are unique
    }
}
?>
