<?php

    function python($code) {
        $file = "/temp/main.py";
        file_put_contents($file, $code);

        $output = null;
        $return = null;

        exec("python3 $file 2>&1", $output, $return);

        unlink($file);

        if ($return !== 0) {
            return "Error: ".trim(implode("\n", $output));
        }

        return trim(implode("\n", $output));
    }
