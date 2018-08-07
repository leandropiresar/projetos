<?php
if (function_exists(getUser)){
    if(!getUSer($_SESSION['autUser']['id'],'1')){
        echo '<span class="ms al">Desculpe, você não tem permissão para gerenciar as categorias</span>';
    }else{

?>
        	<span style="display:none">
                <span class="ms ok">ok</span>
                <span class="ms no">Erro</span>
                <span class="ms al">Alerta</span>
                <span class="ms in">Informação</span>
            </span>
            
            <div class="bloco form" style="display:block">
                <div class="titulo">Galeria:</div>
                <form action="" method="post">
                    <label>
                        <input id="file_upload" name="file_upload" type="file" class="file" />
                    </label>
                    	<a href="javascript:$('#file_upload').uploadifyUpload();" class="btn upload">clique aqui para enviar!</a>
                </form>
                
                <ul class="gblist">
                	<?php for($i=1;$i<=24;$i++):?>
                	<li<?php if($i%6==0){echo ' class="last"';}?>>
                    	<img src="../midias/inter01.png" width="85" height="65" />
                        <div class="action">
                        	<a href="../midias/inter01.png" rel="shadowbox" title="Ver"><img src="ico/view.png" title="Ver" alt="Ver" /></a>
                            <a href="#" title="Exluir"><img src="ico/no.png" title="Exluir" alt="Exluir" /></a>
                        </div><!-- /action -->
                    </li>
                    <?php endfor;?>
                </ul>
                
            </div><!-- /bloco form -->

            
            <div class="bloco home" style="display:block">
            	<div class="titulo">Estatísticas do site:</div>
                
                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
                  google.load("visualization", "1", {packages:["corechart"]});
                  google.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Year');
                    data.addColumn('number', 'Visitas');
					data.addColumn('number', 'Visitantes');
                    data.addRows([
                      ['01/2012', <?php echo '2350';?>, <?php echo '1350';?>],
					  ['02/2012', <?php echo '2190';?>, <?php echo '1750';?>],
					  ['03/2012', <?php echo '1890';?>, <?php echo '1950';?>],
					  ['Mês atual', <?php echo '752';?>, <?php echo '680';?>]
                    ]);
            
                    var options = {
					  width: 554, height: 200,
                      title: 'Visitas em seu site:',
                      hAxis: {title: 'relátorio de 3 meses', titleTextStyle: {color: 'red'}},
					  pointSize: 8,
					  focusTarget: 'category'
                    };
            
                    var chart = new google.visualization.LineChart(document.getElementById('chart_divDois'));
                    chart.draw(data, options);
                  }
                </script>
                <div id="chart_divDois" style="width:554px; height:200px; float:left; border:3px solid #CCC; margin-bottom:15px;"></div>
                
                <table width="200" border="0" class="tbdados" style="float:right;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>Usuários cadastrados:</td>
                    <td>52</td>
                  </tr>
                  <tr>
                    <td>Usuários logados:</td>
                    <td>12</td>
                  </tr>
                  <tr class="ses">
                    <td colspan="2">Sessões:</td>
                  </tr>
                  <tr>
                    <td>Categorias:</td>
                    <td>8</td>
                  </tr>
                  <tr>
                    <td>Páginas:</td>
                    <td>2</td>
                  </tr>
                </table>
                
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
                  google.load("visualization", "1", {packages:["corechart"]});
                  google.setOnLoadCallback(drawChart);
                  function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Task');
                    data.addColumn('number', 'Visitas totais');
                    data.addRows([
                      ['Artigos', <?php echo '48';?>],
                      ['Visitas em artigos', <?php echo '1280';?>],
                      ['Média por artigo', <?php echo '26';?>]
                    ]);
            
                    var options = {
                      title: 'Visitas em seus artigos:'
                    };
            
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                  }
                </script>
		 		<div id="chart_div" style="width:345px; height:141px; float:left; border:3px solid #CCC;"></div>
                
                <div class="sub" style="margin-top:15px;">Artigos:</div>
				
                <table width="270" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>últimas atualizações</td>
                    <td align="center">data</td>
                  </tr>
                  <?php for($i=0;$i<5;$i++):?>
                  <tr>
                    <td><a href="#" title="ver">Novo vídeo de Max Payne 3...</a></td>
                    <td align="center">16/03/12 13:01</td>
                  </tr>
                  <?php endfor;?>
                </table>
                
                <table width="270" border="0" class="tbdados" style="float:right;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>artigos + vistos</td>
                    <td align="center">visitas</td>
                  </tr>
                  <?php for($i=0;$i<5;$i++):?>
                  <tr>
                    <td><a href="#" title="ver">Novo vídeo de Max Payne 3...</a></td>
                    <td align="center">1.280,00</td>
                  </tr>
                  <?php endfor;?>
                </table>
            </div><!-- /bloco home -->
            
            <div class="bloco list" style="display:block">
            	<div class="titulo">Artigos:
                
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Titulo:" 
                            onclick="if(this.value=='Titulo:')this.value=''" 
                            onblur="if(this.value=='')this.value='Titulo:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div><!-- /titulo -->
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>titulo:</td>
                    <td align="center">data:</td>
                    <td align="center">categoria:</td>
                    <td align="center">visitas:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php for($i=0;$i<10;$i++):?>
                  <tr>
                    <td><a href="#" target="_blank">Com luvas de boxe, Gracyanne Barbosa...</a></td>
                    <td align="center">16/03/2012 15:15</td>
                    <td align="center"><a href="#">notícias</a></td>
                    <td align="center">1587</td>
                    <td align="center"><a href="#" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="#" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                    <td align="center"><a href="#" title="publicar"><img src="ico/alert.png" alt="publicar" title="publicar" /></a></td>
                  </tr>
                  <?php endfor;?>
                </table>
                <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">última</a>
                </div><!-- /paginator -->
            </div><!-- /bloco list -->
            
            <div class="bloco cat" style="display:block">
            	<div class="titulo">Categorias:</div>   
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>categoria:</td>
                    <td>resumo:</td>
                    <td align="center">tags:</td>
                    <td align="center">criada:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php for($i=0;$i<10;$i++):?>
                  <tr>
                    <td>notícias</td>
                    <td>fique por dentro das últimas novidades...</td>
                    <td align="center"><img src="ico/ok.png" alt="3 Tags" title="3 Tags" /></td>
                    <td align="center">16/03/2012 15:35</td>
                    <td align="center"><a href="#" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="#" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                  </tr>
                  <?php endfor;?>
                </table>
                <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">última</a>
                </div><!-- /paginator -->
            </div><!-- /bloco cat -->
            
            <div class="bloco pag" style="display:block">
            	<div class="titulo">Páginas:</div>   
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>nome:</td>
                    <td>resumo:</td>
                    <td align="center">tags:</td>
                    <td align="center">criada:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php for($i=0;$i<10;$i++):?>
                  <tr>
                    <td>sobre nós</td>
                    <td>a pró notícias foi criada em 2012 com o...</td>
                    <td align="center"><img src="ico/ok.png" alt="3 Tags" title="3 Tags" /></td>
                    <td align="center">16/03/2012 15:35</td>
                    <td align="center"><a href="#" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="#" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                  </tr>
                  <?php endfor;?>
                </table>
                <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">última</a>
                </div><!-- /paginator -->
            </div><!-- /bloco pag -->
            
            <div class="bloco user" style="display:block">
            	<div class="titulo">Usuários:
                
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="id" class="radius" size="30" value="Nome:" 
                            onclick="if(this.value=='Nome:')this.value=''" 
                            onblur="if(this.value=='')this.value='Nome:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div>   
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td align="center">#id</td>
                    <td>nome:</td>
                    <td>email:</td>
                    <td align="center">nível:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php for($i=0;$i<10;$i++):?>
                  <tr>
                    <td align="center"><a href="#" title="usuário"><?php echo $i;?></a></td>
                    <td>Robson V. Leite</td>
                    <td>contato@upinside.com.br</td>
                    <td align="center">Administrador</td>
                    <td align="center"><a href="#" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>
                    <td align="center"><a href="#" title="editar"><img src="ico/no.png" alt="editar" title="excluir" /></a></td>
                  </tr>
                  <?php endfor;?>
                </table>
                <div class="paginator">
                	<a href="#">primeira</a>
                    <span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a>
                    <a href="#">última</a>
                </div><!-- /paginator -->
            </div><!-- /bloco user -->
            
            <div class="bloco form" style="display:block">
            	<div class="titulo">Formulário:</div>
                
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Campo:</span>
                        <input type="text" name="" value="" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Texto:</span>
                        <textarea name="" class="editor" rows="10"></textarea>
                    </label>
                    
                    <label class="line">
                    	<span class="data">Select:</span>
                        <select name="">
                        	<option value="">Selecione uma opção &nbsp;&nbsp;</option>
                        </select>
                    </label>
                    
                    <label class="line">
                    	<span class="data">Arquivo:</span>
                        <input type="file" class="fileinput" name="img" size="60" style="cursor:pointer; background:#FFF;" />
                    </label>
                    
                    <div class="check">
                    	<span class="data">CheckBox:</span>
                        <ul>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li class="last"><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li><label><input type="checkbox" value="1" /> Valor</label></li>
                            <li class="last"><label><input type="checkbox" value="1" /> Valor</label></li>
                        </ul>
                    </div>
                    
                    <div class="check">
                    	<span class="data">RadioButton:</span>
                        <ul>
                            <li><label><input type="radio" value="1" name="0" /> Valor</label></li>
                            <li><label><input type="radio" value="1" name="0" /> Valor</label></li>
                            <li class="last"><label><input type="radio" value="1" name="0" /> Valor</label></li>
                        </ul>
                    </div>
                    
                    <input type="reset" value="clear" class="btnalt" />
                    <input type="submit" value="send" name="sena" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ../index2.php');
    }
?>       