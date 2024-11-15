<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PhoneNumber extends Component
{
    public $number;
    public function __construct($number = '+7-932-604-35-56')
    {
        $this->number = $number;
    }

    public function render(): View|Closure|string
    {
        return view('components.phone-number');
    }
}
