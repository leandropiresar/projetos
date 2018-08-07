<?php
if (function_exists(getUser)){
    if(!getUSer($_SESSION['autUser']['id'],'1')){
        echo '<span class="ms al">Desculpe, você não tem permissão para gerenciar as categorias</span>';
    }else{

?>
        	
            <div class="bloco form" style="display:block">
            	<div class="titulo">
                    Criar Categoria:
                    <a href="index2.php?exe=posts/categorias" title="Voltar" class="btnalt" style="float:right">Voltar</a>
                    </div>

                    <?php 
                    if(isset($_POST['sendForm'])){
                        $f['nome'] = htmlspecialchars(mysql_real_escape_String($_POST['nome']));
                        $f['content'] = htmlspecialchars(mysql_real_escape_String($_POST['content']));
                        $f['tags'] = htmlspecialchars(mysql_real_escape_String($_POST['tags']));
                        $f['date'] = htmlspecialchars(mysql_real_escape_String($_POST['data']));
                            if(in_array('',$f)){
                                echo '<span class="ms in">Para uma boa alimentação, preencha todos os campos.</span>';
                            }else{
                                $f['data'] = formDate($f['date']); 
                                unset($f['date']);
                                $f['url'] = setUri($f['nome']);
                                $readCatUri = read('up_cat',"WHERE url LIKE '%$f[url]%'");
                                    if($readCatUri){
                                        $f['url'] = $f['url'].'-'.time();
                                    }
                                create('up_cat',$f);
                               $_SESSION['return'] = '<span class="ms ok">Categoria cadastrada com sucesso!</span>';
                                header('Location: index2.php?exe=posts/categorias-edit&edit='.$urledit);
                            }

                    }elseif(!empty($_SESSION['return'])){
                        echo $_SESSION['return'];
                        unset($_SESSION['return']);
                    }
                    ?>
                
                <form name="formulario" action="" method="post">
                    <label class="line">
                    	<span class="data">Nome:</span>
                        <input type="text" name="nome" value="<?php if($f['nome']) echo $f['nome']; ?>" />
                    </label>

                    
                    <label class="line">
                    	<span class="data">Descrição:</span>
                        <textarea name="content" rows="10"><?php if($f['content']) echo $f['content']; ?></textarea>
                    </label>

                    <label class="line">
                    	<span class="data">Tags:</span>
                        <input type="text" name="tags" value="<?php if($f['tags']) echo $f['tags']; ?>" />
                    </label>

                    <label class="line">
                    	<span class="data">Data:</span>
                        <input type="text" name="data" value="<?php if($f['date']){ echo $f['date'];}else{ echo date('d/m/Y H:i:s');} ?>" />
                    </label>
                    
                    
                    <input type="submit" value="send" name="sendForm" class="btn" />
                    
                </form>
                	
            </div><!-- /bloco form -->
<?php
        }
    }else{
        header('Location: ../index2.php');
    }
?>       