<?php
    include('config/db_connect.php');

    //Delete Pizza from db
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

        //SQL
        $sql_del = "DELETE FROM ninja_pizzas WHERE id = $id_to_delete";

        //Redirecting
        if(mysqli_query($conn, $sql_del)){
            header("Location:index.php");
        }else{
            echo "Query Error:" . mysqli_errors($conn);
        }
    }

    //id in GET url
    if(isset($_GET['id'])){
        
        $id = mysqli_real_escape_string($conn, $_GET['id']);

        //SQL QUERY to get details of pizza having $GET_['id']
        $sql_detail ="SELECT * FROM ninja_pizzas WHERE id= $id";

        //get query result
        $result = mysqli_query($conn, $sql_detail);

        //fetch result in arrayformat
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

        // print_r($pizza);
    } 
    
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('templates/header.php');?>
        <div class="container text-center my-4 p-4 bg-light ">

            <?php if($pizza):?>
                <h2 class="h2"><?php echo htmlspecialchars($pizza['title']);?></h2>
                <p>Created By: <?php echo htmlspecialchars($pizza['email']);?></p>
                <p><?php echo date($pizza["created_at"]);?></p>
                <h5 class="h5 text-decoration-underline">Ingredients:</h5>
                <p class="text-capitalize text-secondary"><?php echo htmlspecialchars($pizza['ingredients']);?></p>

                <!-- DELETE FORM-->
                 <form action="details.php" method="POST" >
                     <input type="hidden" name="id_to_delete" value=<?php echo$_GET['id'];?>>
                     <input type="submit" name="delete" value="DELETE" class="btn btn-danger">
                </form>
            <?php else:?>
                <h2 class="h2">No such Pizza exists</h2>
            <?php endif;?>
        </div>

    <?php include('templates/footer.php');?>

</body>
</html>