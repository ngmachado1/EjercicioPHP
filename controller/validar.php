<?php

function required($valor){
    if(trim($valor) == ''){
       return false;
    }else{
       return true;
    }
 }

function validaEmail($valor){
    if(filter_var($valor, FILTER_VALIDATE_EMAIL) === FALSE){
       return false;
    }else{
       return true;
    }
 }