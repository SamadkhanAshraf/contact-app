<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'address',
        'email',
        'website',
        'user_id'
    ];
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function user()
    {
       return $this->belongsTo(User::class);
    }



}
