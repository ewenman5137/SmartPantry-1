<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitsController extends Controller
{
    public function index()
    {
        return response()->json(Produit::all(), 200);
    }

    public function show($id)
    {
        $produits = Produit::find($id);
        return response()->json($produits, 200);
    }

    public function store(Request $request)
    {
        $produits = Produit::create($request->all());
        return response()->json($produits, 201);
    }

    public function update(Request $request, Produit $produits)
    {
        $produits->update($request->all());
        return response()->json($produits, 200);
    }

    public function destroy(Produit $produits)
    {
        $produits->delete();
        return response()->json(null, 204);
    }

    public function search($name)
    {
        return response()->json(Produit::where('Name', 'like', '%' . $name . '%')->get(), 200);
    }
}
