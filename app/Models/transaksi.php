<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table= 'tb_transaksi';
    protected $fillable= ['nama_pelanggan','nama_menu','harga','jumlah','total_harga','nama_pegawai','tanggal'];
    public function menu(){
        return $this->belongsTo(Menu::class, 'id', 'id');
    }
}
