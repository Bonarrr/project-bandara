<?php

namespace App\Http\Controllers;

use App\Models\FlightInfo;
use App\Models\Airport; // Tambahkan model Airport
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function fetchData(Request $request)
    {
        $apiKey = config('services.api.api_key');
        $baseUrl = config('services.api.base_url');
        $arrdep = $request->query('type', 'D');

        // Ambil daftar bandara dari database dan simpan dalam array asosiatif
        $cityNames = Airport::pluck('airport_location', 'airport_iata')->toArray();

        // Request ke API
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'api_key' =>  $apiKey, 
        ])->post($baseUrl, [
            'airportcode' => 'YIA',
            'arrdep' => $arrdep,
            'schedule' => now()->format('Y-m-d')
        ]);

        if ($response->failed()) {
            return view('api_response', ['error' => 'API request failed!']);
        }

        $flightNo = $request->get('flight_no');

        $data = $response->json();

        // Ubah kode bandara ke nama kota
        foreach ($data['FlightInfoMyInspection'] as &$flight) {
            $airportCode = strtoupper($flight['fromto']); // Pastikan kode bandara uppercase
            $flight['fromto'] = $cityNames[$airportCode] ?? $airportCode; // Ganti dengan nama kota jika ada
        }

        if ($flightNo){
            $data['FlightInfoMyInspection'] = array_filter($data['FlightInfoMyInspection'], function($flight) use ($flightNo){
                return strpos($flight['flightno'], strtoupper($flightNo)) !==false;
            });
        }

        return view('welcome.flight', compact('data', 'arrdep'));
    }

    public function fetchHomeFlights()
    {
        $apiKey = config('services.api.api_key');
        $baseUrl = config('services.api.base_url');

        $cityNames = Airport::pluck('airport_location', 'airport_iata')->toArray();

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'api_key' =>  $apiKey, 
        ])->post($baseUrl, [
            'airportcode' => 'YIA',
            'arrdep' => 'D',
            'schedule' => now()->format('Y-m-d')
        ]);

        if ($response->failed()) {
            return view('home', ['error' => 'API request failed!']);
        }

        $data = $response->json();

        foreach ($data['FlightInfoMyInspection'] as &$flight) {
            $airportCode = strtoupper($flight['fromto']); // Pastikan kode bandara uppercase
            $flight['fromto'] = $cityNames[$airportCode] ?? $airportCode; // Ganti dengan nama kota jika ada
        }

        $flights = $data['FlightInfoMyInspection'];

        // Urutkan berdasarkan waktu terdekat
        usort($flights, function ($a, $b) {
            return strtotime($a['schedule']) - strtotime($b['schedule']);
        });

        // Ambil dua penerbangan terdekat dari waktu sekarang
        $now = now()->timestamp;
        $nearestFlights = array_filter($flights, function ($flight) use ($now) {
            return strtotime($flight['schedule']) >= $now;
        });

        $nearestFlights = array_slice($nearestFlights, 0, 2); // Ambil hanya 2 data

        return view('welcome.home', compact('nearestFlights'));
    }
}
