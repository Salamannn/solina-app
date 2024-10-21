<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalVisit extends Model
{
    use HasFactory;

    protected $fillable = ['visit_date','visit_count'];
}
