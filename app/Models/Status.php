<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class Status extends Model
   {
       use HasFactory;

       protected $primaryKey = 'id_status';
       protected $fillable = ['nama_status'];

       public function produks()
       {
           return $this->hasMany(Produk::class, 'status_id');
       }
   }