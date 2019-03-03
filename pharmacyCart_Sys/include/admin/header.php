<?php include('db.php'); ?>
<?php date_default_timezone_set('Africa/Harare'); ?>
<?php
    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    
    class Admin {
        
        function getunpaidorders(){
                $q = "SELECT * FROM pcs_db.order where status='unconfirmed' order by dateOrdered desc";
                $result = mysql_query($q);
            
                return $result;
        }
        function getdeliveredorders(){
                $q = "SELECT * FROM pcs_db.order where status='delivered' order by dateDelivered desc";
                $result = mysql_query($q);
            
                return $result;
        }
        function getpaidorders(){
                $q = "SELECT * FROM pcs_db.order where status='confirmed' order by dateDelivered desc";
                $result = mysql_query($q);
            
                return $result;
        }
        
        function getorder(){
            $id = $_GET['id'];
            $q = "SELECT * FROM pcs_db.order where id=$id";
            $result = mysql_query($q);
            
            return $result;
        }
        
        function deliver(){
            $date = date('m/d/y h:i:s A');
            $id = $_GET['id'];
            $q = "UPDATE pcs_db.order set dateDelivered='$date', status='delivered' where id=$id";
            mysql_query($q);
            
            return true;
        }
        function paid(){
            $id = $_GET['id'];
            $date = date('m/d/y h:i:s A');
            $q = "UPDATE pcs_db.order set dateDelivered='$date', status='confirmed' where id=$id";
            mysql_query($q);
            
            return true;
        }
        
        function getcategory(){
            $q = "SELECT * from pcs_db.category order by title asc";
            $result = mysql_query($q);
            
            return $result;
        }
        function addcategory($cat){
            $q = "INSERT INTO pcs_db.category values('','$cat')";
            mysql_query($q);
            return true;
        }
        
        function delete(){
            $table = $_GET['table'];
            $id = $_GET['id'];
            //echo $q = "DELETE FROM pcs_db.$table where id=$id";
            mysql_query("DELETE FROM pcs_db.$table where id=$id");
            return true;
        }
        
        function getcategorybyid($id){
            $q = "Select * from pcs_db.category where id=$id";
            $result = mysql_query($q);
            if($row = mysql_fetch_array($result)){
                $category = $row['title'];
            }
            return $category;
        }
        
        function updatecategory($cat,$id){
            $q = "update pcs_db.category set title='$cat' where id=$id";   
            mysql_query($q);
            return true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include('session.php'); ?>
<link rel="stylesheet" href="css/style1.css" type="text/css" media="screen" charset="utf-8">
<script src="admin.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>	
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>






    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Supplement Ordering</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="logo pull-left">
							<a href="admin.php"><img src="images/home/header.jpg" alt="" class="img-responsive" /></a>
						</div>
		
					</div>
					
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
    