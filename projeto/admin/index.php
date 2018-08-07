<?php
ob_start();
session_start();
require('../dts/dbaSis.php');
require('../dts/getSis.php');
require('../dts/setSis.php');
require('../dts/outSis.php');

if(!empty($_SESSION['autUser'])){
    header('Location: index2.php');
}

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel Administrativo - Pró Notícias</title>

<meta name="title" content="Painel Administrativo - Pró Notícias" />
<meta name="description" content="Área restrita aos administradores do site PRÓ NOTÍCIAS" />
<meta name="keywords" content="Login, Recuperar Senha, Pró Notícias" />

<meta name="author" content="AUTOR DO SITE" />   
<meta name="url" content="URL DO SITE" />
   
<meta name="language" content="pt-br" /> 
<meta name="robots" content="NOINDEX,NOFOLLOW" /> 

<link rel="icon" type="image/png" href="ico/chave.png" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/geral.css" />

</head>

<body>

<div id="login">

	<img src="images/login-logo.png" alt="Pro Notícias - Área administrativa | Login" title="Pro Notícias - Área administrativa | Login" />
        <?php if(isset($_POST['sendLogin'])){
            $f['email'] = mysql_real_escape_string($_POST['email']);
            $f['senha'] = mysql_real_escape_string($_POST['senha']);
            $f['salva'] = mysql_real_escape_string($_POST['remember']);

                    if(!$f['email'] || !validMail($f['email'])){
                        echo '<span class="ms al">Favor preencher campo email corretamente</span>';
                    }
                    elseif(strlen($f['senha']) < 6){
                         echo '<span class="ms al">Favor preencher campo senha corretamente</span>';
                    }
                    else{
                        $autEmail    = $f['email'];
                        $autSenha    = $f['senha'];
                        $readAutUser = read('up_users',"WHERE email = '$autEmail'");
                            if($readAutUser){
                                foreach($readAutUser as $autUser);
                                if($autEmail == $autUser['email'] && $autSenha == $autUser['senha']){
                                    //faz login
                                    if($autUser['nivel'] == 1 || $autUser['nivel'] == 2){

                                            if($f['salva']){
                                                $cookiesalva = base64_encode($autEmail).'&'.base64_encode($autSenha);
                                                setcookie('autUser',$cookiesalva,time()+60+60*24*30,'/');
                                            }else{
                                                setcookie('autUser','',time()-3600,'/');
                                            }
                                            $_SESSION['autUser'] = $autUser;
                                            header('Location: '.$_SERVER['PHP_SELF']);
                                    }else{
                                        echo '<span class="ms in">Seu nivel nao permite acesso a essa área, vamos redirecionar voce para o login de usuarios</span>';
                                        header('Refresh:1;url='.BASE.'/projeto/pagina/login');

                                    }
                                        //inicia a sessao
                                }else{
                                    echo '<span class="ms no">senha informada nao confere</span>';
                                }
                            }else{
                                echo '<span class="ms no">Email nao existe em nosso banco de dados</span>';
                            }
                    }
            
        }elseif(!empty($_COOKIE['autUser'])){
            $cookie = $_COOKIE['autUser'];
            
        }

        
            //echo '<pre class="debug">';
           // print_r($cookie);
            //echo md5('12345678');
            //echo '</pre>';
            ?>

        <div style="display:none">
		<span class="ms ok">Login efetuado com sucesso!</span>
        <span class="ms no">Erro</span>
        <span class="ms al">Alerta</span>
        <span class="ms in">Informação</span>
    </div>
        <?php
            if(!$_GET['remember']){
        ?>
    	<form name="login" action="" method="post">
        	<label>
            	<span>E-mail:</span>
                <input type="text" class="radius" name="email" value="<?php if($f['email']){echo $f['email'];} ?>"/>
            </label>
            <label>
            	<span>Senha:</span>
                <input type="password" class="radius" name="senha" value="<?php if($f['email']){echo $f['email'];} ?>"/>
            </label>
            <input type="submit" value="Logar-se" name="sendLogin" class="btn" />
            
            <div class="remember">
            	<input type="checkbox" name="remember" value="1" <?php if($f['salva']){echo 'checked="checked"';} ?>/> Lembrar meus dados de acesso!
            </div>
            <a href="index.php?remember=true" class="link" title="Esqueci minha senha!">Esqueci minha senha!</a>
        </form>
        <?php
            }else{
                if(isset($_POST['sendRecover'])){
                    $recover = mysql_real_escape_string($_POST['email']);
                    $readRec = read('up_users',"WHERE email = '$recover'");
                    if(validMail($recover)){
                        if(!$readRec){
                            echo '<span class="ms no">Erro: Email não confere</span>';
                        }else{
                            foreach($readRec as $rec){
                                if($rec['nivel'] == 1 || $rec['nivel'] == 2 ){
                                    //ENVIA EMAIL
                                    echo '<span class="ms ok">Seus dados foram enviados com sucesso para '.$rec['email'].'</span>';
                                }else{
                                    echo '<span class="ms in">Seu nivel nao permite acesso a essa área, vamos redirecionar voce para o login de usuarios</span>';
                                        header('Refresh: 5;url='.BASE.'/pagina/login');
                                }
                            }

                        }

                    }else{
                        echo '<span class="ms al">Favor preencher campo email corretamente</span>';
                    }

                }
        ?>
        <form name="recover" action="" method="post">
        	<span class="ms in">Informe seu e-mail para que possamos enviar seus dados de acesso!</span>
        	<label>
            	<span>E-mail:</span>
                <input type="text" class="radius" name="email" value="<?php if($recover){echo $recover;} ?>" />
            </label>
            <input type="submit" value="Recuperar dados" name="sendRecover" class="btn" />
            <a href="index.php" class="link" title="Voltar">Voltar</a>
            
            
        </form>
        <?php
            }
        ?>
</div><!-- //login -->

</body>
<?php 
require_once('js/jsc.php');
require_once('../js/jscSis.php');
ob_end_flush(); 
?>
</html>