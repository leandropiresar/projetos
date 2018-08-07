<title>404 | Opssss não encontrado! Pró Noticias</title>
<meta name="title" content="TITULO DA PÁGINA" />
<meta name="description" content="DESCRIÇÃO DA PÁGINA" />
<meta name="keywords" content="PALAVRAS CHAVE DA PÁGINA" />
<meta name="author" content="AUTOR DO SITE" />   
<meta name="url" content="URL DO SITE" />  
<meta name="language" content="pt-br" /> 
<meta name="robots" content="INDEX,FOLLOW" /> 
</head>
<body>

<div id="site">

<?php setArq('tpl/header'); ?>

<div id="content">

	<div class="notfound">
    
    	<h1 class="pgtitulo">Opppppssss, não conseguimos encontrar o que você procura!</h1>
        <p class="pgtext">A url que você informou não retornou nem um resultado. Talvez a página tenha sido removida ou o artigo não 
        existe mais. Você pode tentar navegar pelo nosso menu ou pesquisar pelo sistema Ou ainda voltar á 
        <a class="pglink" href="<?php setHome();?>" title="voltar ao início!">Home</a>.</p>
         <p class="pgtext"><strong>Você pode conferir nossas últimas atualizações. Elas estão logo abaixo!</strong></p>
    
    
    <div class="bloco entre">
    	<h2>entretenimento</h2>
        <ul class="inter">
        	<?php for($i=0;$i<4;$i++):?>
        	<li class="bsshadow radius<?php if($i==3)echo ' last';?>">
            	<a href="#"><img src="<?php setHome();?>/midias/inter01.png" alt="" title="" width="200" height="150" /></a>
                <p class="data">13/03/2012 16:37</p>
                <p class="titulo">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</p>
            </li>
            <?php endfor;?>
        </ul>
    </div>
    
    <div class="bloco games">
    	<h2>games</h2>
        <ul class="inter">
        	<?php for($i=0;$i<4;$i++):?>
        	<li class="bsshadow radius<?php if($i==3)echo ' last';?>">
            	<a href="#"><img src="<?php setHome();?>/midias/inter01.png" alt="" title="" width="200" height="150" /></a>
                <p class="data">13/03/2012 16:37</p>
                <p class="titulo">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</p>
            </li>
            <?php endfor;?>
        </ul>
    </div>
    
    <div class="bloco tecno">
    	<h2>tecnologia</h2>
        <ul class="inter">
        	<?php for($i=0;$i<4;$i++):?>
        	<li class="bsshadow radius<?php if($i==3)echo ' last';?>">
            	<a href="#"><img src="<?php setHome();?>/midias/inter01.png" alt="" title="" width="200" height="150" /></a>
                <p class="data">13/03/2012 16:37</p>
                <p class="titulo">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</p>
            </li>
            <?php endfor;?>
        </ul>
    </div>
    
    <div class="bloco">
    	<h2>tecnologia</h2>
        <ul class="inter">
        	<?php for($i=0;$i<4;$i++):?>
        	<li class="bsshadow radius<?php if($i==3)echo ' last';?>">
            	<a href="#"><img src="<?php setHome();?>/midias/inter01.png" alt="" title="" width="200" height="150" /></a>
                <p class="data">13/03/2012 16:37</p>
                <p class="titulo">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</p>
            </li>
            <?php endfor;?>
        </ul>
    </div>
    
    </div><!-- //notfound -->

</div><!-- //content -->