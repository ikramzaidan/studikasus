<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_features')->withPivot('payment_status', 'expired_at')->withTimestamps();
    }
}
