<?php

    if(env('MT_MODE') == 'production') {
        $production = true;
    }else {
        $production = false;
    }

    return [        
        'serverKey'=>env('MT_SERVER_KEY'),
        'isProduction' => $production,
        'isSanitized' => true,
        'is3ds'=>true,
    ];