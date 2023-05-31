<?php

namespace App\Actions;

class VAT
{
    private static function createUrl($country, $vatNumber): string
    {
        return "https://controleerbtwnummer.eu/api/validate/" . $country .  $vatNumber . ".json";
    }

    public static function check($country, $vatNumber)
    {
        try {
            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, self::createUrl($country, $vatNumber));
            curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($request);
            curl_close($request);
            return json_decode($response, true);
        } catch (\Exception $e) {
            return null;
        }
    }
}
