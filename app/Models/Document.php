<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable =[

        'order_id',
        'document',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
