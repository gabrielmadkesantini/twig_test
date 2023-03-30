<?php
function verifica_nome_arquivo($caminho, $arquivo){
    if(!file_exists($caminho . $arquivo)){
return $arquivo;
    }

$separado = explode('.', $arquivo);
$ext = array_pop($eparado);
$arquivo = implode('.', $separado);

$i = 0;
while(file_exists("{$caminho}{$arquivo}{$i}.{$ext}")){
$i++;
}
return "{$arquivo}{$i}.{$ext}";
}