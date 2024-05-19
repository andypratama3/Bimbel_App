<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BimbelExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \App\Models\Bimbel::where('status', 2)->get()->map(function($item){
            return [
                'nama_anak' => $item->nama_anak,
                'jk' => $item->jk,
                'usia' => $item->usia,
                'kelas_berjalan' => $item->kelas_berjalan,
                'jenjang_sekolah' => $item->jenjang_sekolah,
                'bimbingan_konsultasi' => $item->bimbingan_konsultasi,
                'program_les' => $item->program_les,
                'jumlah_pertemuan' => $item->jumlah_pertemuan,
                'jadwal_hari' => $item->jadwal_hari,
                'jam_les' => $item->jam_les,
                'tanggal_mulai' => $item->tanggal_mulai,
                'pelajaran_tertentu' => $item->pelajaran_tertentu,
                'mengaji' => $item->mengaji,
                'alamat' => $item->alamat,
                'asal_sekolah' => $item->asal_sekolah,
                'agama' => $item->agama,
                'orang_tua' => $item->orang_tua,
                'no_telp' => $item->no_telp,
                'catatan_anak_didik' => $item->catatan_anak_didik,
                'catatan_guru_les' => $item->catatan_guru_les,
                'informasi_bimbel' => $item->informasi_bimbel,
                'foto_pembayaran' => $item->foto_pembayaran,
                'nama_pembayar' => $item->nama_pembayar,
                'status' => 'Siswa Bimbel',
                'image_pembayaran' => $item->image_pembayaran,

            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama Anak',
            'Jenis Kelamin',
            'Usia',
            'Kelas Berjalan',
            'Jenjang Sekolah',
            'Bimbingan Konsultasi',
            'Program Les',
            'Jumlah Pertemuan',
            'Jadwal Hari',
            'Jam Les',
            'Tanggal Mulai',
            'Pelajaran Terkait',
            'Mengaji',
            'Alamat',
            'Asal Sekolah',
            'Agama',
            'Orang Tua',
            'No Telp',
            'Catatan Anak Didik',
            'Catatan Guru Les',
            'Informasi Bimbel',
            'Foto Pembayaran',
            'Nama Pembayar',
            'Status',
            'Image Pembayaran',
        ];
    }

}

