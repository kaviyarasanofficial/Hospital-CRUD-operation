<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "test");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        $sql = "insert into patient(name, email, mobile) values('$name', '$email', '$mobile')";

        if (mysqli_query($connection, $sql)) {
            echo '<script> location.replace("index.php")</script>';
        } else {
            echo "Something went wrong: " . $connection->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Crud Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1>Student Crud Application</h1>
                </div>
                <div class="card-body">
                <form id="patientForm" action="add.php" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            <div class="error"></div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            <div class="error"></div>
                        </div>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile">
                            <div class="error"></div>
                        </div>

                        <br/>
                        <input type="submit" class="btn btn-primary" name="submit" value="Register">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Validation for alphabets only
        $('input[name="name"]').on('input', function() {
            var inputValue = $(this).val();
            var alphaRegex = /^[a-zA-Z\s]*$/;
            if (!alphaRegex.test(inputValue)) {
                $(this).next('.error').text('Only alphabets are allowed');
            } else {
                $(this).next('.error').text('');
            }
        });

        // Validation for email format
        $('input[name="email"]').on('input', function() {
            var inputValue = $(this).val();
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(inputValue)) {
                $(this).next('.error').text('Invalid email format');
            } else {
                $(this).next('.error').text('');
            }
        });

        // Validation for numbers only
        $('input[name="mobile"]').on('input', function() {
            var inputValue = $(this).val();
            var numberRegex = /^\d+$/;
            if (!numberRegex.test(inputValue)) {
                $(this).next('.error').text('Only numbers are allowed');
            } else {
                $(this).next('.error').text('');
            }
        });
    });
</script>

</body>
</html>
