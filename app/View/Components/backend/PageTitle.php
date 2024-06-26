<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class PageTitle extends Component
{
    public $heading;
    public $can;
    public $url;
    public $title;
    public $links;

    public function __construct($heading, $can = null, $url = null, $title = null, $links = [])
    {
        $this->heading = $heading;
        $this->can = $can;
        $this->url = $url;
        $this->title = $title;
        $this->links = $links;
    }

    public function render()
    {
        return view('components.backend.page-title');
    }
}
