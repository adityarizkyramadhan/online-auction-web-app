<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;
    protected $table = 'table_goods';

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
    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'image'
    ];
    // one to many with bids
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
}
