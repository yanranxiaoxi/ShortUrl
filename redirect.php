<?php
require_once("config.php");
require_once("functions.php");

db_connect();
 //header("Content-Type:text/html;charset=utf-8");
$alias = trim(mysql_real_escape_string($_GET['alias']));
get_st($alias);

if (!preg_match("/^[a-zA-Z0-9_-]+$/", $alias)) {
 header("Location: ".SITE_URL, true, 301);
  exit();
 }
if(INDIRECTLYGO==1){
	if (($url = get_url($alias))) {
        
        header("refresh:".GOTIME.";url=".$url."");
	       //include './ad.php';  //需要加载的页面地址
        echo "<br><a href=\"".$url."\">点击直接进入</a>";
        exit();
        
        }

}else{
  if (($url = get_url($alias))) {
      header("Location: $url", true, 301);
      exit();
  }
}
echo "<script>document.location = '".SITE_URL."';</script>";
//header("Location: ".SITE_URL, true, 301);