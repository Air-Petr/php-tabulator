<?php

require __DIR__ . '/../vendor/autoload.php';

use AirPetr\Tabulator;

function getCSV(): array {
    $data = [];

    if (($open = fopen(__DIR__ . '/mock_data.csv', 'r')) !== false) {
        while (($row = fgetcsv($open, 1000, ",")) !== false) {
            $data[] = $row;
        }

        fclose($open);
    }

    return $data;
}

$data = getCSV();
echo Tabulator::get($data);
die();
