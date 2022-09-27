<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Notifications\NotifyQuantityAlert;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Support\HasAdvancedFilter;
use App\Support\Helper;

class Product extends Model implements HasMedia
{
    use HasAdvancedFilter;

    public $orderable = [
        'id','product_name','product_code','product_quantity',
        'product_cost','product_price','product_stock_alert',
        'category_id'
    ];

    public $filterable = [
        'id','product_name','product_code','product_quantity',
        'product_cost','product_price','product_stock_alert',
        'category_id'
    ];

    // Add those columns to table : tinyint-> "website_featured","catalogue_featured"


    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $with = ['media'];

    public function __construct(array $attributes = array())
    {
        $this->setRawAttributes(array(
            'code' => Helper::genCode()
        ), true);
        parent::__construct($attributes);
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('images')
            ->useFallbackUrl('/images/fallback_product_image.png');
    }

    public function registerMediaConversions(Media $media = null): void {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50);
    }

    public function setProductCostAttribute($value) {
        $this->attributes['product_cost'] = ($value * 100);
    }

    public function getProductCostAttribute($value) {
        return ($value / 100);
    }

    public function setProductPriceAttribute($value) {
        $this->attributes['product_price'] = ($value * 100);
    }

    public function getProductPriceAttribute($value) {
        return ($value / 100);
    }
}
