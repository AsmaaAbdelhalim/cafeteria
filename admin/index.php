
<?php include('partials/menu.php'); ?>

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">
                        <?php
                        // SQL Query
                        $sql = "SELECT * FROM tbl_category";
                        // Prepare the query
                        $stmt = $pdo->prepare($sql);
                        // Execute the query
                        $stmt->execute();
                        // Fetch all rows
                        $rows = $stmt->fetchAll();
                        // Count rows
                        $count = count($rows);
                        ?>



                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM tbl_food";

                        //Prepare the query
                        $stmt2 = $pdo->prepare($sql2);

                        //Execute the query
                        $stmt2->execute();

                        //Fetch all rows
                        //Execute Query
                        $rows2 = $stmt2->fetchAll();
                        //Count Rows
                        $count2 = count($rows2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM tbl_order";
                        //Execute Query
                        $stmt3 = $pdo->prepare($sql3);

                        //Execute the query
                        $stmt3->execute();

                        //Fetch all rows
                        $res3 = $stmt3->fetchAll();

                        //Count Rows
                        $count3 = count($res3);
                    ?>

                    <h1><?php echo $count3; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    
                            <?php
                        // Create SQL Query to Get Total Revenue Generated
                        // Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                        // Prepare the query
                        $stmt4 = $pdo->prepare($sql4);

                        // Execute the query
                        $stmt4->execute();

                        // Fetch the value
                        $row4 = $stmt4->fetch();

                        // Get the Total Revenue
                        $total_revenue = $row4['Total'];
                        ?>

                    <h1>$<?php echo $total_revenue; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>