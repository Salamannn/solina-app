<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Portfolio extends Model
{
    use HasFactory;
    protected $fillable = ['client','project_date','project_name', 'description'];

    // Relasi satu ke banyak (Portfolio bisa memiliki banyak gambar)
    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
