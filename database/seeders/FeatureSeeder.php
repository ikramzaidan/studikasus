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
            ],
            [
                'name' => 'DDoS Protection',
                'description' => 'Perlindungan dari serangan DDoS untuk menjaga ketersediaan layanan.',
            ],
            [
                'name' => 'High Availability',
                'description' => 'Server dengan tingkat ketersediaan yang tinggi.',
            ],
            [
                'name' => 'SSL Certificate',
                'description' => 'Sertifikat SSL untuk enkripsi data.',
            ],
            [
                'name' => 'Root Access',
                'description' => 'Akses penuh untuk pengelolaan server.',
            ],
            [
                'name' => 'Performance Monitoring',
                'description' => 'Pemantauan performa server secara real-time.',
            ],
            [
                'name' => 'Firewall Configuration',
                'description' => 'Konfigurasi keamanan firewall untuk server.',
            ],
            [
                'name' => '24/7 Technical Support',
                'description' => 'Dukungan teknis sepanjang waktu.',
            ],
            [
                'name' => 'Cloud Storage',
                'description' => 'Penyimpanan berbasis cloud untuk data.',
            ],
            [
                'name' => 'Load Balancer',
                'description' => 'Pendistribusi beban lalu lintas.',
            ],
        ];

        foreach ($features as $featureData) {
            $feature = Feature::create($featureData);
            Permission::create(['name' => strtolower($feature->name)]);
        }
    }
}
