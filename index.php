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
                        <h1> Student Crud Application </h1>
                    </div>
                    <div class="card-body">
                   
                    <button class="btn btn-success"> <a href="add.php" class="text-light"> Add New </a> </button>
                        
                        <br/>
                        <br/>

                    <table class="table">
                        <thead>
                            <tr>
                           
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $connection = mysqli_connect("localhost","root","");
                            $db = mysqli_select_db($connection,"test");

                            $sql = "select * from patient";
                            $run = mysqli_query($connection, $sql);
                            $id= 1;

                            while($row = mysqli_fetch_array($run))
                            {
                                $name = $row['name'];
                                $email = $row['email'];
                                $mobile = $row['mobile'];
                            ?>

                               <tr>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $email ?></td>
                                    <td><?php echo $mobile ?></td>
                                    <td>
                                        <button class="btn btn-success"> <a href='edit.php?edit=<?php echo $name ?>' class="text-light"> Edit </a> </button> &nbsp;
                                        <button class="btn btn-danger"><a href='delete.php?del=<?php echo $name ?>' class="text-light"> Delete </a> </button>
                                    </td>
                               </tr>
                            <?php $id++; } ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>

    


</body>
</html>
