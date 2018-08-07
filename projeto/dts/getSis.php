<?php 
//get usuario
function getUser($user, $nivel = NULL){
    if($nivel != NULL){
        $readUser = read('up_users',"WHERE id = '$user'");
        if($readUser){
            foreach($readUser as $usuario);
            if($usuario['nivel'] <= $nivel && $usuario['nivel'] != '0' && $usuario['nivel'] <= '4'){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return true;
    }
}



?>