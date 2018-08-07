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

<div class="home">
	<div class="slide">
    	<ul>
        	<li>
            	<img src="<?php setHome();?>/midias/sl01.png" alt="Slide 001" title="Slide 001" width="866" height="254" />
                <div class="info">
                	<p class="titulo"><a href="#">Lorem ipsum dolor sit ametas, consectetuer adipiscing elit.</a></p>
               		<p class="resumo"><a href="#">(obs: coloque o último artigo de cada categoria no slide!...)</a></p>
               	</div><!-- /info -->
            </li>
        </ul>
        <div class="slidenav"></div><!-- /slide nav-->
    </div><!-- /slide -->
    
    <ul class="entretenimeto">
    	<?php for($i=0;$i<5;$i++):?>
    	<li<?php if($i==4)echo ' class="last"';?>>
        	<img src="<?php setHome();?>/midias/ent01.png" alt="Entretenimento Bloco" title="Titulo" width="168" height="234" />
            <div class="info">
            	<p class="data">12/03/2012 13:00</p>
           		<p class="titulo"><a href="#">Lorem ipsum dolor sit ametas, consectetuer adipiscing elit...</a></p>
           </div><!-- /info -->
        </li>
        <?php endfor;?>
    </ul><!-- /entretenimento -->
    
    <div class="bl-games-tec">
    	<div class="games">
        	<h2>games</h2>
        	<ul class="ulgames">
            	<?php for($i=0;$i<3;$i++):?>
            		<li class="gli">
						<img src="<?php setHome();?>/midias/gg01.jpg" alt="" title="" />
                    	<p class="titulo"><a href="#" class="trans">Novo vídeo de Max Payne 3 mostra o poder do rifle Mini-30</a></p>
                        <p class="data">12/03/2012 - 13:34</p>
                        <span class="link"><a href="#" class="radius bsshadow">continue lendo...</a></span>
                    </li>
                  <?php endfor;?>
            </ul><!-- /ulgames -->
        </div><!-- /games -->
        
        <div class="tec">
        	<h2>tecnologia</h2>
        	<ul class="ultec">
            	<?php for($i=0;$i<3;$i++):?>
                <li class="bsshadow<?php if($i==2)echo ' last';?>">
                	<img src="<?php setHome();?>/midias/tec01.png" alt="" title="" width="133" height="237" />
                    <span class="info">
                    	<p class="titulo"><a href="#">Com luvas de boxe, Gracyanne Barbosa posa como ring girl</a></p>
                    	<p class="data">12/03/2012 - 13:34</p>
                    </span>
                </li>
                <?php endfor;?>
            </ul>
            
            <ul class="ultecover">
            	<li class="tp bsshadow">
                	<span class="data">12/03</span>
                    <span class="titulo"><a href="#">Lorem ipsum dolor sit ametas, consectetuer adipiscing elit.</a></span>
                </li>
                
                <li class="bt bsshadow">
                	<span class="data">12/03</span>
                    <span class="titulo"><a href="#">Lorem ipsum dolor sit ametas, consectetuer adipiscing elit.</a></span>
                </li>
            </ul>
        </div><!-- /tec -->
    </div><!-- /bloco games + tecnologia -->
    
    <div class="internet">
    	<h2>internet</h2>
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
    
</div><!-- /home -->
</div><!-- //content -->