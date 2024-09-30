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
        $categories = Categorie::create($request->all());
        return response()->json($categories, 201);
    }

    public function update(Request $request, Categorie $categories)
    {
        $categories->update($request->all());
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
