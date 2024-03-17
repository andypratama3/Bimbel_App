<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BimbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 200) as $index) {
            DB::table('bimbels')->insert([
                'id' => Str::uuid(),
                'nama_anak' => $faker->name,
                'jk' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'usia' => $faker->numberBetween(5, 15),
                'kelas_berjalan' => $faker->randomElement(['1', '2', '3', '4', '5', '6']),
                'jenjang_sekolah' => $faker->randomElement(['Belum Sekolah', 'Paud', 'SD/MI', 'SMP/MTS', 'SMA/SMK/MAN']),
                'bimbingan_konsultasi' => $faker->randomElement(['Bimbel CALISTUNG (Membaca, Menulis, dan Berhitung)', 'Bimbel SD/MI (Kelas 1-6)', 'Bimbel SMP/MTS (Kelas 7, 8 & 9)', 'Bimbel SMA/SMK/MAN (Kelas 10, 11 & 12)', 'Bimbel BTQ (Baca Tulis/Alqur\'an & Iqro) atau Mengaji saja']),
                'program_les' => $faker->randomElement(['Regular', 'Islami']),
                'jumlah_pertemuan' => $faker->randomElement(['8x Pertemuan (2x Les per minggu)', '12x Pertemuan (3x Les per minggu)', '16x Pertemuan (4x Les per minggu)', '20x Pertemuan (5x Les per minggu)']),
                'jadwal_hari' => $faker->randomElement(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu']),
                'jam_les' => $faker->time($format = 'H:i'),
                'tanggal_mulai' => $faker->date(),
                'pelajaran_tertentu' => $faker->sentence(),
                'mengaji' => $faker->sentence(),
                'alamat' => $faker->address,
                'asal_sekolah' => $faker->sentence(),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
                'orang_tua' => $faker->name,
                'no_telp' => $faker->phoneNumber,
                'catatan_anak_didik' => $faker->sentence(),
                'catatan_guru_les' => $faker->sentence(),
                'informasi_bimbel' => $faker->randomElement(['Rekomendasi dari Teman/Kerabat/Tetangga', 'Facebook', 'Instagram', 'Telegram', 'Grup WhatsApp']),
                'status' => '0',
                'image_pembayaran' => $faker->imageUrl(),
                'slug' => Str::slug($faker->sentence),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
