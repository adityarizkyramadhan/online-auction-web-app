<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GoodsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'price' => 'required|integer',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $linkImage = url('/images/' . $imageName);

            $data = [
                'id' => Str::uuid(),
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $linkImage
            ];

            $goods = Goods::create($data);

            return response()->json([
                'message' => 'Successfully created goods!',
                'goods' => $goods
            ], 201);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed create goods because {$th->getMessage()}");
        }
    }

    public function getById(Request $request)
    {
        try {
            $id = $request->id;
            $item = Goods::find($id);
            if (!$item) {
                return redirect()->back()->with('error', "failed get goods because data not found");
            }
            $bid = new Bid();
            $dataArray = $bid->getDataCompleted($id);
            $minPrice = $item->price;
            if (count($dataArray) > 0) {
                $minPrice = $dataArray[0]->price;
            }
            return view('goods.detail', compact('item', 'dataArray', 'minPrice'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "failed get goods because {$th->getMessage()}");
        }
    }

    public function formStore()
    {
        return view('goods.insert');
    }
}
