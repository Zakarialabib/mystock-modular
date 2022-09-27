<?php

namespace Modules\Product\Http\Livewire\Products;

use Livewire\Component;
use Modules\Product\Entities\Product;

class ProductShow extends Component
{
    public $product;
    
    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('product::livewire.products.product-show');
    }
}
