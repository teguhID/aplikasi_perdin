<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\Models\profile;
use App\Models\User;
use App\Models\contact;
use App\Models\toko;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'role' => 'admin',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $toko = [
            [
                'name' => 'Nama Toko',
                'desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Icon',
                'desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $profile = [
            [
                'judul' => 'Selamat Datang di Rekan Teknik Service',
                'desc' => 'Mesin Cuci dirumah bermasalah? Kulkas tidak bisa digunakan? Pompa Air juga? Water Heater tidak panas? Tenang! Kami siap membantu Anda untuk memperbaiki nya! Rekan Teknik Service merupakan Jasa Service Pompa Air, Jasa Service Mesin Cuci, Jasa Service Kulkas, Jasa Service Water Heater, Jasa Pengeboran, dan Jasa Pemasangan Kanopi dan Konstruksi. Jasa Service berpengalaman sudah dipercaya sejak Tahun 90an. Saat ini banyak sekali jasa service yang berada di Bandung. Namun, tahukan Anda? banyak yang menawarkan harga yang murah namun kadang tidak mendapatkan garansi ataupun hasil yang kurang maksimal. Namun, anda tidak perlu khawatir! Rekan Teknik Service siap memberikan layanan terbaik nya untuk Anda. Dengan harga yang kompetitif dan sudah mendapatkan garansi jika masih ada masalah. Pelayanan kami yaitu Jasa Service Pompa Air, Jasa Service Mesin Cuci, Jasa Service Kulkas, Jasa Service Water Heater, Jasa Pengeboran, dan Jasa Pemasangan Kanopi dan Konstruksi yang berdomisili di Bandung.',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $contact = [
            [
                'icon' => 'fa-brands fa-whatsapp',
                'name' => 'whatsaapp',
                'desc' => '0899812387123',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-solid fa-phone',
                'name' => 'phone',
                'desc' => '0899812387123',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-solid fa-map-location',
                'name' => 'maps',
                'desc' => 'link map',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-solid fa-location-dot',
                'name' => 'address',
                'desc' => 'bandung',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-brands fa-facebook',
                'name' => 'facebook',
                'desc' => 'fb name',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-brands fa-instagram',
                'name' => 'instagram',
                'desc' => 'ig name',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-brands fa-youtube',
                'name' => 'youtube',
                'desc' => 'yt name',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'icon' => 'fa-brands fa-tiktok',
                'name' => 'tiktok',
                'desc' => 'tiktok name',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($user);
        toko::insert($toko);
        profile::insert($profile);
        contact::insert($contact);
    }
}
