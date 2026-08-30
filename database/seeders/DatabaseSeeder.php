<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CompanySetting;
use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Akun Admin Login
        User::updateOrCreate(
            ['email' => 'admin@triputrapadma.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Pengaturan Perusahaan (Company Settings)
        $settings = [
            ['key' => 'company_name', 'value' => 'CV. Tri Putra Padma'],
            ['key' => 'tagline', 'value' => 'Spesialis Instalasi Pipa, Sistem Filter, & Maintenance Bergaransi untuk Hunian, Komersial, & Industri.'],
            ['key' => 'phone', 'value' => '+62 838-4461-9720'],
            ['key' => 'whatsapp', 'value' => '6283844619720'],
            ['key' => 'email', 'value' => 'info@triputrapadma.com'],
            ['key' => 'address', 'value' => 'Jl. Raya Rancamanyar No. 45, Kabupaten Bandung, Jawa Barat 40375'],
        ];

        foreach ($settings as $setting) {
            CompanySetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }

        // 3. Layanan Utama (Services)
        Service::truncate();
        Service::insert([
            [
                'name' => 'Instalasi Pipa Air Bersih',
                'description' => 'Pemasangan jalur perpipaan baru, perbaikan saluran bocor, dan optimasi aliran air menggunakan material SNI berkualitas tinggi.',
                'icon' => 'fa-solid fa-faucet-drip',
                'order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sistem Filter Air & Water Treatment',
                'description' => 'Solusi efektif mengatasi air keruh, berbau besi, kuning, atau berkapur untuk kebutuhan rumah tangga dan industri.',
                'icon' => 'fa-solid fa-filter',
                'order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Maintenance & Perawatan Berkala',
                'description' => 'Kontrak perawatan rutin pompa air, tandon penampungan, dan pembersihan filter secara berkala agar performa tetap prima.',
                'icon' => 'fa-solid fa-screwdriver-wrench',
                'order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pemasangan Booster Pump & Tandon',
                'description' => 'Instalasi pompa pendorong dan penampungan air untuk menjaga kestabilan tekanan air di setiap lantai bangunan.',
                'icon' => 'fa-solid fa-water',
                'order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 4. Proyek Sebaran Peta Nasional (Projects - 53 Data)
        Project::truncate();
        
        $projectsData = [
            [
                'title' => 'Instalasi Pipa & Filter Perumahan Mewah',
                'category' => 'Hunian',
                'location' => 'Rancamanyar, Bandung',
                'latitude' => -6.97920000,
                'longitude' => 107.59010000,
                'scope' => 'Pemasangan jaringan pipa utama dan sistem filter air bersih rumah tangga kluster.',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'title' => 'Sistem Water Treatment Pabrik Tekstil',
                'category' => 'Industri',
                'location' => 'Rungkut, Surabaya',
                'latitude' => -7.33110000,
                'longitude' => 112.78360000,
                'scope' => 'Instalasi sistem filter air industri kapasitas besar dan tandon produksi.',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'title' => 'Maintenance Pompa Gedung Perkantoran',
                'category' => 'Komersial',
                'location' => 'Sudirman, Jakarta Pusat',
                'latitude' => -6.20880000,
                'longitude' => 106.84560000,
                'scope' => 'Perbaikan dan perawatan berkala booster pump gedung komersial 15 lantai.',
                'image' => null,
                'is_featured' => true,
            ],
            [
                'title' => 'Jaringan Distribusi Air Bersih Villa',
                'category' => 'Hunian',
                'location' => 'Denpasar, Bali',
                'latitude' => -8.40950000,
                'longitude' => 115.18890000,
                'scope' => 'Pemasangan pipa distribusi air bersih dan filter modern untuk kawasan villa.',
                'image' => null,
                'is_featured' => false,
            ],
            [
                'title' => 'Pemasangan Filter Air Hotel Bintang 4',
                'category' => 'Komersial',
                'location' => 'Medan, Sumatera Utara',
                'latitude' => 3.59520000,
                'longitude' => 98.67220000,
                'scope' => 'Upgrade total sistem filter air bersih dan perawatan jalur pipa hotel.',
                'image' => null,
                'is_featured' => true,
            ],
        ];

        // Daftar kota pendukung untuk melengkapi hingga 53 data proyek
        $additionalCities = [
            ['name' => 'Semarang', 'lat' => -6.966667, 'lng' => 110.416667],
            ['name' => 'Yogyakarta', 'lat' => -7.795580, 'lng' => 110.369490],
            ['name' => 'Makassar', 'lat' => -5.147665, 'lng' => 119.432732],
            ['name' => 'Palembang', 'lat' => -2.990934, 'lng' => 104.756554],
            ['name' => 'Balikpapan', 'lat' => -1.237916, 'lng' => 116.852859],
            ['name' => 'Malang', 'lat' => -7.966620, 'lng' => 112.632632],
            ['name' => 'Bogor', 'lat' => -6.597147, 'lng' => 106.806039],
            ['name' => 'Bekasi', 'lat' => -6.238270, 'lng' => 106.975594],
            ['name' => 'Depok', 'lat' => -6.402484, 'lng' => 106.794243],
            ['name' => 'Tangerang', 'lat' => -6.178306, 'lng' => 106.631889]
        ];

        $categories = ['Hunian', 'Komersial', 'Industri'];
        $scopes = [
            'Pemasangan instalasi pipa PVC dan penampungan air bersih berkapasitas tinggi.',
            'Optimalisasi sistem pemurnian air dan perawatan filter berkala.',
            'Perbaikan jaringan pipa bocor dan peningkatan tekanan booster pump.',
            'Instalasi water treatment plant (WTP) komersial dan uji laboratorium.',
        ];

        // Generate sisa data hingga mencapai tepat 53 proyek
        for ($i = count($projectsData) + 1; $i <= 53; $i++) {
            $city = $additionalCities[array_rand($additionalCities)];
            $category = $categories[array_rand($categories)];
            
            // Variasi koordinat acak tipis agar tidak bertumpuk
            $latVar = (rand(-150, 150) / 10000);
            $lngVar = (rand(-150, 150) / 10000);

            $projectsData[] = [
                'title' => 'Proyek Instalasi & Perawatan Air #' . $i,
                'category' => $category,
                'location' => $city['name'],
                'latitude' => $city['lat'] + $latVar,
                'longitude' => $city['lng'] + $lngVar,
                'scope' => $scopes[array_rand($scopes)],
                'image' => null,
                'is_featured' => ($i <= 10), // Set 10 proyek pertama sebagai featured
            ];
        }

        foreach ($projectsData as $project) {
            Project::create(array_merge($project, [
                'created_at' => now()->subDays(rand(1, 300)),
                'updated_at' => now(),
            ]));
        }

        // 5. Testimoni Klien (Testimonials)
        Testimonial::truncate();
        Testimonial::insert([
            [
                'client_name' => 'Bpk. H. Irawan',
                'company_origin' => 'Warga Bandung',
                'review' => 'Pelayanan CV. Tri Putra Padma luar biasa cepat! Masalah air rumah saya yang kuning dan bau besi langsung tuntas setelah dipasang filter airnya.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Ibu Siska Wijaya',
                'company_origin' => 'Warga Jakarta Selatan',
                'review' => 'Teknisinya sangat profesional dan rapi dalam pengerjaan instalasi pipa booster di rumah kami. Garansi 1 tahunnya benar-benar memberikan ketenangan.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Bpk. Hendra Kusuma',
                'company_origin' => 'PT. Industri Surabaya',
                'review' => 'Pengerjaan water treatment untuk pabrik kami selesai tepat waktu dengan hasil kualitas air yang sangat memenuhi standar industri.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}