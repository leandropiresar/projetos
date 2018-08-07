<?php
require('iniSis.php');
$conn = mysql_connect(HOST,USER,PASS);
$dbsa = mysql_select_db(DBSA);


function create($tabela, array $datas){
    $fields = implode(", ",array_keys($datas));
    $values = "'".implode("', '",array_values($datas))."'";
    $qrcreate = "INSERT INTO {$tabela} ($fields) VALUES ($values)";
    $stCreate = mysql_query($qrCreate);
    if($stCreate){
        return true;
    }
}

function read($tabela, $cond){
    //$where = ($where != NULL ? "WHERE $where" : "");

    $qrRead = "SELECT * FROM {$tabela} {$cond}";
    $stRead = mysql_query($qrRead) or die('erro ao ler'.$tabela.' '.mysql_error());
    $cField = mysql_num_fields($stRead);

        for($y = 0; $y < $cField; $y ++){
            $names[$y] = mysql_field_name($stRead,$y);
            }

        for($x = 0; $res = mysql_fetch_assoc($stRead); $x ++){
                for($i = 0; $i < $cField; $i ++){
                   $resultado[$x][$names[$i]] = $res[$names[$i]]; 
                }
        }
        return $resultado;
}

// deletar banco
function delete($tabela, $where){
    $qrDelete = "DELETE FROM {$tabela} WHERE {$where}";
    $stDelete = mysql_query($qrDelete) or die ('Erro ao deletar em '.$tabela.' '.mysql_error());
}


//update no banco

function update($tabela, array $datas, $where){
    foreach($datas as $fields => $values){
        $campos[] = "'$fields' = '$values'";

    }
    $campos = implode(", ",$campos);
    $qrUpdate = "UPDATE {$tabela} SET $campos WHERE {$where}";
    $stUpdate = mysql_query($qrUpdate) or die (mysql_error());
}

?>