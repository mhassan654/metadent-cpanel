<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceTransaction extends Model
{
    use HasFactory;

    public $fillable = [
        'transaction_id',
        'invoice_id',
        'patient_id',
        'invoice_number',
        'resource',
        'amount',
        'currency',
        'method',
        'paid_at',
        'failed_at',
        'due_date',
        'profile_id',
        'locale',
        'sequence_type',
        'payment_date',
        'expires_at',
        'mode',
        'description',
        'canceled_at',
        'failed_at',
        'payment_type',
        'status',
        'tr_cardNumber',
        'tr_cardHolder',
        'tr_cardAudience',
        'tr_cardLabel',
        'tr_cardCountryCode',
        'tr_cardSecurity',
        'tr_feeRegion',
        ];


    const PAID = 'Paid';
    const UNPAID = 'Unpaid';

    const TYPE_MOLLIE = 1;
    const TYPE_PAYPAL = 2;

    const PAYMENT_TYPES = [
        self::TYPE_MOLLIE => 'Mollie',
        self::TYPE_PAYPAL => 'PayPal',
    ];

    /**
     * @return BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    /**
     * @return BelongsTo
     */
    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'transaction_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transactionSubscription()
    {
        return $this->hasOne(Subscription::class, 'transaction_id', 'id');
    }
}
