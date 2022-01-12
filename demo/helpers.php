<?php

require __DIR__ . '/../vendor/autoload.php';

use AirPetr\Tabulator;

function printFileData(string $fileName, bool $withHeader = false, string $type = 'simple'): void {
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
    } else {
        $body = $data;
        $header = [];
    }

    switch ($type) {
        case 'plain':
            echo Tabulator::getPlain($body, $header);
            break;
        case 'simple':
            echo Tabulator::getSimple($body, $header);
            break;
        default:
            echo Tabulator::getSimple($body, $header);
    }
}

function printType(string $type): void {
    echo "Table without header:\n\n";
    printFileData('data_no_header.csv', false, $type);

    echo "\n\n";

    echo "Table with header:\n\n";
    printFileData('data.csv', true, $type);

    die();
}
