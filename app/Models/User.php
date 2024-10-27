<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'user_features')->withPivot('payment_status', 'expired_at')->withTimestamps();
    }

    public function mostUsedFeature()
    {
        $mostUsedFeature = DB::table('user_features')
            ->select('features.name')
            ->join('features', 'user_features.feature_id', '=', 'features.id')
            ->where('user_features.user_id', $this->id)
            ->groupBy('features.name')
            ->orderByRaw('count(*) desc')
            ->first();

        return $mostUsedFeature ? $mostUsedFeature->name : null;
    }

}

