<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Produit extends Model
{
    use HasFactory;

    protected $table = 'produits';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    protected $fillable = [
        'Name',
        'quantity',
        'price',
        'addedDate',
        'expirationDate',
        'UnitWeight',
        'thumbnail',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categorie::class, 'id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
