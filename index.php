<?php include('partials/menu.php'); ?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        
        <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php 
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
?>

<!-- CAtegories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        
                        <?php
                // Create SQL Query to display categories from the database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                // Prepare the query
                $stmt = $pdo->prepare($sql);

                // Execute the query
                $stmt->execute();

                // Fetch all rows as an associative array
                $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Count the number of rows
                $count = count($categories);
                //$count = $stmt->rowCount($categories);

                if ($count > 0) {
                    // Categories available
                    foreach ($categories as $category) {
                        // Get the values like id, title, image_name
                        $id = $category['id'];
                        $title = $category['title'];
                        $image_name = $category['image_name'];

                        // Output the values
                        //echo "ID: $id, \Title: $title, Image Name: $image_name<br>";
                        
                ?>
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php 
                                //Check whether Image is available or not
                                if($image_name=="")
                                {
                                    //Display MEssage
                                    echo "<div class='error'>Image not Available</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>
                            

                            <h3 class="float-text text-white"><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                //Categories not Available
                echo "<div class='error'>Category not Added.</div>";
            }
        ?>






        <div class="clearfix"></div>
    </div>
</section>
<!-- Categories Section Ends Here -->



<!-- fOOD MEnu Section Starts Here -->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

       
                        <?php
                // Getting foods from the database that are active and featured
                // SQL Query
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

                // Prepare the query
                $stmt2 = $pdo->prepare($sql2);

                // Execute the query
                $stmt2->execute();

                // Fetch all rows as an associative array
                $foods = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                // Count the number of rows
                $count2 = count($foods);

                // Check whether food is available or not
                if ($count2 > 0) {
                    // Food available
                    foreach ($foods as $food) {
                        // Get all the values
                        $id = $food['id'];
                        $title = $food['title'];
                        $price = $food['price'];
                        $description = $food['description'];
                        $image_name = $food['image_name'];

                        // Output the values
                        //echo "ID: $id, Title: $title, Price: $price, Description: $description, Image Name: $image_name<br>";
                ?>

                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php 
                            //Check whether image available or not
                            if($image_name=="")
                            {
                                //Image not Available
                                echo "<div class='error'>Image not available.</div>";
                            }
                            else
                            {
                                //Image Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                        ?>
                        
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail">
                            <?php echo $description; ?>
                        </p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>

                <?php
            }
        }
        else
        {
            //Food Not Available 
            echo "<div class='error'>Food not available.</div>";
        }
        
        ?>

        



        <div class="clearfix"></div>

        

    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- fOOD Menu Section Ends Here -->


<?php include('partials/footer.php'); ?>