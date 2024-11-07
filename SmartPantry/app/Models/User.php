<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{

    protected $table = 'users';
    protected $primaryKey = 'id';

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'Name',
        'Email',
        'Password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'Password',
        'Remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'Email_verified_at' => 'datetime',
            'Password' => 'hashed',
        ];
    }

    /**
     * Get the pantry for the user.
     *
     * @return array<string, mixed>
     */

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'produit_user', 'user_id', 'produit_id')
            ->withPivot('Date_Ajout', 'Date_Expiration');
    }
}
