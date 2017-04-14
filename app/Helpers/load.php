<?php
if (!function_exists('load_test')) {

    function load_test($guid, $class)
    {
        $_directory = app_path('Testes');
        $_testfile = $_directory . DIRECTORY_SEPARATOR . $guid . '.php';

        if (!file_exists($_testfile)) {
            return redirect('/');
        }

        $instance = null;

        try {
            include_once $_testfile;
            $instance = new $class;
        } catch (\Exception $e) {
            return redirect('/');
        }

        if ($instance === null) {
            return redirect('/');
        }

        return $instance;
    }

}