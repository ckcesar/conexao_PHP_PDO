<?php

include('classe/Conexao.php');

$con = new Conexao();

if($con){

    $gravar = $con->Executar("insert into `estado` (estado,sigla) values('Nome teste','ST')");

    if($gravar){
        echo"Gravou";
    }else{
        echo"Erro!....";
    }

}