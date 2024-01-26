<?php

include_once('funcoesCliente.php');

session_start();
extract($_REQUEST, EXTR_SKIP);
if (isset($acao)){
    if($acao == "Incluir"){
        if(isset($nome) && isset($cpf) && isset($tamanho_cabelo) && isset($codservico) && isset($codfuncionario)){
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
            $tamanho_cabelo = htmlspecialchars_decode(strip_tags($tamanho_cabelo));
            $codservico = htmlspecialchars_decode(strip_tags($codservico));
            $codfuncionario = htmlspecialchars_decode(strip_tags($codfuncionario));
        }
    
    if (incluirCliente($nome,$cpf,$tamanho_cabelo,$codservico,$codfuncionario)){
        $_SESSION['msg'] = 'Cliente incluido com sucesso!!'.'<br>';
    }else{
        $_SESSION['msg'] = 'Cliente não foi incluido'.'<br>';
        }

    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
    }
}



if(isset($acao)){
    echo $acao;
    if($acao == "consultarFull"){
        $testaConsulta = consultarListaCliente();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
    if($qtdLinhas == 0){
        echo 'Não existe registros na tabela'.'<br>';
    }else{
        for ($i=0; $i < $qtdLinhas; $i++) { 
            $_SESSION['lista'] = array();
                $linha = mysqli_fetch_assoc($testaConsulta);
                $_SESSION ['lista'] [$i] ['nome'] = $linha['nome'];
                $_SESSION ['lista'] [$i] ['cpf'] = $linha['cpf'];
                $_SESSION ['lista'] [$i] ['tamanho_cabelo'] = $linha['tamanho_cabelo'];
                $_SESSION ['lista'] [$i] ['codfuncionario'] = $linha['codfuncionario'];
                $_SESSION ['lista'] [$i] ['codservico'] = $linha['codservico'];
            }
        }
    }
}
    
if (isset($acao)){
    if ($acao == "Alterar"){
        if(isset($cpf) && isset($nome) && isset($codservico) && isset($codfuncionario)){
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
            $nome = htmlspecialchars_decode(strip_tags($nome));
            $codservico = htmlspecialchars_decode(strip_tags($codservico));
            $codfuncionario = htmlspecialchars_decode(strip_tags($codfuncionario));
        }
        
        if (alterarCliente($cpf,$nome,$codservico,$codfuncionario)){
            $_SESSION['msg'] = 'Cliente alterado com sucesso!!'.'<br>';
        }else{
            $_SESSION['msg'] = 'Cliente não foi alterado'.'<br>';
        }
    }
    $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
}
    
    

if (isset($acao)){
        if ($acao == "consultarCliente"){
             if (isset($cpf)){
                 $cpf = htmlspecialchars_decode(strip_tags($cpf));
                 $testaConsulta = consultarCliente($cpf);
                 $qtdLinhas = mysqli_num_rows($testaConsulta);
                if ($qtdLinhas == 0){
                     echo 'Não existe registros na tabela' . '<br>';
                 }else{
                    $linha = mysqli_fetch_assoc($testaConsulta);
                    $_SESSION ['lista'] [$i] ['nome'] = $linha['nome'];
                    $_SESSION ['lista'] [$i] ['cpf'] = $linha['cpf'];
                    $_SESSION ['lista'] [$i] ['tamanho_cabelo'] = $linha['tamanho_cabelo'];
                    $_SESSION ['lista'] [$i] ['codfuncionario'] = $linha['codfuncionario'];
                    $_SESSION ['lista'] [$i] ['codservico'] = $linha['codservico'];
                    }
                    $path = $_SERVER['HTTP_REFERER'];
                    header("Location: $path");
                
                 }
             }
         }
     



if (isset($acao)){
    if ($acao == "logar"){
         if (isset($cpf) && isset($nome)){
             $cpf = htmlspecialchars_decode(strip_tags($cpf));
             $nome = htmlspecialchars_decode(strip_tags($nome));
             if(logar($cpf, $nome)){
                $_SESSION['msg']="Login efetuado com sucesso";
                
            }else{
               $_SESSION['msg']="Cliente inválido";
            }
             
         }
     }
     $path = $_SERVER['HTTP_REFERER'];
    header("Location: $path");
 }

 if(isset($acao)){
    if($acao == "Sair"){
        session_destroy();
    }
}


 

if (isset($acao)){
    if ($acao == "Excluir"){
        if(isset($cpf)){
            $cpf = htmlspecialchars_decode(strip_tags($cpf));
        }
    
        if(excluirCliente($cpf)){
            $_SESSION['msg']= 'Cliente excluido com sucesso!!'.'<br>';
        }else{
            $_SESSION['msg']= 'Cliente não foi excluido'.'<br>';
        }
    }
    $path = $_SERVER['HTTP_REFERER'];
header("Location: $path");
}




?>