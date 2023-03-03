<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ElementTranslation extends Model
{
    protected $guarded = [];

    public function element() {
        return $this->hasOne(Element::class, 'id', 'element_id');
    }
}
