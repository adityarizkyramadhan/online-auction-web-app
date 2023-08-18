<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BidController extends Controller
{
    public function store(Request $request)
    {
        try {
            // user id from auth
            $userId = Auth::user()->id;
            $goodId = $request->good_id;
            $price = $request->price;

            $data = [
                'id' => Str::uuid(),
                'user_id' => $userId,
                'good_id' => $goodId,
                'price' => $price
            ];

            Bid::create($data);
            return response()->json([
                'message' => 'Successfully created bid!',
                'bid' => $data
            ], 201);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed create bid because {$th->getMessage()}");
        }
    }
}
