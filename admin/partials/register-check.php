<?php

if(!isset($_SESSION['user2'])) 
{
   $_SESSION['no-register-message'] = "<div class='error text-center'> please login to access admin panal</div>";
   header('location:http://localhost/admin/register.php');
}

?>