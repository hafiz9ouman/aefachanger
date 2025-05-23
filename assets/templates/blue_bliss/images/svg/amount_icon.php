<?php

if (isset($_GET['color']) and $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

$svg = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path d="M86 49c-14.44 0-26 6-26 12v38.66c0 7 11.18 12.34 26 12.34s26-5.31 26-12.34V61c0-6-11.56-12-26-12Zm22 31.5c0 3.94-9.41 8.34-22 8.34s-22-4.4-22-8.34V68.1c4.53 3.41 12.51 5.58 22 5.58s17.47-2.17 22-5.58ZM86 53c12.59 0 22 4.4 22 8.34s-9.41 8.34-22 8.34-22-4.4-22-8.34S73.41 53 86 53Zm0 55c-12.59 0-22-4.4-22-8.34v-12.4c4.53 3.41 12.51 5.58 22 5.58s17.47-2.17 22-5.58v12.4c0 3.94-9.41 8.34-22 8.34ZM59.86 35a7.77 7.77 0 0 1 6 3.08 12.24 12.24 0 0 1 2.6 6.52 2 2 0 0 0 2.2 1.78 2 2 0 0 0 1.78-2.19A16.35 16.35 0 0 0 69 35.54a11.38 11.38 0 0 0-18.19 0 17.08 17.08 0 0 0 0 20.91 20.56 20.56 0 0 0 2.1 2.26 2.06 2.06 0 0 0 1.35.52 2 2 0 0 0 1.48-.66 2 2 0 0 0-.14-2.83 15.47 15.47 0 0 1-1.69-1.82 13.08 13.08 0 0 1 0-15.84A7.78 7.78 0 0 1 59.86 35Z" fill="' . $color . '" opacity="1" data-original="' . $color . '"></path><path d="M54 68H34.83A16.91 16.91 0 0 0 20 53.13v-14A17 17 0 0 0 34.91 24h49.46A17.69 17.69 0 0 0 100 39.88V45a2 2 0 0 0 4 0V22a2 2 0 0 0-2-2H18a2 2 0 0 0-2 2v48a2 2 0 0 0 2 2h36a2 2 0 0 0 0-4Zm46-32.16A13.67 13.67 0 0 1 88.4 24H100ZM30.87 24A12.93 12.93 0 0 1 20 35.12V24ZM20 57.17A12.86 12.86 0 0 1 30.79 68H20ZM54 80H18a2 2 0 0 0 0 4h36a2 2 0 0 0 0-4ZM54 92H18a2 2 0 0 0 0 4h36a2 2 0 0 0 0-4Z" fill="' . $color . '" opacity="1" data-original="' . $color . '"></path></g></svg>';

header('Content-Type: image/svg+xml');
echo $svg;
