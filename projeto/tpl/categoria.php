<title>Pró Noticias - Entretenimento, games, internet e tecnologia</title>
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

<div class="categoria">
    	<h1>Notícias sobre Entretenimento:</h1>
        <ul class="arts">
        	<?php for($i=0;$i<16;$i++):?>
        	<li<?php if($i%4==0)echo ' class="last"';?>>
            	<a href="#"><img src="<?php setHome();?>/midias/inter01.png" alt="" title="" width="200" height="150" /></a>
                <p class="data">13/03/2012 16:37</p>
                <p class="titulo"><a href="#" class="link">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</a></p>
            </li>
            <?php endfor;?>
        </ul>
        
        <div class="paginator" style="width:870px;">
            <a href="#">Primeira página</a>&nbsp;&nbsp;&nbsp;
            <a href="#">1</a>&nbsp;&nbsp;&nbsp;
            <span class="atv">2</span>&nbsp;&nbsp;&nbsp;
            <a href="#">3</a>&nbsp;&nbsp;&nbsp;
            <a href="#">Última página</a>
        </div>
          
</div><!-- /categoria -->
</div><!-- //content -->