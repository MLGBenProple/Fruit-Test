<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use App\Models\Variety;
use Illuminate\Http\Request;

class VarietyController extends Controller
{
    public function index(Fruit $fruit)
    {
        $varieties = $fruit->varieties ?? [];
        return view('varieties.index', ['varieties' => $varieties, 'fruit' => $fruit]);
    }

    public function edit(Variety $variety)
    {
        return view('varieties.edit', ['variety' => $variety]);
    }

    public function update(Variety $variety, Request $request)
    {
        $variety->update([
            'name' => $request->name,
        ]);
        return redirect(route('varieties.index', $variety->fruit->id));
    }

    public function store(Fruit $fruit, Request $request)
    {
        $fruit->varieties()->create([
            'slug' => strtolower($request->name),
            'name' => $request->name,
        ]);
        return back();
    }

    public function destroy(Variety $variety)
    {
        $variety->delete();
        return back();
    }
}
