<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class MidtransService{
    protected $serverKey, $isProduction, $isSanitized, $is3ds;

    public function __construct()
    {
        $this->serverKey = config('midtrans.serverKey');
        $this->isProduction = config('midtrans.isProduction');
        $this->isSanitized = config('midtrans.isSanitized');
        $this->is3ds = config('midtrans.is3ds');

        $this->_configureMidtrans();
    }

    public function _configureMidtrans()
    {
        Config::$serverKey = $this->serverKey;
        Config::$isProduction = $this->isProduction;
        Config::$isSanitized = $this->isSanitized;
        Config::$is3ds = $this->is3ds;
    }

    public function getSnapToken($params) {
        return Snap::getSnapToken($params);
    }
}
