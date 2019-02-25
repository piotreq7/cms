            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Autor</th>
                        <th>Content</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>In response to</th>
                        <th>Data</th>
                        <th>Zatwierdz</th>
                        <th>Odrzuć</th>
                        <th>Usuń</th>
                       
                                       
                    </tr>
                </thead>
            
            
            <tbody>
                  <?php
                    global $connection;
                    $query = "SELECT * FROM comments";
                    $select_comments = mysqli_query($connection,$query);  
                    if(!$select_comments){

                    die('QUERY FAILED' . mysqli_error($connection));

                    }

                    while($row = mysqli_fetch_assoc($select_comments)) {
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id']; 
                    $comment_author = $row['comment_author'];
                    $comment_email = $row['comment_email'];
                    $comment_content = $row['comment_content']; 
                    $comment_status = $row['comment_status']; 
                    $comment_date = $row['comment_date'];
 
                    
                    
                     
                   
                   
                    echo "<tr>";  
                    echo "<td> $comment_id </td>";
                    echo "<td> $comment_author </td>";
                    echo "<td> $comment_content </td>";
                    echo "<td> $comment_email </td>";
                    echo "<td> $comment_status </td>";
                            
  
                           
            $query = "SELECT * FROM posts WHERE post_id= $comment_post_id ";
            $select_post_id = mysqli_query($connection,$query);  
            confirmQuery($select_post_id);

            while($row = mysqli_fetch_assoc($select_post_id)) {
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];
            echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>"; 
            }
                          
                        
        
//                    echo "<td> $comment_post_id </td>";
                    echo "<td> $comment_date </td>";

                    echo "<td><a href='comments.php?aprove={$comment_id}'>Zatwierdź</a></td>";   
                     echo "<td><a href='comments.php?unaprove={$comment_id}'>Odrzuć</a></td>"; 
                    
                    echo "<td><a href='comments.php?delete={$comment_id}'>Usuń</a></td>";
                        
                        
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
if(isset($_GET['delete'])){
    
$the_comment_id=$_GET['delete'];

$query = "DELETE FROM comments where comment_id= {$the_comment_id}";

$delete_query= mysqli_query($connection,$query);
    
confirmQuery($delete_query);
header ("Location: comments.php");
    
}


?>
  
         
                
                       
                              
                                     
<?php
if(isset($_GET['unaprove'])){
    
$the_comment_unaprove=$_GET['unaprove'];

$query = "UPDATE comments SET comment_status ='unaproved' WHERE comment_id= $the_comment_unaprove";

$comment_unaprove_query= mysqli_query($connection,$query);
    
confirmQuery($comment_unaprove_query);
header ("Location: comments.php");
    
}
?>

<?php
if(isset($_GET['aprove'])){
    
$the_comment_aprove=$_GET['aprove'];

$query = "UPDATE comments SET comment_status ='aproved' WHERE comment_id= $the_comment_aprove";

$comment_aprove_query= mysqli_query($connection,$query);
    
confirmQuery($comment_aprove_query);
header ("Location: comments.php");
    
}





?>                                                               
