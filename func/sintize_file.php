<?php
function sintize_filename($filename){
    echo $filename;
$arquivo  = preg_replace('/[^a-zA-Z0-9.]/', '', $filename);
return $arquivo;
}