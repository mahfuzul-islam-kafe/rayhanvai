<?php

namespace App\View\Components\Api;

use Closure;
use Http;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct()
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Http::get("https://fakestoreapi.com/products/categories")->json();
        
        return view('components.api.header', compact('categories'));
    }
}
