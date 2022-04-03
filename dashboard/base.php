<?php

function generate_head(string $title, array $stylesheets = []) {

    $sheets = ['base'];
    $sheetstr = '';

    $sheets = [...$sheets, ...$stylesheets];

    foreach ($sheets as $sheet) {
        $sheet = str_ends_with($sheet, ".css") ? $sheet : $sheet.'.css';
        $sheetstr .= "    <link rel=\"stylesheet\" href=\"/css/{$sheet}\">\n";
    }

    $dom = // don't worry, this is ugly on purpose
'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
'.$sheetstr.
'    <title>'.$title.'</title>
</head>
';

    echo $dom;
}

function create_sidebar() {
    echo
'';
}

function end_dom() {
    echo '</html>';
}

?>