<?php

if(isset($_GET['edit_user'])){
    
    
$the_user_id=$_GET['edit_user'];
    
  
    
    
    
                    global $connection;
                    $query = "SELECT * FROM users where user_id=$the_user_id";
                    $select_user_by_id = mysqli_query($connection,$query);  
                    confirmQuery($select_user_by_id);

                    while($row = mysqli_fetch_assoc($select_user_by_id)) {
                    $user_id = $row ['user_id'];
                    $user_firstname = $row ['user_firstname'];
                    $user_lastname = $row ['user_lastname'];
                    $user_role = $row ['user_role'];

                    $user_username = $row ['user_username'];
                    $user_email = $row ['user_email'];
                    $user_password = $row ['user_password'];
                    } 

    
    
}



if(isset($_POST['edit_user'])){
    

    
    $user_firstname = $_POST ['user_firstname'];
    $user_lastname = $_POST ['user_lastname'];
    $user_role = $_POST ['user_role'];
    
//    $post_image = $_FILES ['image']['name'];
//    $post_image_temp = $_FILES ['image']['tmp_name'];
    
    $user_username = $_POST ['user_username'];
    $user_email = $_POST ['user_email'];
    $user_password = $_POST ['user_password'];
//    $post_date = date('d-m-y');
    
//    move_uploaded_file($post_image_temp,"../images/$post_image" );
    
    
    $query = "UPDATE users SET ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role = '{$user_role}', ";
    $query .="user_username = '{$user_username}', ";
    $query .="user_email = '{$user_email}', ";
    $query .="user_password = '{$user_password}' ";
    $query .="WHERE user_id='$the_user_id'";
    

    
    $edit_user_query=mysqli_query($connection,$query);
    
    confirmQuery($edit_user_query);
    
}
    


?>


<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">

<label for="post_title">Username</label>
<input type="text" value="<?php echo $user_username; ?>" class="form-control" name="user_username">   

</div>  
<div class="form-group">

<label for="post_title">Imię</label>
<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">   

</div>  
 
  
 <div class="form-group">

<label for="post_title">Nazwisko</label>
<input type="text" value="<?php echo $user_lastname; ?>"  class="form-control" name="user_lastname">   

</div>   
    
<div class="form-group">

<label for="post_title">Email</label>
<input type="email"  value="<?php echo $user_email; ?>"  class="form-control" name="user_email">   

</div>
  
      
          
 
<div class="form-group">


<select name='user_role' id=''> 
                    
    <option value="Subscriber">Select Option</option> 
    
                           
    <?php 
    
    if($user_role==Admin){
    echo "<option value='Admin' selected>Admin</option>";
    }else{
    echo "<option value='Admin'>Admin</option>";
    
    }
    
    if($user_role==Subscriber){
    echo "<option value='Subscriber' selected>Subscriber</option>";
    }else{
    echo "<option value='Subscriber'>Subscriber</option>";
    
    }
    
    
    ?>
                                                                                                
<!--
    <option value="Admin">Admin</option>
    <option value="Subscriber">Subscriber</option>  
-->
                             
</select>            
</div>                             
                                                        
                  
                      
                          
                                  
      
 <div class="form-group">

<label for="post_title">Hasło</label>
<input type="password"  value="<?php echo $user_password; ?>"  class="form-control" name="user_password">   

</div>      
        



<!--
<div class="form-group">

<label for="post_image">Post Image</label>
<input type="file" name="image">   
</div> 
-->




<div class="form-group">

<input type="submit" class="btn btn-primary" name="edit_user" value="Edytuj użytkownika">   
</div> 






</form>