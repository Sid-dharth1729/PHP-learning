<!-- using mysqli (procedual method (function oriented)) -->
 
<?php
    $insert = false;
    if(isset($_POST['name'])){  //if name is provided only then below code executed

        $server = "localhost";
        $username = "root"; //for local host
        $password = ""; //blank bcz local host

        //connection
        $con = mysqli_connect($server, $username, $password);

        //checking database is connection
        if(!$con) {
            die("connetion to this database failed due to" . mysqli_connect_error());
        }
        // echo "Success connecting to the database";

        //collect post variable
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $dis = $_POST['dis'];

        $sql = "INSERT INTO `trip_strudent`.`register_student` ( `name`, `age`, `gender`, `email`, `mobile`, `discription`, `dt`) 
        VALUES ('$name', '$age', '$gender', '$email', '$mobile', '$dis', current_timestamp())";
        // echo $sql;

        // '->' object operator
        if($con->query( $sql) == true){
            // echo "Successfully Inserted";
            $insert = true; 

        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close(); //when query finishes connection will close 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-div">
    
        <div class="container">
            <h2>Welcome to the Upcoming Trip Form</h2>
            <p>Students fill the detail to complete yor registration for Trip</p>
            
            <?php
                if($insert == true){
                    echo "<p class = 'insert-msg'>You are successfully registered</p>";
                }
            ?>
            <form action="index.php" method="post">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Enter your name">
    
                <label for="age">Age:</label>
                <input type="text" name="age" id="age" placeholder="Your age">
    
                <label for="gender">Gender:</label>
                <input type="text" name="gender" id="gender" placeholder="Your gender">
    
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Email address">
    
                <label for="mobile">Mobile no.:</label>
                <input type="tel" name="mobile" id="mobile" placeholder="Mobile number">
    
                <label for="dis">Discription</label>
                <textarea name="dis" id="dis" placeholder="Discription"></textarea>
    
                <button class="btn">Submit</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>