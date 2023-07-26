<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $command = 'python ' . base_path('app/python/example.py');
        $output = shell_exec($command);

        return $output;
    }

    public function calculateDistance(Request $request)
    {
        // Mampang Prapatan Latitude:	-6.250614
        // Mampang Prapatan Longitude:	106.820788

        // Kemang Village Latitude:	-6.258045
        // Kemang Village Longitude:	106.808246

        // Mampang, Jakarta Selatan:

        // Latitude: -6.2588
        // Longitude: 106.8422
        // Indramayu, Jawa Barat:

        // Latitude: -6.3356
        // Longitude: 108.3190

        $lat1 = -6.250614; // Latitude titik pertama
        $lng1 = 106.820788; // Longitude titik pertama
        $lat2 = -6.258045; // Latitude titik kedua
        $lng2 = 106.808246; // Longitude titik kedua

        $earthRadius = 6371; // Radius bumi dalam kilometer

        // Mengubah derajat menjadi radian
        $lat1Rad = deg2rad($lat1);
        $lng1Rad = deg2rad($lng1);
        $lat2Rad = deg2rad($lat2);
        $lng2Rad = deg2rad($lng2);

        // Menghitung selisih antara latitude dan longitude
        $latDiff = $lat2Rad - $lat1Rad;
        $lngDiff = $lng2Rad - $lng1Rad;

        // Menghitung jarak menggunakan formula Haversine
        $distance = 2 * $earthRadius * asin(sqrt(pow(sin($latDiff / 2), 2) + cos($lat1Rad) * cos($lat2Rad) * pow(sin($lngDiff / 2), 2)));

        return response()->json(['distance' => $distance . ' kilometers']);
    }
}
