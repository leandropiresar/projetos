<?php
define(BASE,'http://localhost:8080/projeto');

function setHome(){
		echo BASE;	
	}
	
function setArq($nomeArquivo){
		if(file_exists($nomeArquivo.'.php')){
			include($nomeArquivo.'.php');
		}else{
			echo 'Erro ao incluir <strong>'.$nomeArquivo.'.php</strong>, arquivo ou caminho não conferem!';	
		}
	}
	
function getHome(){
	$url = $_GET['url'];
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'index' : $url[0]);
	
		if(file_exists('tpl/'.$url[0].'.php')){
			 require_once('tpl/'.$url[0].'.php');
		}elseif(file_exists('tpl/'.$url[0].'/'.$url[1].'.php')){
			 require_once('tpl/'.$url[0].'/'.$url[1].'.php');
		}else{
			 require_once('tpl/404.php');
		}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php setHome();?>/tpl/style.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="<?php setHome();?>/tpl/images/favicon.png" />

<!--[if IE]>
    <style type="text/css">
    #header .hnav li{margin-right:15px;}
    #header .hnav li a{padding:8px}
    #header .hnav li a:hover{background:#E21F26;}
    #header .hnav .last{margin:0; float:right;}
    </style>
<![endif]-->

<?php
getHome();
?>

<div style="clear:both"></div><!-- /clear -->
</div><!-- ///site -->

<div id="footer">
	<img src="<?php setHome();?>/tpl/images/bglogo.png" alt="SITENAME" title="SITENAME" />
    <p>2012 - <?php echo date('Y');?> © ProNotícias - Todos os direitos reservados</p>
</div><!-- footer -->

</body>

<?php include_once('js/jscSis.php');?>

</html>