<?php

include_once('funcaoUsuario.php');
include_once('funcoesData.php');

session_start();
extract($_REQUEST, EXTR_SKIP);
if (isset($acao)){
    if($acao == "Incluir"){
        if(isset($login) && isset($senha) && isset($nome) && isset($perfil) && isset($dataNasc)){
            $login = htmlspecialchars_decode(strip_tags($login));
            $senha = htmlspecialchars_decode(strip_tags($senha));
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $perfil = htmlspecialchars_decode(strip_tags($perfil));
            $dataNasc = htmlspecialchars_decode(strip_tags($dataNasc));
        }
        if (!validar_data($dataNasc)){
            echo 'Data informada é inválida !!'.'<br>';
        }else{
            if (incluirUsuario($login,$senha,$nome,$perfil,$dataNasc)){
                $_SESSION['msg'] = 'Usuário incluido com sucesso!!'.'<br>';
            }else{
                $_SESSION['msg'] =  'Usuário não foi incluido'.'<br>';
            }
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}




if (isset($acao)){
    if ($acao == "Alterar Senha"){
        if(isset($login) && isset($senha)){
            $login = htmlspecialchars_decode(strip_tags($login));
            $senha = htmlspecialchars_decode(strip_tags($senha));
            if (alterarSenha($login,$senha)){
                $_SESSION['msg'] = "Senha alterada com sucesso";
            }else{
                $_SESSION['msg'] = "Senha não foi alterada";
            }   
        } 
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}



if (isset($acao)){
    if ($acao == "Excluir"){
        if(isset($nome)){
            $nome = htmlspecialchars_decode(strip_tags($nome));
            if(excluirUsuario($nome)){
                $_SESSION['msg'] = 'Usuário excluido com sucesso!!'.'<br>';
            }else{
                $_SESSION['msg'] = 'Usuário não foi excluido'.'<br>';
            }   
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}





if(isset($acao)){
    echo $acao;
    if($acao == "consultarFull"){
        $testaConsulta = consultarListaUsuario();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if($qtdLinhas == 0){
            $_SESSION['msg'] = 'Não existe registros na tabela';
        }else{
            $_SESSION['lista'] = array();
            for ($i=1; $i <= $qtdLinhas; $i++) { 
                $_SESSION['lista'] ['linha'] = array();
                $linha = mysqli_fetch_assoc($testaConsulta);
                $_SESSION ['lista'] [$i] ['Login'] = $linha['Login'];
                $_SESSION ['lista'] [$i] ['Nome'] = $linha['Nome'];
                $_SESSION ['lista'] [$i] ['dataNasc'] =formatarDataTela($linha['dataNasc']);
                $_SESSION ['lista'] [$i] ['Perfil'] = $linha['Perfil'];
            } 
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}

if(isset($acao)){
    if ($acao == 'Nova Consulta'){
        session_destroy();
    }
}



if (isset($acao)){
   if ($acao == "consultarUsuario"){
        if (isset($login)){
            $login = htmlspecialchars_decode(strip_tags($login));
            $testaConsulta = consultarUsuario($login);
            $qtdLinhas = mysqli_num_rows($testaConsulta);
            if ($qtdLinhas == 0){
                $_SESSION['msg'] ='Não existe registros na tabela' . '<br>';
            }else{
                $_SESSION['lista'] = array();
                $linha = mysqli_fetch_assoc($testaConsulta);
                $_SESSION ['lista'] [$i] ['Login'] = $linha['Login'];
                $_SESSION ['lista'] [$i] ['Nome'] = $linha['Nome'];
                $_SESSION ['lista'] [$i] ['dataNasc'] =formatarDataTela($linha['dataNasc']);
                $_SESSION ['lista'] [$i] ['Perfil'] = $linha['Perfil'];
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }
    }









?>