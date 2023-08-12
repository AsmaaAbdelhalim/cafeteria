<?php 

    //Include constants.php file here
    include('../config/constants.php');
    include('partials/menu.php');

    // 1. get the ID of User to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete User
    $sql = "DELETE FROM tbl_user WHERE id=$id";
    
    //Execute the Query
    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    // Check whether the query executed successfully or not
    if($stmt==true)
    {
        //Query Executed Successully and User Deleted
        //echo "User Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>User Deleted Successfully.</div>";
        //Redirect to Manage User Page
        header('location:'.SITEURL.'admin/manage-user.php');
    }
    else
    {
        //Failed to Delete User
        //echo "Failed to Delete User";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete User. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-user.php');
    }

    //3. Redirect to Manage User page with message (success/error)

?>