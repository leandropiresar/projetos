<?php

//valida email----------------

function validMail($email){
    if(preg_match('/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/',$email)){
        return true;
    }else{
        return false;
    }
}

//paginacao results

function readPaginator($tabela,$cond,$maximos,$link,$pag,$width = NULL,$maxlinks = 4){
    $readPaginator = read("$tabela","$cond");
    $total = count($readPaginator);
    if($total > $maximos){
        $paginas = ceil($total/$maximos);
        if($width){
            echo '<div class="paginator" style="width:'.$width.'">';
        }else{
            echo '<div class="paginator">';
        }
        echo '<a href="'.$link.'1">Primeira Página</a>';
        for($i = $pag - $maxlinks; $i <= $pag -1; $i++){
            if($i >=1){
                echo '<a href="'.$link.$i.'</a>&nbsp;&nbsp;&nbsp;';
            }
        }
        echo '<span class="atv">'.$pag.'</span>&nbsp;&nbsp;&nbsp;';
        for($i = $pag + 1; $i <= $pag + $maxlinks; $i++){
            if($i <= $paginas){
                echo '<a href="'.$link.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
            }
        }
    }


}

//image upload

function uploadImage($tmp, $nome, $width, $pasta){
    $ext = substr($nome,-3);

    switch($ext){
        case 'jpg': $img = imagecreatefromjpeg($tmp); break;
        case 'png': $img = imagecreatefrompng($tmp); break;
        case 'gif': $img = imagecreatefromgif($tmp); break;
    }

    $x = imagesx($img);
    $y = imagesy($img);
    $height = ($width*$y) / $x;
    $nova = imagecreatetruecolor($width, $height);

    imagealphablending($nova,false);
    imagesavealpha($nova,true);
    imagecopyresampled($nova, $img, 0, 0, 0, 0, $width, $height, $x, $y);

    switch($ext){
        case 'jpg': $img = imagejpeg($nova, $pasta.$nome,100); break;
        case 'png': $img = imagepng($nova, $pasta.$nome); break;
        case 'gif': $img = imagegif($nova, $pasta.$nome); break;

    }
    imagedestroy($img);
    imagedestroy($nova);
}