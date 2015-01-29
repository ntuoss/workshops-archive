<?php
function zip($sourcearray, $destination, $root)
{
    if (!extension_loaded('zip') || file_exists($destination)) {
        return false;
    }
    
    $root = str_replace('\\', '/', $root);

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false; 
    }


    foreach($sourcearray as $source)
    {
        $source = str_replace('\\', '/', realpath($source));
        if (is_dir($source) === true)
        {
            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

            foreach ($files as $file)
            {
                $file = str_replace('\\', '/', $file);

                // Ignore "." and ".." folders
                if( in_array(substr($file, strrpos($file, '/')+1), array('.', '..')) )
                    continue;

                //$file = realpath($file);

                if (is_dir($file) === true)
                {
                
                    $zip->addEmptyDir(ltrim(str_replace($root, '', $file), '/'));
                }
                else if (is_file($file) === true)
                {
                    $zip->addFile($file, ltrim(str_replace($root, '', $file), '/'));
                }
            }
        }
        else if (is_file($source) === true)
        {
            $zip->addFromString(basename($source), file_get_contents($source));
        }
    }

    return $zip->close();
}

$manual = isset($_GET['manual']) ? $_GET['manual'] === 'true' ? true : false : false;
$sourcecode = isset($_GET['sourcecode']) ? $_GET['sourcecode'] === 'true' ? true : false : false;
$bootstrap = isset($_GET['bootstrap']) ? $_GET['bootstrap'] === 'true' ? true : false : false;
$jquery = isset($_GET['jquery']) ? $_GET['jquery'] === 'true' ? true : false : false;

$array = array();
$filename_begin = 'OSS_Web_Development_Workshop(';
$filename = array();
$filename_end = ').zip';

if ($manual)
{
    $array[] = 'manual.pptx';
    $filename[] = 'manual';
}

if ($sourcecode)
{
    $array[] = 'static/';
    $array[] = 'download.php';
    $array[] = 'get.php';
    $array[] = 'index.php';
    $filename[] = 'sourcecode';
}

if ($bootstrap)
{
    $array[] = 'bootstrap/';
    $filename[] = 'bootstrap';
}

if ($jquery)
{
    $array[] = 'jquery/';
    $filename[] = 'jquery';
}

zip($array, './cache/' . $filename_begin . implode(', ', $filename) . $filename_end, dirname(__FILE__));

header('Location: /cache/'. $filename_begin . implode(', ', $filename) . $filename_end);