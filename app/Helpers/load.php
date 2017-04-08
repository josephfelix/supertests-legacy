<?php
if (!function_exists('load_test')) {

    function load_test($guid = '')
    {
        $_directory = app_path('Testes');
        $_testfile = $_directory . DIRECTORY_SEPARATOR . $guid . '.php';

        if (!file_exists($_testfile)) {
            return redirect('/');
        }

        $instance = null;

        try {
            include_once $_testfile;
            $classes = get_declared_classes();
            $class = end($classes);
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