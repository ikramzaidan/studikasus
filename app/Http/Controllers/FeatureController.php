<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Symfony\Component\Process\Process;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('feature.index', [
            'features' => Feature::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'publisher' => 'required',
            'release' => 'required',
            'platform' => 'required',
            'genres' => 'required',
        ]);

        Feature::create([
            'name' => $request->name,
            'publisher' => $request->publisher,
            'release_date' => $request->release,
            'platform_id' => $request->platform,
        ]);

        return redirect()->route('feature.index')->with('success', 'New feature successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        //
    }

    /**
     * Menambahkan fitur ke user
     */
    public function assignUser(Feature $feature)
    {
        $userId = auth()->id();

        $user = User::findOrFail($userId);

        $expiredAt = now()->addDays(30);

        $feature->users()->attach($userId, [
            'payment_status' => 'pending',
            'expired_at' => $expiredAt,
        ]);

        $user->givePermissionTo(strtolower($feature->name));

        return redirect()->route('features.index')->with('success', 'Feature successfully assigned.');
    }

    /**
     * Menghitung total harga layanan berdasarkan fitur yang diakses user
     * ditambah beban pajak.
     *
     * @param  \Illuminate\Support\Collection  $features  Daftar fitur
     * @return float                                      Total harga yang harus dibayar setelah pajak
     * 
     * @example
     *  $pricing = calculatePrice($user->features()->where('payment_status', 'pending')->get());
     */
    public function calculatePrice(Collection $features)
    {
        // Inisialisasi total harga
        $totalPrice = 0;

        // Hitung total harga berdasarkan setiap fitur
        foreach ($features as $feature) {
            $totalPrice += $feature->price;
        }

        // Tambahkan pajak sebesar 11% ke dalam total harga
        $totalPrice *= 1.11;

        return $totalPrice;
    }



    /**
     * Melakukan analisis dan memberikan rekomendasi fitur ke pengguna
     */
    public function analyze(Request $request)
    {
        // Mengambil input dari user
        $input = $request->input('data');

        // Menjalankan script Python di dalam sub process
        $process = new Process(['python3', 'path/to/recommendation.py', json_encode($input)]);
        $process->run();

        // Menangani error pada proses dan mengembalikan pesan error dalam format JSON
        if (!$process->isSuccessful()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memproses data',
                'details' => $process->getErrorOutput()
            ], 500);
        }

        // Mendapatkan output dari script python
        $output = json_decode($process->getOutput(), true);

        // Mengembalikan hasil output dalam format JSON
        return response()->json([
            'status' => 'success',
            'data' => $output
        ]);
    }

}
