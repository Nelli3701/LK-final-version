<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Logo extends Component
{
    public $src;
    public $text;
    public $alt;

    public function __construct($src = 'img/logo.png', $text = "Logic \n Kitchen", $alt = 'logo')
    {
        $this->src = $src;
        $this->text = nl2br($text); // nl2br преобразует \n в <br>
        $this->alt = $alt;
    }
    public function render(): View|Closure|string
    {
        return view('components.logo');
    }
}
