<?php 
function extractFields($store, $needles){
    foreach($needles as $needle){
        $res[$needle]=trim($store[$needle]);
    }
    return $res;
}