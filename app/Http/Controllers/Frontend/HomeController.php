<?php

namespace App\Http\Controllers\Frontend;

use App\Services\Frontend\HomeService;

class HomeController
{
    protected HomeService $homeService;

    public function __construct(HomeService $homeService){
        $this->homeService = $homeService;
    }

    public function index(){

        $this->homeService->setSeo();
        return view('frontend.pages.index');
    }

    public function home(){
        return view('frontend.pages.home');
    }
}
