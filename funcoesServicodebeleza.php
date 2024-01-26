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


function incluirServico($tipo,$servico,$codservico,$preco){
    if (is_string($tipo) && is_string($servico) && is_numeric($codservico) && is_numeric($preco)){
        
        $c = conectarBanco();
        $sql = "INSERT INTO servicodebeleza (tipo,servico,codservico,preco)
                        VALUES  ('$tipo','$servico','$codservico','$preco');";
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


function alterarServico($codservico,$servico){

    if (is_numeric($codservico) && is_string($servico)){
        $c = conectarBanco();
        $sql = "UPDATE servicodebeleza SET servico = '$servico' WHERE codservico = '$codservico';";
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


function excluirServico($codservico){
        if( is_numeric($codservico)){
            $c = conectarBanco();
            $sql = "DELETE FROM servicodebeleza WHERE codservico = '$codservico';";
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


function consultarListaServico(){
    $c = conectarBanco();
    $sql = "SELECT * FROM servicodebeleza;";
    $consulta = mysqli_query($c,$sql);
    return $consulta;
    }

function consultarServico($codservico){
        if (is_numeric($codservico)){
            $c = conectarBanco();
            $sql = "SELECT * FROM servicodebeleza WHERE codservico = '$codservico';";
            $result = mysqli_query($c, $sql);
            return $result;
        }else{
            return false;
    }
}

function logar($codservico,$servico){
    if (is_numeric($codservico) && is_string($servico)){
        $c = conectarBancoUsuario();
        $sql = "SELECT * FROM servicodebeleza WHERE codservico = $codservico AND servico = $servico;";
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