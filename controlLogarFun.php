<?php
include_once('funcoesFuncionario.php');

session_start();
extract($_REQUEST, EXTR_SKIP);
if (isset($acao)){
    if ($acao == "logar"){
         if (isset($codfuncionario) && isset($nome)){
             $codfuncionario = htmlspecialchars_decode(strip_tags($codfuncionario));
             $nome = htmlspecialchars_decode(strip_tags($nome));
             if(logar($codfuncionario, $nome)){
                 $_SESSION['msg']="Login efetuado com sucesso";
                 
             }else{
                $_SESSION['msg']="Usuário e senha inválidos";
             }
       }
       $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
 }

if(isset($acao)){
    if($acao == "Sair"){
        session_destroy();
    }
}




?>