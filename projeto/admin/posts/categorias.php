<?php
if (function_exists(getUser)){
    if(!getUSer($_SESSION['autUser']['id'],'1')){
        echo '<span class="ms al">Desculpe, você não tem permissão para gerenciar as categorias</span>';
    }else{

?>
<div class="bloco cat" style="display:block">
            	<div class="titulo">
                    Categorias:
                    <a href="index2.php?exe=posts/categorias-create" title="Criar nova categoria" class="btn" style="float:right">Criar categoria</a>
                    </div> 
                <?php

                if(!empty($_GET['delcat'])){
                    $idDel = mysql_real_escape_string($_GET['delcat']);
                    $readDelCat = read('up_Cat',"WHERE id_pai = '$idDel'");
                    if('!$readDelCat'){
                    delete('up_cat', "id = '$idDel'");
                    echo '<span class="ms ok">Categoria removida com sucesso!</span>';
                    }else{
                        echo '<span class="ms al">Esta categoria possui sucategorias. Precisa remover antes.</span>';
                    }
                }

                 if(!empty($_GET['delsub'])){
                    $idDel = mysql_real_escape_string($_GET['delsub']);
                    delete('up_cat', "id = '$idDel'");
                    echo '<span class="ms ok">Categoria removida com sucesso!</span>';
                }

                $pag = (empty($_GET['pag']) ? '1' : $_GET['pag']);
                $maximo = 2;
                $inicio = ($pag * $maximo) - $maximo;
                 $readCat = read('up_cat',"WHERE id_pai IS NULL LIMIT $inicio,$maximo");
                     if(!$readCat){
                         echo '<span class="ms in">Não existem registros de categorias!</span>';
                    }else{
                ?>  
                                             
                <table width="560" border="0" class="tbdados" style="float:left;" cellspacing="0" cellpadding="0">
                  <tr class="ses">
                    <td>categoria:</td>
                    <td>resumo:</td>
                    <td align="center">tags:</td>
                    <td align="center">criada:</td>
                    <td align="center" colspan="3">ações:</td>
                  </tr>
                  <?php 
                    foreach($readCat as $cat):

                    $catTags = ($cat['tags'] != '' ? 'ico/ok.png' : 'ico/no.png');

                    echo '<tr>';
                        echo '<td>'.$cat['nome'].'</td>';
                        echo '<td>'.$cat['content'].'</td>';
                        echo '<td align="center"><img src="'.$catTags.'" alt="3 Tags" title="3 Tags" /></td>';
                        echo '<td align="center">'.$cat['data'].'</td>';
                        echo '<td align="center" colspan="2"><a href="index2.php?exe=posts/categorias-edit&edit='.$cat['id'].'" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>';
                         echo '<td align="center"><a href=index2.php?exe=posts/categorias&delcat='.$cat['id'].'" title="deletar"><img src="ico/no.png" alt="deletar" title="excluir" /></a></td>';
                         echo '<td align="center"><a href=index2.php?exe=posts/categorias-subcreate&idpai='.$cat['id'].'&uri='.$cat['url'].'" title="deletar"><img src="ico/new.png" alt="deletar" title="excluir" /></a></td>';
                    echo '</tr>';

                    $readSubCat = read('up_cat', "WHERE id_pai = '$cat[id]'");
                    if($readSubCat){
                        foreach($readSubCat as $catSub):

                        $catSubTags = ($catSub['tags'] != '' ? 'ico/ok.png' : 'ico/no.png');

                        echo '<tr class="subcat">';
                            echo '<td>&raquo;&raquo;'.$catSub['nome'].'</td>';
                            echo '<td>'.$catSub['content'].'</td>';
                            echo '<td align="center"><img src="'.$catSubTags.'" alt="3 Tags" title="3 Tags" /></td>';
                            echo '<td align="center">'.$catSub['data'].'</td>';
                            echo '<td align="center"><a href="index2.php?exe=posts/categorias-edit&edit='.$catSub['id'].'" title="editar"><img src="ico/edit.png" alt="editar" title="editar" /></a></td>';
                            echo '<td align="center"><a href=index2.php?exe=posts/categorias&delsub='.$catSub['id'].'" title="deletar"><img src="ico/no.png" alt="deletar" title="excluir" /></a></td>';
                        echo '</tr>';
                        endforeach;

                    }

                     endforeach; 
                echo '</table>';
                $link = 'index2.php?exe=posts/categorias&pag=';
                readPaginator('up_Cat',"WHERE id_pai is NULL",$maximo,$link,$pag);
                  } ?>
                
            </div><!-- /bloco cat -->
<?php
        }
    }else{
        header('Location: ../index2.php');
    }
?>