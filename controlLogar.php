<?php
include_once('funcaoUsuario.php');

session_start();
extract($_REQUEST, EXTR_SKIP);
if (isset($acao)){
    if ($acao == "logar"){
         if (isset($login) && isset($senha)){
             $login = htmlspecialchars_decode(strip_tags($login));
             $senha = htmlspecialchars_decode(strip_tags($senha));
             if(logar($login, $senha)){
                 $_SESSION['msg']="Login efetuado com sucesso";
                 $_SESSION['login'] = $login;
             }else{
                $_SESSION['msg']="Usuário e senha inválidos";
             }
       }
    }
 }

if(isset($acao)){
    if($acao == "Sair"){
        session_destroy();
    }
}
$path = $_SERVER['HTTP_REFERER'];
header("Location: $path");

?>