<?php

// Função para criar um token aleatório
function random_str_generator ($len_of_gen_str){
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $random_str = '';
    $var_size = strlen($chars);
    for( $x = 0; $x < $len_of_gen_str; $x++ ) {
        $random_str .= $chars[ rand( 0, $var_size - 1 ) ];
    }
  
    return $random_str;
}
