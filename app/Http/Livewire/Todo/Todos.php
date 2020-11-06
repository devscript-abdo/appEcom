<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Todos extends Component
{


    public $name;
    public $description;
    public $date_depart;
    public $date_fin;
    public $priority;
    public $admin_id;
    public $moderator_id;
    public $active = [];

    public $authAdmin;

    public function render()
    {
        return view('livewire.todo.todos', ['todos' => Todo::all()]);
    }

    public function mount()
    {
        $this->authAdmin = Auth::user();
    }

    public function getChecked($id)
    {
    }
    public function toFinish()
    {
       // dd($this->active);
        $this->setFinish();
    }

    public function submit()
    {
    
        // dd($this->authAdmin->id);
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'date_depart' => 'required|string',
            'date_fin' => 'required|string',
            'priority' => 'required|string',
        ]);

        // Execution doesn't reach here if validation fails.


        $todo = Todo::create([
            'name' => $this->name,
            'description' => $this->description,
            'date_depart' => $this->date_depart,
            'date_fin' => $this->date_fin,
            'priority' => $this->priority,
            'admin_id' => $this->authAdmin->id,
            //'moderator_id' => $this->moderator_id,
        ]);

        if ($todo) {
            $this->resetIput();
            return redirect()->route('admin.todos');
        }
    }


    private function setFinish()
    {
        if (!$this->active) {
            return;
        }
        $selects = Todo::find(array_filter($this->active));
        if ($selects) {
            // $selects->group()->associate(4);
            foreach ($selects as $select) {
                //dd($select);
                $select->update(['active' => !$select->active]);
            }
            return redirect()->route('admin.todos');
        }
        dd('noo');
    }
    private function resetIput()
    {
        $this->name = null;
        $this->description = null;
        $this->date_depart = null;
        $this->date_fin = null;
        $this->priority = null;
        $this->admin_id = null;
        $this->moderator_id = null;
    }
}
