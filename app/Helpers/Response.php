<?php

function ResponseOK($code, $data){
    return response()->json([
        'status' => $code,
        'result' => $data
    ]);
}