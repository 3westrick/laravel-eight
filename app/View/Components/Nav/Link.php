<?php

namespace App\View\Components\Nav;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Link extends Component
{
    public bool $is_active;
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route,
    )
    {
        $this->is_active = request()->routeIs($route);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav.link');
    }
}
