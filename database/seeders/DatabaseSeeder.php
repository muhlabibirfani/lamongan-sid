<?php

namespace Database\Seeders;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\User;
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
        User::updateOrCreate(
            ['email' => 'admin@lamongan.go.id'],
            [
                'name' => 'Admin Kabupaten Lamongan',
                'password' => Hash::make('password123'),
                'role' => 'admin_kabupaten',
            ]
        );

        $districts = [
            'Babat', 'Bluluk', 'Brondong', 'Deket', 'Glagah', 'Kalitengah',
            'Karangbinangun', 'Karanggeneng', 'Kedungpring', 'Kembangbahu',
            'Lamongan', 'Laren', 'Maduran', 'Mantup', 'Modo', 'Ngimbang',
            'Paciran', 'Pucuk',
        ];

        $createdDistricts = collect($districts)->mapWithKeys(function (string $name, int $index) {
            $district = Kecamatan::firstOrCreate(
                ['kode' => '3524'.str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT)],
                ['nama' => $name, 'status' => 'Aktif']
            );

            return [$name => $district];
        });

        $villageNames = [
            'Babat', 'Sendangduwur', 'Deket Kulon', 'Karanggeneng', 'Kembangbahu',
            'Sukorejo', 'Tlogoanyar', 'Made', 'Tunggul', 'Sidokumpul',
        ];

        for ($i = 1; $i <= 400; $i++) {
            $district = $createdDistricts->values()[($i - 1) % $createdDistricts->count()];
            $name = $villageNames[($i - 1) % count($villageNames)].' '.str_pad((string) $i, 3, '0', STR_PAD_LEFT);

            Desa::firstOrCreate(
                ['kode' => $district->kode.'.'.str_pad((string) $i, 4, '0', STR_PAD_LEFT)],
                [
                    'kecamatan_id' => $district->id,
                    'nama' => $name,
                    'jenis' => $i % 27 === 0 ? 'Kelurahan' : 'Desa',
                    'status' => $i % 19 === 0 ? 'Pending' : 'Aktif',
                    'jumlah_penduduk' => 1800 + ($i * 17),
                    'jumlah_kk' => 520 + ($i * 5),
                ]
            );
        }
    }
}
