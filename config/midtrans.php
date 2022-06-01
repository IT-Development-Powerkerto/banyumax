<?php

    $serverKey = "";
    if(env('MT_MODE') == 'production') {
        $production = true;
        $serverKey = env('MT_SERVER_KEY');
    }else {
        $production = false;
        $serverKey = env('MT_SBX_SERVER_KEY');
    }

    return [        
        'serverKey' => $serverKey,
        'isProduction' => $production,
        'isSanitized' => true,
        'is3ds' => true,
    ];