<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'amount',
        'payment_id',
        'payment_proof',
        'description',
        'status',
        'type',
        'additional_data',
        'processed_by',
        'processed_at',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'processed_at' => 'datetime',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the admin that processed the payment.
     */
    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
} 