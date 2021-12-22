<?php

require __DIR__ . '/../vendor/autoload.php';

use AirPetr\Tabulator;

function printFileData(string $fileName): array {
    $data = [];

    if (($open = fopen(__DIR__ . '/' . $fileName, 'r')) !== false) {
        while (($row = fgetcsv($open, 1000, ",")) !== false) {
            $data[] = $row;
        }

        fclose($open);
    }

    echo Tabulator::get($data);
    die();
}
