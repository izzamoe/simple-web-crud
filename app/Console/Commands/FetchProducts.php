<?php

namespace App\Console\Commands;

   use Illuminate\Console\Command;
   use Illuminate\Support\Facades\Http;
   use App\Models\Produk;
   use App\Models\Kategori;
   use App\Models\Status;

   class FetchProducts extends Command
   {
       protected $signature = 'fetch:products';
       protected $description = 'Fetch products from API and store in database';

       public function __construct()
       {
           parent::__construct();
       }

       public function handle()
       {
           $username = 'tesprogrammer060225C18';


           $password = md5("bisacoding-" . date('d-m-y')); // tanggal sekarang , dan bulan , dan tahun 25 itu tahun 2025


           $response = Http::withHeaders([
               'Cookie' => 'ci_session=ohv52jht464k1n12neb20vde6vq90vj3'
           ])->asForm()->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
               'username' => $username,
               'password' => $password
           ]);

           $username = explode(' ', $response->header('X-Credentials-Username'))[0];

           $response = Http::withHeaders([
               'Cookie' => 'ci_session=ohv52jht464k1n12neb20vde6vq90vj3'
           ])->asForm()->post('https://recruitment.fastprint.co.id/tes/api_tes_programmer', [
               'username' => $username,
               'password' => $password
           ]);

           if ($response->successful()) {
               $data = $response->json()['data'];

               foreach ($data as $item) {
                   $kategori = Kategori::firstOrCreate(['nama_kategori' => $item['kategori']]);
                   $status = Status::firstOrCreate(['nama_status' => $item['status']]);

                   Produk::updateOrCreate(
                       ['id_produk' => $item['id_produk']],
                       [
                           'nama_produk' => $item['nama_produk'],
                           'harga' => $item['harga'],
                           'kategori_id' => $kategori->id_kategori,
                           'status_id' => $status->id_status
                       ]
                   );
               }

               $this->info('Products fetched and stored successfully.');
           } else {
               $this->error('Failed to fetch products.');
           }
       }
   }
