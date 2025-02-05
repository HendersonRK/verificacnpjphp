<?php
require 'config.php';
require 'src/funcitons.php';//busca funções na pasta SRC arquivo functions.php

    echo "<h1>Bem-vindo ao $siteName</h1>";

    $cnpjTeste = "00.894.821/0001-19";

    if(validaCNPJ($cnpjTeste)){
        echo "CNPJ válido";
        exit;
    } 
       
    echo "CNPJ inválido";
?>