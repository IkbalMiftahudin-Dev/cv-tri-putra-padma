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
            ['key' => 'tagline', 'value' => 'Spesialis Instalasi Pipa, Sistem Filter, Kolam Renang, Panel Kontrol, & Maintenance Bergaransi.'],
            ['key' => 'phone', 'value' => '+62 838-4461-9720'],
            // ['key' => 'whatsapp', 'value' => '6283844619720'],
            // ['key' => 'email', 'value' => 'info@triputrapadma.com'],
            // ['key' => 'address', 'value' => 'Jl. Raya Rancamanyar No. 08, Kabupaten Bandung, Jawa Barat 40376'],
        ];

        foreach ($settings as $setting) {
            CompanySetting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }

        // 3. Layanan Utama (Services - 50 Data Layanan Profesional)
        Service::truncate();
        
        $servicesData = [
            ['name' => 'Instalasi Pipa Air Bersih', 'desc' => 'Pemasangan jalur perpipaan baru, perbaikan saluran bocor, dan optimasi aliran air menggunakan material SNI berkualitas tinggi.', 'icon' => 'fa-solid fa-faucet-drip'],
            ['name' => 'Sistem Filter Air & Water Treatment', 'desc' => 'Solusi efektif mengatasi air keruh, berbau besi, kuning, atau berkapur untuk kebutuhan rumah tangga dan industri.', 'icon' => 'fa-solid fa-filter'],
            ['name' => 'Maintenance & Perawatan Berkala', 'desc' => 'Kontrak perawatan rutin pompa air, tandon penampungan, dan pembersihan filter secara berkala agar performa tetap prima.', 'icon' => 'fa-solid fa-screwdriver-wrench'],
            ['name' => 'Pemasangan Booster Pump & Tandon', 'desc' => 'Instalasi pompa pendorong dan penampungan air untuk menjaga kestabilan tekanan air di setiap lantai bangunan.', 'icon' => 'fa-solid fa-water'],
            ['name' => 'Konstruksi & Instalasi Kolam Renang', 'desc' => 'Pembuatan kolam renang baru, instalasi sirkulasi, sistem filter pasir, serta pemipaan kolam renang profesional.', 'icon' => 'fa-solid fa-person-swimming'],
            ['name' => 'Perawatan & Treatment Air Kolam Renang', 'desc' => 'Pembersihan rutin dinding/lantai kolam, penjernihan air kolam renang, dan penyeimbangan kadar chemical air.', 'icon' => 'fa-solid fa-broom'],
            ['name' => 'Perakitan & Set Up Panel Listrik Pompa', 'desc' => 'Pembuatan dan instalasi panel kontrol otomatis (Inverter, DOL, Star-Delta) untuk sistem pompa air dan industri.', 'icon' => 'fa-solid fa-bolt'],
            ['name' => 'Instalasi Pompa Sumur Bor (Deep Well)', 'desc' => 'Pengeboran dan pemasangan pompa celup (submersible pump) untuk sumber air tanah dalam berkapasitas tinggi.', 'icon' => 'fa-solid fa-drill'],
            ['name' => 'Sistem Pipa Pembuangan & Sanitasi', 'desc' => 'Instalasi saluran pembuangan air kotor, limbah domestik, serta pencegahan mampet pada sistem drainase.', 'icon' => 'fa-solid fa-sink'],
            ['name' => 'Pemasangan Water Heater (Pemanas Air)', 'desc' => 'Instalasi pemanas air tenaga surya, listrik, maupun gas lengkap dengan jalur pipa air panas berinsulasi.', 'icon' => 'fa-solid fa-fire-flame-simple'],
            ['name' => 'Perbaikan Kebocoran Pipa Tersembunyi', 'desc' => 'Deteksi titik kebocoran pipa di dalam tembok atau lantai menggunakan alat deteksi khusus tanpa membongkar total.', 'icon' => 'fa-solid fa-magnifying-glass-chart'],
            ['name' => 'Instalasi RO (Reverse Osmosis) Komersial', 'desc' => 'Pemasangan sistem pemurnian air minum siap konsumsi berteknologi Reverse Osmosis untuk depot atau kantor.', 'icon' => 'fa-solid fa-flask'],
            ['name' => 'Pembersihan & Kuras Tandon / Ground Tank', 'desc' => 'Jasa kuras, sterilisasi, dan pembersihan lumut pada tandon atas maupun penampungan air bawah tanah (ground tank).', 'icon' => 'fa-solid fa-shield-virus'],
            ['name' => 'Instalasi Fire Hydrant & Fire Fighting', 'desc' => 'Pemasangan jaringan pipa pemadam kebakaran, instalasi box hydrant, dan pompa diesel/elektrik pemadam.', 'icon' => 'fa-solid fa-fire-extinguisher'],
            ['name' => 'Pemasangan Pressure Tank & Automatic Switch', 'desc' => 'Pemasangan tabung tekanan angin dan otomatis pompa untuk mencegah cetar-cetek pada mesin pompa air.', 'icon' => 'fa-solid fa-gauge-high'],
            ['name' => 'Jasa Uji Laboratorium Kualitas Air', 'desc' => 'Pengujian sampel air fisik, kimia, dan bakteriologi untuk memastikan air layak minum atau sesuai standar industri.', 'icon' => 'fa-solid fa-vials'],
            ['name' => 'Instalasi Saluran Pipa Gas & Pneumatik', 'desc' => 'Pemasangan instalasi jalur pipa gas medis, LPG komersial, maupun sistem kompresor udara pneumatik.', 'icon' => 'fa-solid fa-wind'],
            ['name' => 'Maintenance Mesin Pompa Industri (Heavy Duty)', 'desc' => 'Overhaul, gulung dinamo, dan perbaikan berat mesin pompa sentrifugal kapasitas besar pabrik.', 'icon' => 'fa-solid fa-gears'],
            ['name' => 'Pemasangan Lampu & Aksesoris Kolam Renang', 'desc' => 'Instalasi lampu underwater LED kolam renang, air Mancur, dan dekorasi tata cahaya area taman air.', 'icon' => 'fa-solid fa-lightbulb'],
            ['name' => 'Sistem Aerasi & Penghilang Bau Besi / Mangan', 'desc' => 'Pemasangan menara aerasi dan media filter khusus untuk menetralisir kandungan zat besi dan mangan tinggi.', 'icon' => 'fa-solid fa-cloud-rain'],
        ];

        $additionalIcons = ['fa-solid fa-wrench', 'fa-solid fa-toolbox', 'fa-solid fa-pipe', 'fa-solid fa-droplet', 'fa-solid fa-sliders'];
        $categoriesAction = ['Pemasangan', 'Perawatan', 'Troubleshooting', 'Konstruksi', 'Optimalisasi'];

        for ($i = count($servicesData) + 1; $i <= 50; $i++) {
            $servicesData[] = [
                'name' => $categoriesAction[array_rand($categoriesAction)] . ' Sistem Pendukung Air & Utilitas #' . $i,
                'desc' => 'Layanan teknis profesional untuk penanganan sistem utilitas bangunan, perpipaan, dan mekanikal elektrikal terpadu.',
                'icon' => $additionalIcons[array_rand($additionalIcons)],
            ];
        }

        foreach ($servicesData as $index => $srv) {
            Service::create([
                'name' => $srv['name'],
                'description' => $srv['desc'],
                'icon' => $srv['icon'],
                'order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 4. Proyek Sebaran Peta Nasional (Projects - 83 Data dengan Link Gambar Unsplash)
        Project::truncate();
        
        $sampleImages = [
            'https://images.unsplash.com/photo-1541888946425-d0fbb18f249e?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1590080875515-8a3a8dc5735e?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=600&q=80',
            'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=600&q=80',
        ];

        $projectsData = [
            // Kota Baru Parahyangan
            ['title' => 'Instalasi Pipa & Filter Hunian Eksklusif', 'category' => 'Hunian', 'location' => 'Kota Baru Parahyangan, Bandung', 'latitude' => -6.843100, 'longitude' => 107.478200, 'scope' => 'Pemasangan jaringan pipa utama dan filter air bersih.'],
            ['title' => 'Sistem Booster Pump Kluster Mandiri', 'category' => 'Komersial', 'location' => 'Kota Baru Parahyangan, Bandung', 'latitude' => -6.846500, 'longitude' => 107.475100, 'scope' => 'Instalasi pompa pendorong dan tandon komunal.'],
            ['title' => 'Maintenance Kolam Renang Residensial', 'category' => 'Hunian', 'location' => 'Kota Baru Parahyangan, Bandung', 'latitude' => -6.840200, 'longitude' => 107.481000, 'scope' => 'Perawatan sirkulasi dan filter kolam renang.'],

            // STT Telkom / Telkom University Bandung
            ['title' => 'Instalasi Water Treatment Lab Teknik', 'category' => 'Komersial', 'location' => 'Telkom University, Bandung', 'latitude' => -6.974000, 'longitude' => 107.630000, 'scope' => 'Pemasangan sistem pemurnian air laboratorium riset.'],
            ['title' => 'Perbaikan Saluran Pipa Gedung Kuliah', 'category' => 'Komersial', 'location' => 'Telkom University, Bandung', 'latitude' => -6.972500, 'longitude' => 107.628500, 'scope' => 'Maintenance pipa sanitasi dan suplai air bersih gedung.'],

            // Unpad (Universitas Padjadjaran)
            ['title' => 'Sistem Filter Air Bersih Gedung Rektorat', 'category' => 'Komersial', 'location' => 'Unpad Jatinangor, Sumedang', 'latitude' => -6.928500, 'longitude' => 107.776000, 'scope' => 'Instalasi filter air sentral kapasitas besar.'],
            ['title' => 'Maintenance Pompa & Saluran Asrama Mahasiswa', 'category' => 'Komersial', 'location' => 'Unpad Jatinangor, Sumedang', 'latitude' => -6.931000, 'longitude' => 107.773000, 'scope' => 'Perawatan berkala pompa booster dan tandon.'],
            ['title' => 'Instalasi Pipa Laboratorium Fakultas MIPA', 'category' => 'Komersial', 'location' => 'Unpad Dipatiukur, Bandung', 'latitude' => -6.897000, 'longitude' => 107.616000, 'scope' => 'Pemasangan jalur pipa khusus tahan kimia.'],

            // ITB (Institut Teknologi Bandung)
            ['title' => 'Pemasangan Panel Kontrol Pompa Kampus Utama', 'category' => 'Komersial', 'location' => 'ITB Ganesha, Bandung', 'latitude' => -6.891500, 'longitude' => 107.610700, 'scope' => 'Set up panel otomatis sistem distribusi air.'],
            ['title' => 'Sistem Sanitasi & Drainase Gedung Riset', 'category' => 'Komersial', 'location' => 'ITB Ganesha, Bandung', 'latitude' => -6.890200, 'longitude' => 107.612000, 'scope' => 'Perbaikan dan optimasi saluran air kotor.'],
            ['title' => 'Instalasi Utilitas Air Bersih Kampus Teknik', 'category' => 'Komersial', 'location' => 'ITB Jatinangor, Sumedang', 'latitude' => -6.933500, 'longitude' => 107.778500, 'scope' => 'Pemasangan pipa distribusi utama.'],

            // ITB Cirebon
            ['title' => 'Instalasi Water Treatment Kampus Baru', 'category' => 'Komersial', 'location' => 'ITB Cirebon, Argasunya', 'latitude' => -6.745000, 'longitude' => 108.548000, 'scope' => 'Pemasangan sumur bor dan sistem filter air.'],
            ['title' => 'Sistem Booster & Perpipaan Gedung Kuliah', 'category' => 'Komersial', 'location' => 'ITB Cirebon, Watubelah', 'latitude' => -6.752000, 'longitude' => 108.492000, 'scope' => 'Instalasi tekanan air stabil untuk fasilitas kampus.'],

            // Kopo Bandung
            ['title' => 'Instalasi Pipa & Filter Ruko Komersial', 'category' => 'Komersial', 'location' => 'Kopo, Bandung', 'latitude' => -6.945000, 'longitude' => 107.592000, 'scope' => 'Pemasangan filter air sumur untuk area pertokoan.'],
            ['title' => 'Perbaikan Kebocoran Pipa Rumah Tinggal', 'category' => 'Hunian', 'location' => 'Kopo Permai, Bandung', 'latitude' => -6.952000, 'longitude' => 107.585000, 'scope' => 'Deteksi titik bocor dan penggantian jalur pipa baru.'],
            ['title' => 'Maintenance Pompa & Tandon Cluster', 'category' => 'Hunian', 'location' => 'Taman Kopo Indah, Bandung', 'latitude' => -6.958000, 'longitude' => 107.576000, 'scope' => 'Servis berkala mesin pompa sentrifugal.'],

            // Batununggal Bandung
            ['title' => 'Instalasi Kolam Renang & Filter Mewah', 'category' => 'Hunian', 'location' => 'Batununggal Indah, Bandung', 'latitude' => -6.938000, 'longitude' => 107.635000, 'scope' => 'Konstruksi sirkulasi dan water treatment kolam.'],
            ['title' => 'Sistem Pemurnian Air Rumah Tangga Premium', 'category' => 'Hunian', 'location' => 'Batununggal, Bandung', 'latitude' => -6.935000, 'longitude' => 107.632000, 'scope' => 'Pemasangan filter air tipe Tabung FRP.'],

            // Pabrik Kimia Farma
            ['title' => 'Instalasi Water Treatment Plant (WTP) Farmasi', 'category' => 'Industri', 'location' => 'Pabrik Kimia Farma, Bandung', 'latitude' => -6.915000, 'longitude' => 107.618000, 'scope' => 'Sistem pemurnian air khusus standar produksi farmasi.'],
            ['title' => 'Maintenance Pipa Utilitas & Sterilisasi Tandon', 'category' => 'Industri', 'location' => 'Pabrik Kimia Farma, Cirebon', 'latitude' => -6.748000, 'longitude' => 108.535000, 'scope' => 'Perawatan jalur pipa steril dan uji kualitas air.'],
        ];

        $referenceLocations = [
            ['loc' => 'Kota Baru Parahyangan, Bandung', 'lat' => -6.842000, 'lng' => 107.476000],
            ['loc' => 'Telkom University, Bandung', 'lat' => -6.973500, 'lng' => 107.629000],
            ['loc' => 'Unpad Jatinangor, Sumedang', 'lat' => -6.930000, 'lng' => 107.775000],
            ['loc' => 'ITB Ganesha, Bandung', 'lat' => -6.891000, 'lng' => 107.611000],
            ['loc' => 'ITB Cirebon', 'lat' => -6.746000, 'lng' => 108.545000],
            ['loc' => 'Kopo, Bandung', 'lat' => -6.948000, 'lng' => 107.588000],
            ['loc' => 'Batununggal, Bandung', 'lat' => -6.936000, 'lng' => 107.633000],
            ['loc' => 'Pabrik Kimia Farma', 'lat' => -6.916000, 'lng' => 107.619000],
        ];

        $categories = ['Hunian', 'Komersial', 'Industri'];
        $scopesList = [
            'Pemasangan instalasi pipa PVC dan penampungan air bersih berkapasitas tinggi.',
            'Optimalisasi sistem pemurnian air dan perawatan filter berkala.',
            'Perbaikan jaringan pipa bocor dan peningkatan tekanan booster pump.',
            'Instalasi kolam renang dan sistem panel kontrol otomatis.',
            'Maintenance mesin pompa industri dan penanganan utilitas bangunan.',
        ];

        // Generate sisa data hingga pas 83 proyek
        for ($i = count($projectsData) + 1; $i <= 83; $i++) {
            $ref = $referenceLocations[array_rand($referenceLocations)];
            $category = $categories[array_rand($categories)];
            
            $latVar = (rand(-100, 100) / 100000);
            $lngVar = (rand(-100, 100) / 100000);

            $projectsData[] = [
                'title' => 'Proyek Instalasi & Perawatan Utilitas Air #' . $i,
                'category' => $category,
                'location' => $ref['loc'],
                'latitude' => $ref['lat'] + $latVar,
                'longitude' => $ref['lng'] + $lngVar,
                'scope' => $scopesList[array_rand($scopesList)],
            ];
        }

        foreach ($projectsData as $index => $project) {
            Project::create([
                'title' => $project['title'],
                'category' => $project['category'],
                'location' => $project['location'],
                'latitude' => $project['latitude'],
                'longitude' => $project['longitude'],
                'scope' => $project['scope'],
                // Mengambil link gambar acak dari sampel agar otomatis terisi link eksternal
                'image' => $sampleImages[$index % count($sampleImages)],
                'is_featured' => ($index < 10),
                'created_at' => now()->subDays(rand(1, 300)),
                'updated_at' => now(),
            ]);
        }

        // 5. Testimoni Klien (Testimonials)
        Testimonial::truncate();
        Testimonial::insert([
            [
                'client_name' => 'Bpk. H. Irawan',
                'company_origin' => 'Warga Bandung',
                'review' => 'Pelayanan CV. Tri Putra Padma luar biasa cepat! Masalah air rumah saya dan kolam renang langsung beres.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Ibu Siska Wijaya',
                'company_origin' => 'Warga Jakarta Selatan',
                'review' => 'Teknisinya serba bisa, dari set up panel listrik pompa sampai instalasi pipa booster dikerjakan sangat rapi.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'client_name' => 'Bpk. Hendra Kusuma',
                'company_origin' => 'PT. Industri Surabaya',
                'review' => 'Pengerjaan water treatment untuk pabrik kami selesai tepat waktu dengan hasil kualitas air yang sangat baik.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}