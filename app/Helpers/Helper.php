<?php

use Symfony\Component\Console\Logger\ConsoleLogger;

function number_convert($string)
{
    $mm = ['၀','၁', '၂', '၃', '၄', '၅', '၆','၇','၈','၉'];
    $lang = config('app.locale');
    $num = range(0, 9);
    switch ($lang) {
        case 'mm':
            return str_replace($num, $mm, $string);
            break;

        case 'en':
            return str_replace($mm, $num, $string);
            break;

        default:
            return $string;
            break;
    }        
}
 