<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    // especificar com quais campos da tabela trabalhar
    protected $fillable = ['name'];

    public $timestamps = false;
    use HasFactory;

    // Os produtos que pertencem a tag.
    public function product(){

        return $this->belongsToMany(Product::class, 'product_tag');

    }

}
