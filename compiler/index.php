<?php

    header("Content-Type: text/plain");

    foreach (glob(__DIR__."/modules/*.php") as $file) {
        require_once $file;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (!is_int(strpos($_SERVER["CONTENT_TYPE"], "application/json"))) {
            die("Error: Invalid request.".PHP_EOL);
        }

        $data = json_decode(file_get_contents("php://input"), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            die("Error: Invalid JSON input.".PHP_EOL);
        }

        $code = $data["code"] ?? "";
        $lang = $data["lang"] ?? "";

        if ($lang && function_exists(strtolower($lang))) {
            $result = strtolower($lang)($code);
        } else {
            $result = "Error: Unsupported language.";
        }

        echo $result.PHP_EOL;
    }
