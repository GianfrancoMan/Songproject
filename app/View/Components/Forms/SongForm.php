<?php

namespace App\View\Components\Forms;

use App\Models\Singer;
use App\Models\Song;
use Illuminate\View\Component;

class SongForm extends Component
{
    /*
    * Component's Data Attributes
    * All public properties on this component will automatically be made available
    * to the singer.singer-form view.
    */

    // The route to set for action attribute in the form
    public string $action;
    // The 'isUpdate' property checks if  the form is to update or create a song
    public bool $isupdate;
    // The $song attribute take the value from parent view if exists else null
    public Song|null $song;
     // The $singers attribute take the value from parent view
    public $singers;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($action, $isupdate, $song, $singers)
    {
        $this->action = $action;
        $this->isupdate = $isupdate;
        $this->song = $song;
        $this->singers = $singers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.song-form');
    }
}
