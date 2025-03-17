<?php

namespace App\Helpers;

use DateTime;
use IntlDateFormatter;

if (!function_exists('formatTanggalIndonesia')) {
    function formatTanggalIndonesia($tanggal)
    {
        $dateTime = DateTime::createFromFormat('Y-m-d', $tanggal);
        if (!$dateTime) {
            return "Format tanggal tidak valid";
        }

        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        return $formatter->format($dateTime);
    }
}
