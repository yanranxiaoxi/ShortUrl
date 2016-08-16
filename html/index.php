<?php
if( !defined('SHORTURL' ) ) {
    header('HTTP/1.0 404 Not Found');
    exit();
}
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo SITE_TITLE; ?></title>
	<meta charset="UTF-8">
	<style type="text/css">
        body{
            font-family:微软雅黑,arial;
        }
        a{
			text-decoration: none;
			color: #000;
			font-weight: bold;
		}
		.container{
			margin-top: 120px;
		}
		.login{
			width: 400px;
			margin-left: auto;
			margin-right: auto;
			border:1px solid #ccc;
			padding: 20px;
			box-shadow:0 0 8px rgba(3,126,202,.5);
		}
		input[type='text']{
			margin-bottom: 10px;
			height: 35px;
			width: 100%;
			padding: 8px;
			font-size: 16px;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;
			border:1px solid #ccc;
			background-repeat: no-repeat;
		}
		input:focus{
			transition:border linear .3s,box-shadow linear .5s;
	 		-moz-transition:border linear .3s,-moz-box-shadow linear .5s;
	 		-webkit-transition:border linear .3s,-webkit-box-shadow linear .5s;
	 		outline:none;
	 		border-color:rgba(3,126,212,.5);
	 		box-shadow:0 0 8px rgba(3,126,202,.5);
	 		-moz-box-shadow:0 0 8px rgba(3,126,212,.5);
	 		-webkit-box-shadow:0 0 8px rgba(3,126,212,.3);
		}
		button{
			padding: 8px 15px;
			background-color: #6CA7DF;
			transition:background-color linear .3s;
			border:0;
			color: #fff;
			font-weight: bold;
		}
		button:hover{
			background-color: #4169E1;
			transition:background-color linear .3s;
		}
		form h2{
			text-align: center;
			font-weight: bold;
		}
		form p{
			margin-bottom: 10px;
			font-weight: bold;
		}
		.error{
			text-align: center;
			color: #ff0000;
		}
		.info{
			text-align: center;
			color: #000000;
		}
		.info a{
			color: #66ccff;
		}
		a:hover{
			color: #0000ff;
		}
		footer{
			text-align: center;
			padding: 5px;
			font-size: 20px;
		}
	</style>
</head>
<body>
<section class="container">
	<form class="login" method="get">
		
		<h2><?php echo SITE_TITLE; ?></h2>
		<p>原始链接</p>
		<input type="text" placeholder="例如：https://demo.domain.org" name="url" value="<?php echo @$_GET['url']; ?>">
		<p>自定义后缀</p>
		<input type="text" placeholder="例如：domain" name="alias">
		<button type="submit">创建</button><button type="reset">重置</button>
		<?php print_errors() ?>
		<?php echo @$info; ?>
	</form>
</section>
<footer>
	<p>Copyright © <?php echo date('Y'); ?> <a href="http://moe-girl.club">萌娘基金会</a> , All Rights Reserved.</p>
</footer>
</body>
</html>
