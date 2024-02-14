<?php

namespace App\View\Components\Todos;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    public $todo;
    public $from;
    public function __construct($todo, $from)
    {
        $this->todo = $todo;
        $this->from = $from;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.todos.card');
    }
}
