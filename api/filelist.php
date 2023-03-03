<?php 
header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Credentials: true ");
// header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
// header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");

function getDirContents($dir, $filter = '', &$results = array()) {
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value); 

        if(!is_dir($path)) {
            if(empty($filter) || preg_match($filter, $path)) $results[] = $path;
        } elseif($value != "." && $value != "..") {
            getDirContents($path, $filter, $results);
        }
    }

    return json_encode($results);
} 

// Simple Call: List all files
echo getDirContents('../portfolio/graphic');
?>