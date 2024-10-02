<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorie;

class CategoriesController extends Controller
{
    public function index()
    {
        return response()->json(Categorie::all(), 200);
    }

    public function show($id)
    {
        $categories = Categorie::find($id);
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required | unique:categories',
            'thumbnail' => 'required',
        ]);

        $categories = Categorie::create([
            'Name' => $request->input('Name'),
            'thumbnail' => $request->input('thumbnail'),
        ]);

        $thumbnail = $request->file('thumbnail');
        $request->file('thumbnail')->move('public', $thumbnail);

        return response()->json($categories, 201);
    }

    public function update(Request $request, Categorie $categories)
    {
        $validated = $request->validate([
            'Name' => 'required | unique:categories',
            'thumbnail' => 'required',
        ]);

        $categories->Name = $request->input('Name');
        $categories->thumbnail = $request->input('thumbnail');
        $categories->save();
        return response()->json($categories, 200);
    }

    public function destroy(Categorie $categories)
    {
        $categories->delete();
        return response()->json(null, 204);
    }

    public function search($name)
    {
        return response()->json(Categorie::where('Name', 'like', '%' . $name . '%')->get(), 200);
    }

    public function GetCategorieProduits(Categorie $categorie)
    {
        return response()->json($categorie->produits, 200);
    }
}
