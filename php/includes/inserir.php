<?php
include("conexao.php");

function funcao_insert($colunas, $valores, $tabela){
    if(is_array($colunas) and is_array($valores)){
        if(count($colunas) == count($valores)){
            if($conn = conectar()) {
                $sql = "INSERT INTO $tabela (" . implode(",", $colunas) . ") VALUES (" . "'" . implode("','", $valores) . "'" . ");";
                try {
                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "Erro: " . $conn->error . "\n";
                        return false;
                    }
                    $id = mysqli_insert_id($conn);
                    $conn->close();
                    return $id;
                }catch(Exception $e){
                    echo $e->getMessage() . "\n";
                }
            }
            else{
                return;
            }
        }
        else{
            echo "A quantidade de colunas e valores deve ser igual.\n";
            return;
        }
    }
    else{
        echo "Ambos precisam ser arrays.\n";
        return;
    }
}