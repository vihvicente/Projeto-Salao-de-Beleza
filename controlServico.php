<?php

include_once('funcoesServicodebeleza.php');

session_start();
extract($_REQUEST, EXTR_SKIP);
if (isset($acao)){
    if($acao == "Incluir"){
        if(isset($tipo) && isset($servico) && isset($codservico) && isset($preco)){
            $tipo = htmlspecialchars_decode(strip_tags($tipo));
            $servico = htmlspecialchars_decode(strip_tags($servico));
            $codservico = htmlspecialchars_decode(strip_tags($codservico));
            $preco = htmlspecialchars_decode(strip_tags($preco));
        }
    
    if (incluirServico($tipo,$servico,$codservico,$preco)){
         $_SESSION['msg'] = 'Serviço incluido com sucesso!!'.'<br>';
    }else{
         $_SESSION['msg'] = 'Serviço não foi incluido'.'<br>';
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}

if (isset($acao)){
    if ($acao == "Alterar"){
        if(isset($codservico) && isset($servico)){
            $codservico = htmlspecialchars_decode(strip_tags($codservico));
            $servico = htmlspecialchars_decode(strip_tags($servico));
        }
    
        if (alterarServico($codservico,$servico)){
             $_SESSION['msg'] = 'Serviço alterado com sucesso!!'.'<br>';
        }else{
             $_SESSION['msg'] = 'Serviço não foi alterado'.'<br>';
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}


if(isset($acao)){
    echo $acao;
    if($acao == "consultarFull"){
        $testaConsulta = consultarListaServico();
        $qtdLinhas = mysqli_num_rows($testaConsulta);
        if($qtdLinhas == 0){
            $_SESSION['msg'] = 'Não existe registros na tabela'.'<br>';
        }else{
            for ($i=0; $i < $qtdLinhas; $i++) {
                $_SESSION['lista'] = array();
                $linha = mysqli_fetch_assoc($testaConsulta);
                $_SESSION ['lista'] [$i] ['tipo'] = $linha['tipo'];
                $_SESSION ['lista'] [$i] ['servico'] = $linha['servico'];
                $_SESSION ['lista'] [$i] ['codservico'] = $linha['codservico'];
                $_SESSION ['lista'] [$i] ['preco'] = $linha['preco'];
                }
            }
            $path = $_SERVER['HTTP_REFERER'];
            header("Location: $path");
        }
    }

if (isset($acao)){
        if ($acao == "consultarServico"){
             if (isset($codservico)){
                 $codservico = htmlspecialchars_decode(strip_tags($codservico));
                 $testaConsulta = consultarServico($codservico);
                 $qtdLinhas = mysqli_num_rows($testaConsulta);
                 if ($qtdLinhas == 0){
                    $_SESSION['msg'] = 'Não existe registros na tabela' . '<br>';
                 }else{
                    $linha = mysqli_fetch_assoc($testaConsulta);
                    $_SESSION ['lista'] [$i] ['tipo'] = $linha['tipo'];
                    $_SESSION ['lista'] [$i] ['servico'] = $linha['servico'];
                    $_SESSION ['lista'] [$i] ['codservico'] = $linha['codservico'];
                    $_SESSION ['lista'] [$i] ['preco'] = $linha['preco'];
                 }
                  $path = $_SERVER['HTTP_REFERER'];
                    header("Location: $path");
             }
         }
}

if (isset($acao)){
    if ($acao == "Excluir"){
        if(isset($codservico)){
            $codservico = htmlspecialchars_decode(strip_tags($codservico));
        }
    
        if(excluirServico($codservico)){
             $_SESSION['msg'] = 'Serviço excluido com sucesso!!'.'<br>';
        }else{
             $_SESSION['msg'] = 'Serviço não foi excluido'.'<br>';
        }
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path");
    }
}

if (isset($acao)){
    if ($acao == "logar"){
         if (isset($codservico) && isset($servico)){
             $codservico = htmlspecialchars_decode(strip_tags($codservico));
             $servico = htmlspecialchars_decode(strip_tags($servico));
             $testaConsulta = consultarServico($codservico,$servico);
             $qtdLinhas = mysqli_num_rows($testaConsulta);
             if ($qtdLinhas == 0){
                $_SESSION['msg'] = 'Não existe registros na tabela' . '<br>';
             }else{
                 for ($i=0; $i < $qtdLinhas; $i++) {
                     $linha = mysqli_fetch_assoc($testaConsulta);
                     echo '<br>'.'| Tipo: '.$linha['tipo']. '| Serviço: '.$linha['servico']
                        .'| Código do Serviço: '.$linha['codservico']
                        .'| Preço '.$linha['preco'].'<br>';
                 }
             }
         }
     }
 }



?>