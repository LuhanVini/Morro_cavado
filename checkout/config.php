<?php 

    //Config SANDBOX or PRODUCTION environment
    $SANDBOX_ENVIRONMENT = true;
    
    $PAGSEGURO_API_URL = 'https://ws.pagseguro.uol.com.br/v2';
    if($SANDBOX_ENVIRONMENT){
        $PAGSEGURO_API_URL = 'https://ws.sandbox.pagseguro.uol.com.br/v2';
    }

    $PAGSEGURO_EMAIL = 'morrocavadocafe@gmail.com';
    $PAGSEGURO_TOKEN = '8e073cd4-0057-4fbf-8652-c13003b9f6b2f3125578490c832724760b7bb081f5a86c30-1090-4b2d-8956-ad61927d7287';
?>