<?php

    function php($code) {
        $file = "/temp/main.php";
        file_put_contents($file, $code);

        $output = null;
        $return = null;

        exec("php $file 2>&1", $output, $return);

        unlink($file);

        if ($return !== 0) {
            return "Error: ".trim(implode("\n", $output));
        }

        return trim(implode("\n", $output));
    }
