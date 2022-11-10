<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Support\HasAdvancedFilter;

class Category extends Model
{
    use HasAdvancedFilter;
    use HasFactory;

    public $orderable = [
        'id' , 'category_code' ,'category_name',
    ];

    public $filterable = [
        'id' , 'category_code' ,'category_name'
    ];

    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
