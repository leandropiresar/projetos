<?php
if (function_exists(getUser)){
    if(!getUSer($_SESSION['autUser']['id'],'2')){
        echo '<span class="ms al">Desculpe, você não tem permissão para gerenciar as categorias</span>';
    }else{
        if(isset($POST['sendFiltro'])){
            $search = $_POST['search'];
                if(!empty($search) && $search != 'Titulo:'){
                    $_SESSION['where'] = "WHERE titulo LIKE '%$search%'";
                    header('Location: index2.php?exe=posts/posts');
                }else{
                    unset($_SESSION['where']);
                }
        }
?>
        
                
               
            
            <div class="bloco list" style="display:block">
            	<div class="titulo">Artigos:
                
                	<form name="filtro" action="" method="post">
                    	<label>
                        	<input type="text" name="search" class="radius" size="30" value="Titulo:" 
                            onclick="if(this.value=='Titulo:')this.value=''" 
                            onblur="if(this.value=='')this.value='Titulo:'"
                            />
                        </label>
                        <input type="submit" value="filtrar resultados" name="sendFiltro" class="btn" />
                    </form>
                
                </div><!-- /titulo -->
                <?php
                $pag = (empty($_GET['pag']) ? '1' : $_GET['pag']);
                $maximo = 1;
                $inicio = ($pag * $maximo) - $maximo;
                $readArt = read('up_posts',"{$_SESSION['where']} ORDER BY data DESC LIMIT $inicio,$maximo");
                
                    if(!$readArt){
                      echo '<span class="ms in">Não existem artigos ainda!</span>';
                    }else{
                      echo '<table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>titulo:</td>
                    <td align="center">data:</td>
                    <td align="center">categoria:</td>
                    <td align="center">visitas:</td>
                    <td align="center" colspan="4">ações:</td>
                  </tr>';

                  foreach($readArt as $art):
                        $views = ($art['visitas'] != '' ? $art['visitas'] : '0');
                  echo '<tr>';
                  echo '<td><a href="'.BASE.'/artigo/'.$art['url'].'" target="_blank">'.$art['titulo'].'</a></td>';
                  echo '<td align="center">'.$art['data'].'</td>';
                  echo '<td align="center"><a href="#"></a></td>';
                  echo '<td align="center">'.$views.'</td>';
                  echo '<td align="center"><a href="#" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>';
                  echo '<td align="center"><a href="#" title="postar galeria"><img src="ico/no.png" alt="postar galeria" title="postar galeria" /></a></td>';
                  echo '<td align="center"><a href="#" title="publicar"><img src="ico/alert.png" alt="publicar" title="publicar" /></a></td>';
                  echo '<td align="center"><a href="#" title="excluir"><img src="ico/no.png" alt="excluir" title="excluir" /></a></td>';
                  echo '</tr>';
                                            
                  endforeach;
                  
                    echo '</table>';
                     $link = 'index2.php?exe=posts/posts&pag=';
                     readPaginator('up_posts',"{$_SESSION['where']} ORDER BY data DESC", $maximo, $link, $pag);
                     
                    }

                     ?>
                 
                               
            </div><!-- /bloco list -->
            
<?php
        }
    }else{
        header('Location: ../index2.php');
    }
?>       