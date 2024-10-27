<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name' => 'Automatic Backups',
                'description' => 'Pencadangan otomatis data server setiap hari.',
                'price' => 100000,
            ],
            [
                'name' => 'DDoS Protection',
                'description' => 'Perlindungan dari serangan DDoS untuk menjaga ketersediaan layanan.',
                'price' => 60000,
            ],
            [
                'name' => 'High Availability',
                'description' => 'Server dengan tingkat ketersediaan yang tinggi.',
                'price' => 200000,
            ],
            [
                'name' => 'SSL Certificate',
                'description' => 'Sertifikat SSL untuk enkripsi data.',
                'price' => 170000,
            ],
            [
                'name' => 'Root Access',
                'description' => 'Akses penuh untuk pengelolaan server.',
                'price' => 20000,
            ],
            [
                'name' => 'Performance Monitoring',
                'description' => 'Pemantauan performa server secara real-time.',
                'price' => 450000,
            ],
            [
                'name' => 'Firewall Configuration',
                'description' => 'Konfigurasi keamanan firewall untuk server.',
                'price' => 49000,
            ],
            [
                'name' => '24/7 Technical Support',
                'description' => 'Dukungan teknis sepanjang waktu.',
                'price' => 10000,
            ],
            [
                'name' => 'Cloud Storage',
                'description' => 'Penyimpanan berbasis cloud untuk data.',
                'price' => 900000,
            ],
            [
                'name' => 'Load Balancer',
                'description' => 'Pendistribusi beban lalu lintas.',
                'price' => 70000,
            ],
        ];

        foreach ($features as $featureData) {
            $feature = Feature::create($featureData);
            Permission::create(['name' => strtolower($feature->name)]);
        }
    }
}
