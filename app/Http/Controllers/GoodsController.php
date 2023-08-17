<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\Request;
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

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $linkImage = url('/images/'.$imageName);

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
            // return error message to view register
            return redirect()->back()->with('error', "failed create goods because {$th->getMessage()}");
        }
    }

    public function getById(Request $request){
        try {
            // $id = $request->get('id');
            // $item = Goods::find($id);
            // if (!$item){
            //     return redirect()->back()->with('error', "failed get goods because data not found");
            // }
            return view('goods.detail'/*, compact($item)*/);
        }catch (\Throwable $th) {
            // return error message to view register
            return redirect()->back()->with('error', "failed get goods because {$th->getMessage()}");
        }


    }

    public function formStore()
    {
        return view('goods.insert');
    }
}

