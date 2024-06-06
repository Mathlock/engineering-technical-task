<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'description'];

    public function rooms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Room::class);
    }
}
