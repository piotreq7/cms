<?php include "includes/admin_header.php" ?>



<div id="wrapper">

<!-- Navigation -->

<?php include "includes/admin_navigation.php" ?>
        
        
    

<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
            Welcome to admin
            <small>Author</small>
            </h1>   
            
                
<?php
if(isset($_GET['source'])){
$source = $_GET['source'];
}else {
    $source = '';
}

switch($source){

case '22';
echo "ss";
break;    

case '22';
echo "ss";
break;

case '22';
echo "ss";
break;

default:
      include "includes/admin_view_all_posts.php";  
break;
        
}
    




?>
                
                
          


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>

