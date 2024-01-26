<?php

include_once('funcoesData.php');

function conectarBancoUsuario(){
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

function incluirUsuario($login,$senha,$nome,$perfil, $dataNasc){
    if (is_numeric($login) && is_numeric($senha) && is_string($nome) && is_numeric($perfil) && validar_data($dataNasc)) {
        $c = conectarBancoUsuario();
        $dataNasc = formatardataBancoEnvio($dataNasc);
        $sql = "INSERT INTO usuario (Login,Senha,Nome,Perfil,dataNasc)
                VALUES  ('$login','$senha','$nome','$perfil','$dataNasc');";
        $result = mysqli_query($c, $sql);

    if ($result){
        return true;
    }else{
        $msg = mysqli_error($c);
        return false;
        }

    }else{
        echo "\n".'Parâmetros invalidos!';
        return false;
    }
        
}


function alterarSenha($login,$senha){
    if( is_numeric($login) && is_string($senha)){
        $c = conectarBancoUsuario();
        $sql = "UPDATE usuario SET senha = '$senha' WHERE login = '$login';";
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




function excluirUsuario($nome){
    if( is_string($nome)){
        $c = conectarBancoUsuario();
        $sql = "DELETE FROM usuario WHERE nome = '$nome';";
        $result = mysqli_query($c,$sql);

        if (mysqli_affected_rows($c) == 0){
            return false;
        }else{
            return true;
        }

 

    }else{
        echo "\n".'Parâmetros informados incorretos!';
        return false;
    }
}



function logar($login,$senha){
    if (is_numeric($login) && is_numeric($senha)){
        $c = conectarBancoUsuario();
        $sql = "SELECT * FROM usuario WHERE Login = $login AND senha = $senha;";
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

function consultarListaUsuario(){
    $c = conectarBancoUsuario();
    $consulta = mysqli_query($c, "SELECT Login,Nome,Pefil,dataNasc FROM usuario");
    return $consulta;
}


function consultarUsuario($login){
    if (is_numeric($login)){
        $c = conectarBancoUsuario();
        $result = mysqli_query($c, "SELECT Login,Nome,Perfil,dataNasc from usuario WHERE Login = '$login';");
        return $result;
    }else{
        return false;
    }
}




?>