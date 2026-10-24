<?php
    //DataBase or MySQL connnection (i have crested a user acc on ninsa_db)

                    // mysqli_connect( host , username, password, dbName)
    $conn = mysqli_connect('localhost', 'sid', 'sid1729', 'ninjs_db');

    //checking connection
    if(!$conn){
        echo "Error to connect db : ". mysqli_connect_error();
    }
?>