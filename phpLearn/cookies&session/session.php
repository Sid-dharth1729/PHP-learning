<?php
    // start session
    session_start();
    $uploadimg ='';
    $upload_dir = "images/";
    $src ='';
    if(isset($_POST['save'])){
        $con = mysqli_connect("localhost", "root", "", "session");
        
        if(isset($_FILES['userImg'])){

            // $_SESSION['img'] = $_FILES['image'];
            // print_r($_SESSION);
            // echo $_SESSION['img'];
            $pass =$_POST['pass'];
            $email=$_POST['email'];
            // if($_FILES['img']['name']) 
            $file_name = basename($_FILES['userImg']['name']);
            if(!empty($file_name)){
                // echo  $file_name;
                $sql = "INSERT INTO profile(email, pass, img) 
                VALUES ('$email','$pass','$file_name')";
                if(mysqli_query($con, $sql)){
                    echo "okkk";
                }else{
                    echo "error";
                }
            }
            $src = $upload_dir . $file_name;
            move_uploaded_file($_FILES['userImg']['tmp_name'], $src);

            $img_sql = "SELECT img FROM profile WHERE email = 'mail@mail.in'";
            $img_result = mysqli_query($con, $img_sql);
            $user = mysqli_fetch_assoc($img_result);
            print_r($user);
            // {
                
            // }
            // }else{
            //     echo "Errrorr";}
            }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies&Sessions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <?php

        ?>
        <h1>Image Form</h1>
        <div class="container w-50">

            <form action="session.php" method="post" enctype="multipart/form-data" >
                
                <div class="py-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="py-2">
                <label for="pass" class="form-label">Password</label>
                <input type="pass" name="pass" class="form-control" id="pass">
            </div>
            <div class="py-2">
                <label for="userImg" class="form-label">Upload image:</label>
                <input type="file" name="userImg" class="form-control" id="userImg" accept="image/*">
            </div>
            <input class="form-control btn btn-primary" type="submit" name="save" value="Save">
        </form>
    </div>
        <img src="<?php echo $src;?>" alt="">
        <img src="<?php 
            echo $upload_dir = "images/" . $user['img'];
        ?>" alt="">
    </body>
    </html>
    