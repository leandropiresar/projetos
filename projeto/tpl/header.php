<div id="header">

    <div class="logo">
        <a href="<?php setHome();?>" title="Pró Noticias - Entretenimento, games, internet e tecnologia">
            <img src="<?php setHome();?>/tpl/images/logo.png" alt="Logo Pro Notícias" title="Pró Noticias - Entretenimento, games, internet e tecnologia" />
        </a>
    </div><!-- /header-logo -->
    
    <div class="search">
    	<form name="search" action="<?php setHome();?>/pesquisa/" method="post">
        	<label><input type="text" name="s" value="" /></label>
            <input type="submit" class="btn" value="" />
        </form>
    </div><!-- /headr-search -->
    
    <ul class="hnav">
    	<li><a title="SITENAME | Home" href="<?php setHome();?>">Home</a></li>
    	<li><a title="SITENAME | Entretenimento" href="<?php setHome();?>/categoria/entretenimento">Entretenimento</a></li>
        <li><a title="SITENAME | Games" href="<?php setHome();?>/categoria/games">Games</a></li>
        <li><a title="SITENAME | Internet" href="<?php setHome();?>/categoria/internet">Internet</a>
        	<ul class="sub">
            	<li><a href="<?php setHome();?>/categoria/google">Google</a></li>
                <li><a href="<?php setHome();?>/categoria/facebook">Facebook</a></li>
                <li><a href="<?php setHome();?>/categoria/twitter">Twitter</a></li>
            </ul>
        </li>
        <li><a title="SITENAME | Tecnologia" href="<?php setHome();?>/categoria/tecnologia">Tecnologia</a></li>
        <li><a title="SITENAME | Cadastre-se" href="<?php setHome();?>/pagina/cadastro">Cadastre-se</a></li>
        <li><a title="SITENAME | Logar-se" href="<?php setHome();?>/pagina/login">Logar-se</a></li>
        <li class="last"><a title="SITENAME | Logar-se" href="<?php setHome();?>/pagina/contato">Contato</a></li>
    </ul><!-- /hnav -->
    
</div><!-- /header -->