<?php

#Funções Cliente-----------------

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

function incluirCliente($nome,$cpf,$tamanho_cabelo,$codservico,$codfuncionario){
    if (is_string($nome) && is_numeric($cpf) && is_string($tamanho_cabelo) && is_numeric($codservico) && is_numeric($codfuncionario)){
        
        $c = conectarBanco();
        $sql = "INSERT INTO cliente (nome,cpf,tamanho_cabelo,codservico,codfuncionario)
                        VALUES  ('$nome','$cpf','$tamanho_cabelo','$codservico','$codfuncionario');";
        $result = mysqli_query($c, $sql);

    if ($result){
        #echo "\n".'Registro incluido com sucesso!';
        return true;
    }else{
        $msg = mysqli_error($c);
        #echo "\n".'Inclusão bugada! '.$msg;
        return false;
        }

    }else{
        echo "\n".'Parâmetros invalidos!';
        return false;
        }
}


function alterarCliente($cpf,$nome,$codservico,$codfuncionario){

    if ( is_numeric($cpf) && is_string($nome) && is_numeric($codservico) && is_numeric($codfuncionario)){
        $c = conectarBanco();
        $sql = "UPDATE cliente SET nome = '$nome', codservico = '$codservico', codfuncionario = '$codfuncionario' WHERE cpf = '$cpf';";
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



function excluirCliente($cpf){
        if( is_numeric($cpf)){
            $c = conectarBanco();
        
            $sql = "DELETE FROM cliente WHERE cpf = $cpf;";
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

function logar($cpf,$nome){
    if (is_numeric($cpf) && is_string($nome)){
        $c = conectarBancoUsuario();
        $sql = "SELECT * FROM cliente WHERE cpf = $cpf AND nome = $nome;";
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


function consultarListaCliente(){
    $c = conectarBanco();
    $consulta = mysqli_query($c, "SELECT nome,cpf,codfuncionario,codservico FROM cliente");
    return $consulta;
    }


function consultarCliente($cpf){
        if (is_numeric($cpf)){
            $c = conectarBanco();
            $result = mysqli_query($c, "SELECT nome,cpf,codfuncionario,codservico FROM cliente WHERE cpf = '$cpf';");
            return $result;
        }else{
            return false;
    }
}

















?>