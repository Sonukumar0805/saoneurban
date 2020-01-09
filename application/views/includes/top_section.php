<!DOCTYPE html>
<html lang="en">
<head>
    <title>Saone Urban Security Service</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo file_url('assets/images/favicon.jpg');?>" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?php echo file_url('assets/css/bootstrap/css/bootstrap.min.css');?>">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?php echo file_url('assets/icon/themify-icons/themify-icons.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo file_url('assets/icon/font-awesome/css/font-awesome.min.css');?>">
    
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?php echo file_url('assets/icon/icofont/css/icofont.css');?>">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?php echo file_url('assets/css/style.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo file_url('assets/css/jquery.mCustomScrollbar.css');?>">
    
<script type="text/javascript" src="<?php echo file_url('assets/js/jquery/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo file_url('assets/js/custom.js');?>"></script>
<?php
	if(!empty($styles)){
		foreach($styles as $key=>$style){
			if($key=="link"){
				if(is_array($style)){
					foreach($style as $single_style){
						echo "<link rel='stylesheet' href='$single_style'>\n\t";
					}
				}
				else{
					echo "<link rel='stylesheet' href='$style'>\n\t";
				}
			}
			elseif($key=="file"){
				if(is_array($style)){
					foreach($style as $single_style){
						echo "<link rel='stylesheet' href='".file_url("$single_style")."'>\n\t";
					}
				}
				else{
					echo "<link rel='stylesheet' href='".file_url("$style")."'>\n\t";
				}
			}
		}
	}
	
	if(!empty($top_script)){
	  foreach($top_script as $key=>$script){
		  if($key=="link"){
				if(is_array($script)){
					foreach($script as $single_script){
						echo "<script src='$single_script'></script>\n\t\t";
					}
				}
				else{
					echo "<script src='$script'></script>\n\t\t";
				}
		  }
		  elseif($key=="file"){
			if(is_array($script)){
				foreach($script as $single_script){
					echo "<script src='".file_url("$single_script")."'></script>\n\t\t";
				}
			}
			else{
				echo "<script src='".file_url("$script")."'></script>\n\t\t";
			}
		  }
	  }
	}
?>
</head>
<body>
	  <!--<div class="fixed-button">
		<a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
		</a>
	  </div>-->
        <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">