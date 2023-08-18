<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bid extends Model
{
    use HasFactory;
    protected $table = 'table_bids';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'id',
        'price',
        'user_id',
        'good_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Assuming 'user_id' is the foreign key in the 'bids' table
    }

    // Define the 'good' relationship
    public function goods()
    {
        return $this->belongsTo(Good::class, 'good_id'); // Assuming 'good_id' is the foreign key in the 'bids' table
    }

    public function getDataCompleted($idGoods)
    {
        $data = DB::table('table_bids')
            ->orderBy('table_bids.price', 'desc')
            ->where('table_bids.good_id', '=', $idGoods)
            ->join('table_goods', 'table_bids.good_id', '=', 'table_goods.id')
            ->join('table_user', 'table_bids.user_id', '=', 'table_user.id')
            ->select('table_bids.*', 'table_goods.name as good_name', 'table_user.name as user_name', 'table_bids.price as bid_price')
            ->get();
        return $data->toArray();
    }
}
