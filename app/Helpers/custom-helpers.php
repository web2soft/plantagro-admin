<?php

if(!function_exists('format_currency')) {
    function format_currency($price)
    {
        $price = str_replace('.', '', $price);
        $price = str_replace(',', '.', $price);
        return $price;
    }
}