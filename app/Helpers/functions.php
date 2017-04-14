<?php
if (!function_exists('sortear')) {

    /**
     * Sorteia um ítem do array
     * @param array $data
     * @return mixed
     */
    function sortear(array $data)
    {
        return $data[mt_rand(0, sizeof($data) - 1)];
    }

}

if (!function_exists('roboto')) {

    /**
     * Retorna a fonte roboto
     * @return string
     */
    function roboto()
    {
        return public_path('/fonts/roboto/Roboto-Bold.ttf');
    }

}