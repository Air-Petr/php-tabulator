<?php

require __DIR__ . '/../vendor/autoload.php';

use AirPetr\Tabulator;

function printFileData(string $fileName, bool $withHeader = false): array {
    $data = [];

    if (($open = fopen(__DIR__ . '/' . $fileName, 'r')) !== false) {
        while (($row = fgetcsv($open, 1000, ",")) !== false) {
            $data[] = $row;
        }

        fclose($open);
    }

    if ($withHeader) {
        $body = array_slice($data, 1);
        $header = array_slice($data, 0, 1)[0];
        echo Tabulator::get($body, $header);
    } else {
        echo Tabulator::get($data);
    }

    die();
}
