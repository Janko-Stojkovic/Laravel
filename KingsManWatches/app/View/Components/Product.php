<?php

namespace App\View\Components;

use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Component;

class Product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $productId;
    public $productName;
    public $productBrandId;
    public $productBrandName;
    public $productPrice;
    public $productDescription;
    public $productImage;
    public $productImageHover;

    public function __construct($productId, $productName, $productBrandId, $productBrandName, $productPrice, $productDescription, $productImage, $productImageHover)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productBrandId = $productBrandId;
        $this->productBrandName = $productBrandName;
        $this->productPrice = $productPrice;
        $this->productDescription = $productDescription;
        $this->productImage = $productImage;
        $this->productImageHover = $productImageHover;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product');
    }

}
