<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.layouts.guest');
    }
}
