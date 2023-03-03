<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceRefund extends Model
{
    use HasFactory;

    protected $fillable=[
        'invoice_id',
        'patient_id',
        'refund_amount',
        'refund_reason',
        'officer'
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class,'id','invoice_id');
    }
}
