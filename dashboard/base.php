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

function generate_sidebar() {
    echo
'<sidebar>
<!-- Astolfo is a placeholder until we have an icon -->
<div id="sidebar:sign">
    <img src="/image/astolfo.png" id="sign:icon">
    <span id="sign:name">Pamacs</span>
</div>
<hr/>
<a href="" class="sidebar-btn"><span class="material-icons">space_dashboard</span><span>Containers</span></a>
<a href="" class="sidebar-btn"><span class="material-icons">person</span><span>User</span></a>
<a href="https://github.com/Pamacs/" class="sidebar-btn"><span class="material-icons">code</span><span>Src</span></a>

<a href="" class="sidebar-btn logout-btn"><span class="material-icons">logout</span><span>Logout</span></a>
</sidebar>';
}

function end_dom() {
    echo '</html>';
}

?>