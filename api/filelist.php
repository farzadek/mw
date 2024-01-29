<?php
header("Access-Control-Allow-Origin: https://montrealweb.ca");
$category = $_GET['cat'];
function getDirContents($dir, $filter = '', &$results = array())
{
    $files = scandir($dir);
    array_splice($files, 0, 3);
    shuffle($files);
    $i = 0;
    $result = [];
    while ($i < sizeof($files)) {
        $tmp = getimagesize($dir . '/' . $files[$i]);
        array_push($result, (object)[
            'url' => $files[$i],
            'width' => $tmp[0],
            'height' => $tmp[1],
        ]);
        $i++;
    }
    return json_encode($result);
}
echo getDirContents('../portfolio/' . $category);
