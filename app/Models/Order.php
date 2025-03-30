<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'subtotal',
        'shipping',
        'total',
        'status',
        'payment_proof',
        'payment_method',
        'payment_id',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_email',
        'shipping_phone',
        'shipping_address',
        'shipping_postal_code',
        'shipping_city',
        'shipping_country',
        'billing_same_as_shipping',
        'billing_first_name',
        'billing_last_name',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_postal_code',
        'billing_city',
        'billing_country',
        'notes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Génère un numéro de commande unique
    public static function generateOrderNumber()
    {
        $prefix = 'CMD-';
        $uniqueNumber = $prefix . strtoupper(uniqid());

        // Vérifiez si le numéro existe déjà, sinon en générer un nouveau
        while (self::where('order_number', $uniqueNumber)->exists()) {
            $uniqueNumber = $prefix . strtoupper(uniqid());
        }

        return $uniqueNumber;
    }
}
