<?php // example listener.php

require 'ipn_handler.php';

class My_Ipn_Handler extends IPN_Handler
{
    public function process(array $post_data)
    {
        // Let the IPN_Handler do it's processing,
        // which includes validating and fixing the encoding
        $data = parent::process($post_data);

        // Check if validation failed
        if($data === FALSE)
        {
           // header('HTTP/1.0 401 Bad Request', true, 40);
           // exit;
        }

        // Seems it all was good, so in lack of better things to do,
        // let's JSON encode it and dump it to a file
        file_put_contents('ipn.txt', json_encode($data).PHP_EOL, FILE_APPEND);
    }
}

$handler = new My_Ipn_Handler();
$handler->process($_POST);