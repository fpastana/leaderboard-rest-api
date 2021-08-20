<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'streetname',
        'number',
        'complement',
        'postal_code',
        'province',
        'country'
    ];

    public function user()
    {
        return $this->belongsTo(User::Class, 'user_id', 'id');
    }
}
