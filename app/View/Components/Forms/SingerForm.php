<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class SingerForm extends Component
{
        /*
    * Component's Data Attributes
    * All public properties on this component will automatically be made available
    * to the singer.singer-form view.
    */

    // The route to set for action attribute in the form
    public string $action =  '';
    // The 'name' field value
    public string $name = '';
    // The 'birthdate' field value
    public string $birthdate = '';


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $name, $birthdate) {
        $this->action = $action;
        $this->name = $name;
        $this->birthdate = $birthdate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.singer-form');
    }
}
