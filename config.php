<?php

$env_filename = __DIR__ . "\\.env";

if (file_exists($env_filename)) {
    $env = file_get_contents($env_filename);
    $env_lines = explode("\n", $env);

    foreach ($env_lines as $line) {
        $key = trim(explode("=",$line)[0]);
        $value = trim(explode("=",$line)[1]);

        if (!empty($key) && !empty($value)) {
            putenv("$key=$value");
        }
    }
}