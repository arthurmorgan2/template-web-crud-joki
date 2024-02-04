<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $primaryKey = 'id_guru';

    protected $fillable = ['nama_guru', 'jenis_kelamin_guru', 'tanggal_lahir', 'alamat_guru', 'no_telepon', 'foto'];
}
