<?php

function conectarBanco(){
    $c = mysqli_connect("localhost","root", "", "salaodebeleza");
    if (mysqli_connect_errno()==0){
        echo "\n".'Conexão ok!';
    }else{
        $msg = mysqli_connect_error();
        echo "\n".'Erro na conexão SQL!';
        echo "\n".'O MySQL retornou a seguinte mensagem'.$msg;
    }
    return $c;
}

function incluirFuncionario($nome,$codfuncionario,$turno){
    if (is_string($nome) && is_numeric($codfuncionario) && is_string($turno)){
        
        $c = conectarBanco();
        $sql = "INSERT INTO funcionario (nome,codfuncionario,turno)
                        VALUES  ('$nome','$codfuncionario','$turno');";
        $result = mysqli_query($c, $sql);

    if ($result){
        return true;
    }else{
        $msg = mysqli_error($c);
        echo "\n".'Inclusão bugada! '.$msg;
        return false;
        }

    }else{
        echo "\n".'Parâmetros invalidos!';
        return false;
    }
}


function alterarFuncionario($codfuncionario,$nome){

    if (is_numeric($codfuncionario) && is_string($nome)){
        $c = conectarBanco();
        $sql = "UPDATE funcionario SET nome = '$nome' WHERE codfuncionario = '$codfuncionario';";
        $result = mysqli_query($c, $sql);
    
        if (mysqli_affected_rows($c) == 0){
            return false;
        }else{
            return true;
        }
    
    }else{
        echo "\n".'Parâmetros informados incorretos';
        return false;
    }
    
    
    }




function excluirFuncionario($nome){
        if( is_string($nome)){
            $c = conectarBanco();
            $sql = "DELETE FROM funcionario WHERE nome = '$nome';";
            $result = mysqli_query($c,$sql);
        if ($result == TRUE){
            return true;
        }else{
            return false;
        }
        
        }else{
            echo "\n".'Parâmetros informados incorretos!';
            return false;
        }
}



function consultarListaFuncionario(){
    $c = conectarBanco();
    $consulta = mysqli_query($c,"SELECT nome,codfuncionairio,turno FROM  funcionario");
    return $consulta;
    }


function consultarFuncionario($codfuncionario){
    if (is_numeric($codfuncionario)){
        $c = conectarBanco();
        $result = mysqli_query($c, "SELECT nome,codfuncionairio,turno FROM  funcionario  WHERE codfuncionario = '$codfuncionario';");
        return $result;
    }else{
        return false;
    }
}

function logar($codfuncionario,$nome){
    if (is_numeric($codfuncionario) && is_string($nome)){
        $c = conectarBanco();
        $sql = "SELECT * FROM funcionario WHERE codfuncionario = $codfuncionario AND nome = $nome;";
        $consulta = mysqli_query($c,$sql);
        if (mysqli_num_rows($consulta) == 0){
            return false;
        }else{
            return true;
        }
            
    }else{
        echo"\n"."Parâmetros invalidos!";
        return false;
    }
}

?>