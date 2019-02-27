            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Login</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Email</th>
                        <th>Rola</th>
                        <th>Admin</th>
                        <th>Subscriber</th>
                        <th>Edytuj</th>
                        <th>Usuń</th>
                                  
                    </tr>
                </thead>
            
            
            <tbody>
                  <?php
                    global $connection;
                    $query = "SELECT * FROM users";
                    $select_users = mysqli_query($connection,$query);  
                    if(!$select_users){

                    die('QUERY FAILED' . mysqli_error($connection));

                    }

                    while($row = mysqli_fetch_assoc($select_users)) {
                    $user_id = $row['user_id'];
                    $user_username = $row['user_username']; 
                    $user_password = $row['user_password'];
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname']; 
                    $user_email = $row['user_email']; 
                    $user_image = $row['user_image'];
                    $user_role = $row['user_role'];
                    $user_randSalt = $row['user_randSalt'];
 
                    
                    echo "<tr>";  
                    echo "<td> $user_id </td>";
                    echo "<td> $user_username </td>";
                    echo "<td> $user_firstname </td>";
                    echo "<td> $user_lastname </td>";
                    echo "<td> $user_email </td>";
                    echo "<td> $user_role </td>";
                            
  
                           
//            $query = "SELECT * FROM posts WHERE post_id= $comment_post_id ";
//            $select_post_id = mysqli_query($connection,$query);  
//            confirmQuery($select_post_id);
//
//            while($row = mysqli_fetch_assoc($select_post_id)) {
//            $post_title = $row['post_title'];
//            $post_id = $row['post_id'];
//            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>"; 
//            }
                          
                        
        
//                    echo "<td> $comment_post_id </td>";
//                    echo "<td> $comment_date </td>";
//
                    echo "<td><a href='users.php?change_to_admin={$user_id}'>Zmień na administratora</a></td>";   
                    echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Zmień na subskrybenta</a></td>"; 
                    echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";  
                    echo "<td><a href='users.php?delete={$user_id}'>Usuń</a></td>";
                    
//                        
                        
//                        
//                    $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
//                    $select_post_categories_id = mysqli_query($connection,$query);  
//                    confirmQuery($select_post_categories_id);
//
//                    while($row = mysqli_fetch_assoc($select_post_categories_id)) {
//                    $cat_id = $row['cat_id'];
//                    $cat_title = $row['cat_title'];
//                    
//                    echo "<td> $cat_title </td>";
//                        
//                        
//                    }
             
                      
                    

                      
                    echo "</tr>" ;
                 } ?> 
                
            </tbody>        
            </table>  
            
           
<?php
if(isset($_GET['change_to_admin'])){
    
$the_user_id=$_GET['change_to_admin'];

$query = "UPDATE users SET user_role= 'Admin' WHERE user_id = {$the_user_id}";

$change_to_admin_query= mysqli_query($connection,$query);
    
confirmQuery($change_to_admin_query);
header ("Location: users.php");
    
}


?>
  
         
                
                       
                              
<?php
if(isset($_GET['change_to_subscriber'])){
    
$the_user_id=$_GET['change_to_subscriber'];

$query = "UPDATE users SET user_role= 'Subscriber' WHERE user_id = {$the_user_id}";

$change_to_subscriber_query= mysqli_query($connection,$query);
    
confirmQuery($change_to_subscriber_query);
header ("Location: users.php");
    
}


?>                                                              


<?php
if(isset($_GET['delete'])){
    
$the_user_id=$_GET['delete'];
$query = "DELETE FROM users where user_id= {$the_user_id}";
$delete_query= mysqli_query($connection,$query);
    
confirmQuery($delete_query);
header ("Location: users.php");
    
}
?>



