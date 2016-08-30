<?php
define('SHORTURL', true);
ini_set('display_errors', 0);
$prefix[0] = '';
$filename = 'install';
if (is_dir($filename)) {
    die ("要让ShortUrl运作起来，你需要使用 <a href=\"install\">安装向导</a> ，这将帮助你在瞬间建立起新的网址缩短服务。<br/><br/>如果你已经安装了ShortUrl，你需要删除“install”目录。");
} //安装向导还未启用
?>
<?php
require_once("config.php");
require_once("functions.php");

db_connect();

if (count($_GET) > 0) {

    $url   = mysql_real_escape_string(trim($_GET['url']));
    $alias = mysql_real_escape_string(trim($_GET['alias']));

    if (!preg_match("/^(".URL_PROTOCOLS.")\:\/\//i", $url)) {
 	$prefix = explode(":", $url);
 	if ($prefix[0] == 'mailto') {
 		$url = $url;
 	} else {
        $url = "http://".$url;
 	}
    }

    $last = $url[strlen($url) - 1];

    if ($last == "/") {
        $url = substr($url, 0, -1);
    }

    $data = @parse_url($url);
	//print_r($data);
		if ($prefix[0] == 'mailto') {
			$data['scheme'] = 'mailto';
			$data['host'] = 'none';
		}
    if (strlen($url) == 0) {
        $_ERROR[] = "<p class=error>请输入一个真实链接.</p>";
    }
    else if (empty($data['scheme']) || empty($data['host'])) {
        $_ERROR[] = "<p class=error>请输入一个有效的链接.</p>";
    }
    else {
        $hostname = get_hostname();
        $domain   = get_domain();

/*        if (preg_match("/($hostname)/i", $data['host'])) {
            $_ERROR[] = "The URL you have entered is not allowed.";
        }*/
    }

    if (strlen($alias) > 0) {
        if (!preg_match("/^[a-zA-Z0-9_-]+$/", $alias)) {
            $_ERROR[] = "<p class=error>自定义别名只能包含字母，数字，下划线和破折号.</p>";
        }
        else if (code_exists($alias) || alias_exists($alias)) {
            $_ERROR[] = "<p class=error>您输入的自定义代码已经存在.</p>";
        }
    }

    if (count($_ERROR) == 0) {
        $create = true;

        if (($url_data = url_exists($url))) {
            $create    = false;
            $id        = $url_data[0];
            $code      = $url_data[1];
            $old_alias = $url_data[2];

            if (strlen($alias) > 0) {
                if ($old_alias != $alias) {
                    $create = true;
                }
            }
        }

        if ($create) {
            do {
                $code = generate_code(get_last_number());

                if (!increase_last_number()) {
                    die("System error!");
                }

                if (code_exists($code) || alias_exists($code)) {
                    continue;
                }

                break;
            } while (1);

            $id = insert_url($url, $code, $alias);
        }

        if (strlen($alias) > 0) {
            $code = $alias;
        }

        $short_url = SITE_URL."/".$code;
        $_GET['url']   = "";
        $_GET['alias'] = "";
        //$info = "<p class=info>短地址创建成功！新地址：<strong><a href=\"http://".htmlentities($short_url) ."\" target=\"_blank\">".htmlentities($short_url)."</a></strong> </p>";
        $info = "<p class=info>短地址创建成功！新地址：<strong><a href=\"".htmlentities($short_url) ."\" target=\"_blank\">".htmlentities($short_url)."</a></strong> </p>";
        require_once("html/index.php");
        exit();
    }
}
require_once("html/index.php");