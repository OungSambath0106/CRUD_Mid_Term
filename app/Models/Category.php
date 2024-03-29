<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table= 'category';

    protected $fillable = ['name', 'description', 'userid'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
