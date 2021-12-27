<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    // especificar com quais campos da tabela trabalhar
    protected $fillable = ['name'];

    public $timestamps = false;
    use HasFactory;

    // As tags que pertencem ao produto.
    public function tag(){

        return $this->belongsToMany(Tag::class, 'product_tag');

    }
}
