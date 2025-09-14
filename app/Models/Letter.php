<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $table = 'letters';

    protected $fillable = [
        'nomor_surat',
        'category_id',
        'judul',
        'waktu_pengarsipan',
        'file_path',
    ];

    protected $dates = [
        'waktu_pengarsipan',
        'created_at',
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
