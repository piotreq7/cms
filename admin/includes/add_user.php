<?php
if(isset($_POST['create_user'])){
    

    
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
    
    
    $query = "INSERT INTO users (user_firstname, user_lastname, user_role, user_username, user_email, user_password) ";
    $query .= " VALUES ('{$user_firstname}', '{$user_lastname}', '{$user_role}', '{$user_username}', '{$user_email}', '{$user_password}')";


    
    $create_user_query=mysqli_query($connection,$query);
    
    confirmQuery($create_user_query);
    
    
    
}

?>


<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">

<label for="post_title">Username</label>
<input type="text" class="form-control" name="user_username">   

</div>  
<div class="form-group">

<label for="post_title">Imię</label>
<input type="text" class="form-control" name="user_firstname">   

</div>  
 
  
 <div class="form-group">

<label for="post_title">Nazwisko</label>
<input type="text" class="form-control" name="user_lastname">   

</div>   
    
<div class="form-group">

<label for="post_title">Email</label>
<input type="email" class="form-control" name="user_email">   

</div>
  
      
          
 
<div class="form-group">


<select name='user_role' id=''> 
                    
       <option value="Subscriber">Select Option</option> 
                            
    <option value="Admin">Admin</option>
    <option value="Subscriber">Subscriber</option>  
                             
</select>            
</div>                             
                                                        
                  
                      
                          
                                  
      
 <div class="form-group">

<label for="post_title">Hasło</label>
<input type="password" class="form-control" name="user_password">   

</div>      
        



<!--
<div class="form-group">

<label for="post_image">Post Image</label>
<input type="file" name="image">   
</div> 
-->




<div class="form-group">

<input type="submit" class="btn btn-primary" name="create_user" value="Utwórz użytkownika">   
</div> 






</form>