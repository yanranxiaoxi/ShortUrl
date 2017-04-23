<?php
ini_set('display_errors', 0);
?>
<html>
<head>
<title>短网址 - 后台管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../assets/admin.css" />
<script type="text/javascript" src="../assets/admin.js"></script>
<style type="text/css">
.style2 {
	font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
}
</style>
</head>
<body>

<?php if (is_admin_login()): ?>

<div class="header"><a class="lank" href="index.php">短网址 后台管理</a> <a href="/">返回首页</a>丨<a href="logout.php">退出</a></div>
<?php
$updateurl = "https://git.karula.org/ShortUrl/update.txt";
$fh = fopen($updateurl, 'r');
$version = fread($fh, 3);
fclose($fh);
$current = SHORTURL_NUMERICVERSION;
if ($version > $current && $version !== $current) {
echo "<center><p style=\"color:green;\">一个新版本的ShortUrl已经可以使用，请前往下载： <a href=\"https://github.com/CollageTomato/ShortUrl\">https://github.com/CollageTomato/ShortUrl</a></p></center><hr/>";
} 
elseif ($version < $current && $version !== $current) {
echo "<center><p style=\"color:blue;\">你正在使用开发版的ShortUrl，我们期待你的反馈</p></center><hr/>";

}
?>
<div id="search">
<div class="search_left left">
<h2>查找链接</h2>
<form method="get" action="index.php">
	<p><span>通过后缀查找：</span><input placeholder="通过短代码或者自定义代码查询." type="text" name="search_alias" size="30" value="<?php echo @htmlentities($_GET['search_alias']) ?>" /></p>
	<p><span>通过链接查找：</span><input placeholder="通过真实链接的一部分即可查询." type="text" name="search_url" size="30" value="<?php echo @htmlentities($_GET['search_url']) ?>" /></p>
	<p><input type="submit" value="查找" /></p>
</form>
</div>
<div class="search_right">
	<h2>修改链接</h2>
<form method="get" action="index.php?type=up">
	<p><span>原地址为：</span><input type="text" name="old_url" placeholder="此处为该地址的ID" value="<?php echo @htmlentities($_GET['old_id']) ?>" /></p>
	<p><span>新地址为：</span><input type="text" name="new_url" placeholder="此处填写新的地址" value="" /></p>
	<p><input type="submit" value="修改" /></p>
</form>
</div>
</div>
<?php endif; ?>
