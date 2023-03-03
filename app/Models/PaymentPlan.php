<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;

    protected $fillable =[
        'invoice_id',
        'outstanding_amt',
        'no_of_installments',
        'installment_due_dates',
        'amt_per_installment'
    ];

    protected $casts = [
        'installment_due_dates' => 'array',
        'amt_per_installment' => 'array',
    ];


    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'id', 'invoice_id');
    }
}
