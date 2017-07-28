<?php

// Via https://stackoverflow.com/questions/17160696/php-glob-scan-in-subfolders-for-a-file
// Does not support flag GLOB_BRACE
function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags);
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

$files = rglob("db.xml");
$i = 0;
foreach($files as $f) {
  preg_match_all('/table name="(.*?)"/', file_get_contents($f), $res);
  foreach($res[0] as $r) {
    $tmp = preg_replace('/table name="(.*?)"/', '$1', $r);
    echo "RENAME TABLE " . strtolower($tmp) . " TO " . $tmp . ";<br />";
  }
}

?>
