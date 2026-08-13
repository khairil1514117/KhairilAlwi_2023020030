<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Migration extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'migrations';

    // Disable timestamps karena tabel migrations tidak memiliki created_at/updated_at
    public $timestamps = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'migration',
        'batch',
    ];
}