<?php
    include('config/db_connect.php');
    //query to get all pizzas from ninja_pizzas
    $sql = 'SELECT title, ingredients, id FROM ninja_pizzas ORDER BY created_at'; //be in string format
                                                    //'ORDER BY created_at' will ordered result as per time stamp

    //make query and get result 
    $result = mysqli_query($conn, $sql);

    //fetch all rows from db and make it an array (array func {MTSQLI_ASSOC})
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //free result from memory
    mysqli_free_result($result);

    //closing connection
    mysqli_close($conn);

    //printing array 
    // print_r($pizzas);

    //explode function to get individual ingredient without comma
    // print_r(explode(',', $pizzas[0]['ingredients']));

    //using htmlspecial_chars() so that it would not accepts any tag or elements only text

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include('templates/header.php'); ?>
    <!-- pizzas cards  -->
    <div class="container-fluid bg-light">

        <h1 class="h1 text-secondary text-center">Pizzas!</h1>
        <div class="container my-3">
            <div class="row justify-content-center">
                <!-- foreach loop to display all pizzas or row from db (by {:,endforeach } syntaxx)-->
                <?php foreach($pizzas as $pizza):?>
                    <div class="col-xl-4 col-sm-6 col-md-4 p-2">
                        <div class="card mt-4">
                            <img src="https://www.svgrepo.com/show/474530/pizza.svg" class="card-img-top"" alt="">
                            <div class="card-body">
                                <h5 class="h5 text-dark text-center text-capitalize"><?php echo htmlspecialchars($pizza['title']);?></h5>
                                <div class="ingre-div">
                                <h6 class="h6 fw-500 text-decoration-underline">Ingredeints:-</h6>
                                <!-- ingredients in list -->
                                 <!-- (by [{,} ] syntaxx) -->
                                 <ul>
                                    <?php foreach(explode(',', $pizza['ingredients']) as $ingre){?>
                                        <li class="text-capitalize"><?php echo htmlspecialchars($ingre); ?></li>
                                    <?php } //end for loop?>
                                 </ul>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <!-- IT sends GET request or data in URL  -->
                                <a href="details.php?id=<?php echo $pizza['id'];?>" class="more-link text-primary text-decoration-none">MORE INFO</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ; //end for loop?>
             </div>
        </div>
    </div>
            
    <?php include("templates/footer.php"); ?> 

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>