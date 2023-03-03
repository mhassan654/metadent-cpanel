<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xrayfile extends Model
{
    use HasFactory;
    protected $fillable =[
        // "name",
        "description",
        "download_link",
        "preview_img",
    ];
}
