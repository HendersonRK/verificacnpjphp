<?php
function validaCNPJ($cnpj) {
    // remove caracteres não numéricos
    $cnpj = preg_replace('/\D/', '', $cnpj);
    
    // verifica se o cnpj digitado tem 14 digitos
    if(strlen($cnpj) !== 14){
        echo "O CNPJ deve conter 14 digitos <br>";
        return false;
    }

    // elimina CNPJ com todos os digitos iguais (ex.: 00000000000000)
    if (preg_match('/^(\d)\1{13}$/', $cnpj)) {
        return false;
    }

    $digito1 = 0;
    $digito2 = 0;
    $resto = 0;
    $soma = 0;

    //calculo primeiro digito verificador
    $pesos1 = [5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

    for($i = 0; $i < 12; $i++ ) {
        $soma += $cnpj[$i] * $pesos1 [$i];
    }

    $resto = $soma % 11;
    $digito1 = $resto < 2 ? 0 : 11 - $resto;

    //calculo segundo digito verificador
    $pesos2 = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];
    $soma = 0;
    $resto = 0;

    for ($i = 0; $i < 13; $i++) {
        $soma += $cnpj[$i] * $pesos2[$i];
    }
    $resto = $soma % 11;
    $digito2 = $resto < 2 ? 0 : 11 - $resto;

    //verifica se os digitos calculados correspodem aos informados
    return ($cnpj[12] == $digito1 && $cnpj[13] == $digito2);
}
?>