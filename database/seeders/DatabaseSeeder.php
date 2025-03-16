<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\Models\User;
use App\Models\m_role;
use App\Models\m_status;
use App\Models\m_pulau;
use App\Models\m_provinsi;
use App\Models\m_kota;


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
                'username' => 'admin',
                'id_role' => '1',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'pegawai',
                'username' => 'pegawai',
                'id_role' => '2',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'sdm',
                'username' => 'sdm',
                'id_role' => '3',
                'password' => Hash::make('pass'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $role = [
            [
                'id_role' => '1',
                'name' => 'Admin',
                'desc' => 'admin',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_role' => '2',
                'name' => 'Pegawai',
                'desc' => 'pegawai',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_role' => '3',
                'name' => 'SDM',
                'desc' => 'SDM',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $status = [
            [
                'id_status' => '1',
                'name' => 'Pengajuan',
                'desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_status' => '2',
                'name' => 'Pending',
                'desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_status' => '3',
                'name' => 'Approved',
                'desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_status' => '4',
                'name' => 'Rejected',
                'desc' => '-',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];

        $pulau = [
            [
                'id_pulau' => '1',
                'name' => 'Sumatra',
                'desc' => 'Sumatra',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_pulau' => '2',
                'name' => 'Jawa',
                'desc' => 'jawa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];

        $provinsi = [
            [
                'id_provinsi' => '1',
                'id_pulau' => '1',
                'name' => 'Aceh',
                'desc' => 'Aceh',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '2',
                'id_pulau' => '1',
                'name' => 'Sumatera Utara',
                'desc' => 'Sumatera Utara',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '3',
                'id_pulau' => '1',
                'name' => 'Sumatera Barat',
                'desc' => 'Sumatera Barat',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '4',
                'id_pulau' => '1',
                'name' => 'Riau',
                'desc' => 'Riau',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '5',
                'id_pulau' => '1',
                'name' => 'Jambi',
                'desc' => 'Jambi',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '6',
                'id_pulau' => '1',
                'name' => 'Sumatera Selatan',
                'desc' => 'Sumatera Selatan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '7',
                'id_pulau' => '1',
                'name' => 'Bengkulu',
                'desc' => 'Bengkulu',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_provinsi' => '8',
                'id_pulau' => '1',
                'name' => 'Lampung',
                'desc' => 'Lampung',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $kota = [
            [
                'id_kota' => '1',
                'id_provinsi' => '1',
                'id_pulau' => '1',
                'name' => 'Kota Banda Aceh',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '2',
                'id_provinsi' => '1',
                'id_pulau' => '1',
                'name' => 'Kota Sabang',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '3',
                'id_provinsi' => '1',
                'id_pulau' => '1',
                'name' => 'Kota Langsa',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '4',
                'id_provinsi' => '1',
                'id_pulau' => '1',
                'name' => 'Kota Lhokseumawe',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '5',
                'id_provinsi' => '1',
                'id_pulau' => '1',
                'name' => 'Kota Subulussalam',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '6',
                'id_provinsi' => '2',
                'id_pulau' => '1',
                'name' => 'Kota Medan',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '7',
                'id_provinsi' => '2',
                'id_pulau' => '1',
                'name' => 'Kota Binjai',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '8',
                'id_provinsi' => '2',
                'id_pulau' => '1',
                'name' => 'Kota Pematang Siantar',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '9',
                'id_provinsi' => '2',
                'id_pulau' => '1',
                'name' => 'Kota Tanjung Balai',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_kota' => '10',
                'id_provinsi' => '2',
                'id_pulau' => '1',
                'name' => 'Kota Tebing Tinggi',
                'is_luar_negri' => '0',
                'long' => '0',
                'lat' => '0',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        User::insert($user);
        m_role::insert($role);
        m_status::insert($status);
        m_pulau::insert($pulau);
        m_provinsi::insert($provinsi);
        m_kota::insert($kota);
    }
}
