<?php
if (!function_exists('aleatorio')) {

    /**
     * Retorna um item aleatório do array
     * @param array $items
     * @return mixed
     */
    function aleatorio(array $items)
    {
        return $items[mt_rand(0, sizeof($items) - 1)];
    }

}