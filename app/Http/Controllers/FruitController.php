<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index()
    {
        $fruits = Fruit::all() ?? [];
        return view('fruits.index', ['fruits' => $fruits]);
    }

    public function edit(Fruit $fruit) {
        return view('fruits.edit', ['fruit' => $fruit]);
    }

    public function update(Fruit $fruit, Request $request) {
        $fruit->update([
            'name' => $request->name,
        ]);
        return redirect(route('fruits.index'));
    }

    public function store(Request $request){
       $fruit = Fruit::create([
        'slug' => strtolower($request->name),
        'name' => $request->name,
       ]);
       return back();
    }

    public function destroy(Fruit $fruit) {
        $fruit->delete();
        return back();
    }
}
