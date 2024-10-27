<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFeature extends Model
{
    use HasFactory;

    protected $table = 'user_features';

    protected $fillable = [
        'user_id',
        'feature_id',
        'payment_status',
        'created_at',
        'expired_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
