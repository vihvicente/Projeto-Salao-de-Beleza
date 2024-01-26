<?php

include_once('funcoesFuncionario.php');

session_start();
extract($_REQUEST, EXTR_SKIP);
if (isset($acao)){
    if($acao == "Incluir"){
        if(isset($nome) && isset($codfuncionario) && isset($turno)){
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $codfuncionario = htmlspecialchars_decode(strip_tags($codfuncionario));
            $turno = htmlspecialchars_decode(strip_tags($turno));
        }
    
    if (incluirFuncionario($nome,$codfuncionario,$turno)){
        $_SESSION['msg'] = 'Funcionário incluido com sucesso!!'.'<br>';
    }else{
        $_SESSION['msg'] = 'Funcionário não foi incluido'.'<br>';
    }
    
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
    }
}



if (isset($acao)){
    if ($acao == "Alterar"){
        if(isset($codfuncionario) && isset($nome)){
            $codfuncionario = htmlspecialchars_decode(strip_tags($codfuncionario));  
            $nome = htmlspecialchars_decode(strip_tags($nome));          
        }
    
        if (alterarFuncionario($codfuncionario,$nome)){
            echo 'Funcionário alterado com sucesso!!'.'<br>';
        }else{
            echo 'Funcionário não foi alterado'.'<br>';
        }
    }
}

if(isset($acao)){
    echo $acao;
    if($acao == "consultarFull"){
        $testaConsulta = consultarListaFuncionario();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if($qtdLinhas == 0){
            echo 'Não existe registros na tabela'.'<br>';
        }else{
            for ($i=0; $i < $qtdLinhas; $i++) {
                $_SESSION['lista'] = array();
                $linha = mysqli_fetch_assoc($testaConsulta);
                $_SESSION ['lista'] [$i] ['nome'] = $linha['nome'];
                $_SESSION ['lista'] [$i] ['codfuncionario'] = $linha['codfuncionario'];
                $_SESSION ['lista'] [$i] ['turno'] = $linha['turno'];
                }
            }
        }
    }

if (isset($acao)){
    if ($acao == "consultarFuncionario"){
        if (isset($codfuncionario)){
            $codfuncionario = htmlspecialchars_decode(strip_tags($codfuncionario));
            $testaConsulta = consultarFuncionario($codfuncionario);
            $qtdLinhas = mysqli_num_rows($testaConsulta);
            if ($qtdLinhas == 0){
                echo 'Não existe registros na tabela' . '<br>';
            }else{
                for ($i=0; $i < $qtdLinhas; $i++) {
                    $linha = mysqli_fetch_assoc($testaConsulta);
                    $_SESSION ['lista'] [$i] ['nome'] = $linha['nome'];
                    $_SESSION ['lista'] [$i] ['codfuncionario'] = $linha['codfuncionario'];
                    $_SESSION ['lista'] [$i] ['turno'] = $linha['turno'];
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }
    }
}


if (isset($acao)){
    if ($acao == "Excluir"){
        if(isset($nome)){
            $nome = htmlspecialchars_decode(strip_tags($nome));
        }
    
        if(excluirFuncionario($nome)){
            $_SESSION['msg'] = 'Funcionário excluido com sucesso!!'.'<br>';
        }else{
            $_SESSION['msg'] = 'Funcionário não foi excluido'.'<br>';
        }

    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
    }
}


 


?>