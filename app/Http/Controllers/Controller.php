<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getQrCode(?string $code): string
    {
        $qrcode = "data:image/svg+xml;base64," . base64_encode(QrCode::size(300)->style('round')->generate($code));
        return $qrcode;
    }
}
