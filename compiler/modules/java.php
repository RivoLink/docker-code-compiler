<?php

    function java($code) {
        $file = "/temp/Main.java";
        file_put_contents($file, $code);

        $output = null;
        $return = null;

        exec("javac $file 2>&1", $output, $return);

        if ($return !== 0) {
            unlink($file);
            return "Error: ".trim(implode("\n", $output));
        }

        $className = basename($file, ".java");

        $output = null;
        $return = null;

        exec("java -cp /temp $className 2>&1", $output, $return);

        unlink($file);
        unlink("/temp/$className.class");

        if ($return !== 0) {
            return "Error: ".trim(implode("\n", $output));
        }

        return trim(implode("\n", $output));
    }
