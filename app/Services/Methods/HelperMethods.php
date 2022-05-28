<?php
namespace App\Services\Methods;
use Carbon\Carbon;

class HelperMethods {
    public function printDate(mixed $date): string
    {
        return Carbon::parse($date)->toFormattedDateString();
    }
}
