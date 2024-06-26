<?php

namespace App\Http\Controllers\Frontend;

use ProtoneMedia\Splade\Facades\SEO;

class HomeController
{
    public function index(){

        SEO::openGraphType('WebPage');
        SEO::openGraphSiteName('Pio Toys');
        SEO::openGraphTitle('Pio Toys - Home Page');
        SEO::openGraphUrl('https://piotoys.gee');
        SEO::openGraphImage(asset('images/bg.png'));

        return view('frontend.pages.home');
    }
}
