<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;



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
        $validated = $request->validate([
            'Name' => 'required | unique:produits',
            'quantity' => 'required | integer',
            'price' => 'required | float',
            "addedDate" => 'required | date',
            'expirationDate' => 'required | date',
            'unitWeight' => 'required | float',
            'thumbnail' => 'required',
        ]);

        $produits = Produit::create([
            'Name' => $request->input('Name'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'addedDate' => $request->input('addedDate'),
            'expirationDate' => $request->input('expirationDate'),
            'unitWeight' => $request->input('unitWeight'),
            'thumbnail' => $request->input('thumbnail'),
        ]);

        $thumbnail = $request->file('thumbnail');
        $request->file('thumbnail')->move('public', $thumbnail);

        return response()->json($produits, 201);
    }

    public function update(Request $request, Produit $produits)
    {
        $validated = $request->validate([
            'quantity' => 'required | integer',
            "addedDate" => 'required | date',
            'expirationDate' => 'required | date',
        ]);

        $produits->update([
            'quantity' => $request->input('quantity'),
            'addedDate' => $request->input('addedDate'),
            'expirationDate' => $request->input('expirationDate'),
        ]);

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
