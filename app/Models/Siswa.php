<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang sesuai
    protected $table = 'siswas';

    // Kolom yang bisa diisi
    protected $fillable = ['foto','nama', 'kelas', 'umur', 'alamat', 'email'];

}
