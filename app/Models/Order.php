<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'price',
        'account_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
