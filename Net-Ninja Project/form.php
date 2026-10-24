<?php
    include('config/db_connect.php');

    //for dispalying errors in UI
        $errors = array('email' =>'', 'title' =>'', 'ingredients' =>'');
        $email = $title = $ingredients = ''; //for display input value (when page reload)
    // Get & Post Method
    //GET :- it sends data in Url 
    // if(isset($_GET['submit'])) {
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }

    //POST sends data in request header(hidden) {it is secured bcz data hidden}
    if(isset($_POST['submit'])) {
        
        
        //checks email
        if(empty($_POST['email'])){
            $errors['email'] = "Email is required";    //errors text for email
            }
            else{
                $email = $_POST['email'];
                //this will work but i have used input type="email", automatically address error
                //for checking email manually (i have changed to input:text)
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $errors['email'] = "Email must be valid email address";
                }
                //for print email
                // else{
                //     echo $email;
                // }
            }
        //checks Ttile (title in character or not)
        if(empty($_POST['title'])){
            $errors['title'] =  "Title is required";
            }
            else{
                $title = $_POST['title'];
                //checking all are characters or not
                if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = " Title must be valid Title ";
                }
                // else{
                //     echo $title;
                // }
        }
        // echo $_POST['ingredients'];
        if(empty($_POST['ingredients'])){
            $errors['ingredients'] = "Ingredients is required";
            }
            else{
                $ingredients = $_POST['ingredients'];
                if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]+)*$/', $ingredients)){
                $errors['ingredients'] = " Ingredients must be valid and seperated with comma ";
                }
                // else{
                //     echo $ingredients;
                // }
        }
        //errors and redirecting
        if(array_filter($errors)){  //check errors 
            // echo "Error in form";
        }
        else{
            // echo "No Errors";

            //using function to remove all the sql keywords if exists in variable {mysqli_real_escape_string()}
            $email = mysqli_real_escape_string($conn , $email);
            $title = mysqli_real_escape_string($conn, $title);
            $ingredients = mysqli_real_escape_string($conn,$ingredients);

            //SQL query to Insert value
            $sql_in = "INSERT INTO ninja_pizzas(email, title, ingredients) VALUES ('$email', '$title', '$ingredients')";

            if(mysqli_query($conn, $sql_in)){
                //true = success
                //REDIRECTING TO HOME PAGE or index.php
                header('Location:index.php');
            }
            else{
                //error
                echo "Query Error :" . mysqli_errors($conn);
            }

        }

    }
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php'); ?>
    
    <div class="container-fluid my-4">
        <form action="form.php" method="POST" class="w-50 mx-auto border p-5 pizza-form">
    
            <h1 class="h1 text-secondary text-center">Add a Pizza</h1>
            <label for="email" class="form-label mt-3">Email:</label>
            <input type="text" name="email" class="form-control" value= "<?php echo $email; //display etered input ?>">
            <div class="text-danger fw-bold">
                <?php echo $errors['email']; //displaying email errors
                ?> 
            </div>

            <label for="title" class="form-label mt-3">Pizza Title:</label>
            <input type="text" name="title" id="title" class="form-control" value= "<?php echo $title;?>">
            <div class="text-danger fw-bold">
                <?php echo $errors['title']; //displaying title errors
                ?> 
            </div>
            
            <label for="ingredients" class="form-label mt-3">Ingredeints (with comma seperated)</label>
            <input type="text" name="ingredients" class="form-control" value= "<?php echo $ingredients; ?>">
            <div class="text-danger fw-bold">
                <?php echo $errors['ingredients']; //displaying ingredients errors
                ?> 
            </div>
            
            <div class="button-div w-100% text-center">
    
                <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary mx-auto my-4">
            </div>
        </form>
    </div>
    <?php include("templates/footer.php"); ?> 

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
