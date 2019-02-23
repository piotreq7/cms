<?php

if(isset($_GET['p_id'])){
$the_post_id = $_GET['p_id']; 
    
}
                    global $connection;
                    $query = "SELECT * FROM posts where post_id='{$the_post_id}'";
                    $select_posts_by_id = mysqli_query($connection,$query);  
                    confirmQuery($select_posts_by_id);

                    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];  
                    $post_title = $row['post_title'];    
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];    
                    $post_comment_count = $row['post_comment_count'];    
                    $post_date = $row['post_date'];
                    }

?>




<form action="" method="post" enctype="multipart/form-data">



<div class="form-group">

<label for="post_title">Post Title</label>
<input value = "<?php echo $post_title ;?>" type="text" class="form-control" name="post_title">   

</div>    

<div class="form-group">

<select name="post_category" id="">
    
<?php    //listowanie kategori
              
          
   
            $query = "SELECT * FROM categories";
            $select_all_categories = mysqli_query($connection,$query);  
            confirmQuery($select_all_categories);

            while($row = mysqli_fetch_assoc($select_all_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            
            echo "<option value='$cat_id'>{$cat_title}</option>";
                
            
            
            }
?>   
    
    
    
   
    
</select>

 
</div> 



<div class="form-group">

<label for="post_author">Post Author</label>
<input value = "<?php echo $post_author ;?>"  type="text" class="form-control" name="post_author">   
</div> 


<div class="form-group">

<label for="post_status">Post Status</label>
<input value = "<?php echo $post_status ;?>" type="text" class="form-control" name="post_status">   
</div> 


<div class="form-group">
<img width=100 src="../images/<?php echo $post_image; ?>" alt="image">
<label for="post_image">Post Image</label>
<input type="file" name="image">   
</div> 

<div class="form-group">

<label for="post_tags">Post Tags</label>
<input value = "<?php echo $post_tags ;?>"  type="text" class="form-control" name="post_tags">   
</div> 




<div class="form-group">

<label for="post_content">Post Content</label>
<textarea   type="text" class="form-control" name="post_content" cols="30" rows="10"><?php echo $post_content ;?></textarea>
</div> 

<div class="form-group">

<input type="submit" class="btn btn-primary" name="create_post" value="Publikuj post">   
</div> 






</form>