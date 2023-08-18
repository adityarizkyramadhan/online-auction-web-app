<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'table_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'occupation',
        'remember_token'
    ];

    // one to many with bids
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
