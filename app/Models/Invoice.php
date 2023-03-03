<?php

namespace App\Models;

use App\Traits\MolliePaymentTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory, SoftDeletes, MolliePaymentTrait;

    protected $fillable = [
        "patient_id",
        "doctor_id",
        "service_type",
        "services",
        "prices",
        "status",
        "invoice_type",
        "facility_id",
        "balance_due",
        "due_date",
        "paidamount",
        "receipt_number",
        "invoice_id",
        "payment_id",
        "payment_status",
        "payment_date",
        "internal_notes",
        'payment_mode',
        'doctors',
        "vat"
    ];

    protected $casts = [
        'services' => 'array',
        'doctors' => 'array'
    ];

    protected $appends = ["qrcode"];
    public function getQrcodeAttribute()
    {
        $data = (object) [
            'invoiceId' => $this->id,
            'paidAmount' => $this->balance_due,
        ];
        $paymentUrl = $this->preparePayment($data);
        return $paymentUrl;

    }
    public static $withoutAppends = false;

    public function scopeWithoutAppends($query)
    {
        self::$withoutAppends = true;

        return $query;
    }
    protected function getArrayableAppends()
    {
        if (self::$withoutAppends) {
            return [];
        }

        return parent::getArrayableAppends();
    }
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $invoice_code_format = auth()->check() ? get_facility_setting('invoice_string') : 'MDT';

            $string = $invoice_code_format . '-' . '00000000';

            $invoice_id = isset($model->attributes['id']) ? $model->attributes['id'] : rand();

            $unique_id = substr($string, -8, 8) + $invoice_id;

            $unique_id = str_pad($unique_id, 8, '0', STR_PAD_LEFT);

            $model->attributes['invoice_id'] = $invoice_code_format . '-' . $unique_id;

        });

        static::created(function ($model) {

            $invoice_code_format = auth()->check() ? get_facility_setting('invoice_string') : 'MDT';

            $string = $invoice_code_format . '-' . '00000000';

            $invoice_id = isset($model->attributes['id']) ? $model->attributes['id'] : rand();

            $unique_id = substr($string, -8, 8) + $invoice_id;

            $unique_id = str_pad($unique_id, 8, '0', STR_PAD_LEFT);

            $model->attributes['invoice_id'] = $invoice_code_format . '-' . $unique_id;

            $model->save();

        });

    }
    public function patient()
    {
        return $this->hasOne(Patient::class, "id", "patient_id");
    }

    public function doctor()
    {
        return $this->hasOne(Employee::class, "id", "doctor_id");
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class);
    }

    /**
     * Get all of the transactions for the Invoice
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class, "invoice_id", 'id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Employee::class);
    }

}