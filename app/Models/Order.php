<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'status',
        'total',
        'subtotal',
        'shipping_cost',
        'payment_method',
        'payment_status',
        'payment_id',
        'shipping_carrier',
        'shipping_address',
        'shipping_city',
        'shipping_postal_code',
        'shipping_country',
        'shipping_phone',
        'tracking_number',
        'notes',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'shipping_cost' => 'decimal:2',
    ];

    public const STATUSES = [
        'pending' => 'En attente',
        'paid' => 'Payée',
        'processing' => 'En préparation',
        'shipped' => 'Expédiée',
        'delivered' => 'Livrée',
        'cancelled' => 'Annulée',
    ];

    public const CARRIERS = [
        'bpost' => 'bpost (Belgique)',
        'dpd' => 'DPD',
        'dhl' => 'DHL Express',
        'ups' => 'UPS',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? $this->status;
    }

    public function getCarrierLabelAttribute(): string
    {
        return self::CARRIERS[$this->shipping_carrier] ?? $this->shipping_carrier;
    }
}
