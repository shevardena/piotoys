<?php

namespace App\Services\Frontend;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use ProtoneMedia\Splade\Facades\SEO;

class HomeService
{
    protected ProductRepository $productRepository;
    protected CategoryRepository $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository){
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function setSeo(){
        SEO::openGraphType('WebPage');
        SEO::openGraphSiteName('Pio Toys');
        SEO::openGraphTitle('Pio Toys - Home Page');
        SEO::openGraphUrl('https://piotoys.gee');
        SEO::openGraphImage(asset('images/bg.png'));

    }

}
