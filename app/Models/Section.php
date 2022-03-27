<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    protected $fillable = [
        'name',
        'status'
    ];

    public $translatable = ['name'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'section_id')->where(['parent_id' => 0, 'status' => 1])->with('subcategories');
    }
}