<?php include('partials/menu.php'); ?>
    <div class="main-content">
            <div class="wrapper">
    <h1>users</h1>
    <br/> <br/> <br/>
    <?php
       
          if(isset($_SESSION['deleteu'])){
            echo  $_SESSION['deleteu'] ;
            unset( $_SESSION['deleteu']);
 
          }
     
         ?>
           <br/> <br/>
    
    <table class="tbl-full">
        <tr>
            <th>S.N.</th>
            <th>name</th>
            
        </tr>

        <?php 
        $sql = "SELECT * FROM tbl_user";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        $sn=1;
        //check if we has in database 
        if($count>0){

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $id = $row['id'];
                $name = $row['username']

                ?>
                  <tr>
            <td><?php echo $sn++?></td>
            <td> <?php echo $name;?></td>
           
            
            


            <td>
                <a href="<?php echo SITEURL;?>admin/delete-user.php?id=<?php echo $id; ?>"  class="btn-danger">Delete user</a>
            </td>
        </tr>
                <?php
            }

        }
        else{
            ?>
            <tr>
                <td colspan="6">
                    <div class="error">No Category Added</div>
                </td>
            </tr>
            <?php
        }
        
        
        
        
        ?>
      
        
    </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>
