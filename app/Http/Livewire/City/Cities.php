<?php

namespace App\Http\Livewire\City;

use App\Models\City;
use Livewire\Component;

class Cities extends Component
{
    public $cities;
    public $isUpdate = false;

    public $name;
    public $cityId;

    /*  public function render()
    {
        return view('livewire.role.roles');
    }*/

    public function mount(City $city)
    {

        $this->cities = $city::select(['name'])->get();
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|unique:cities',
        ]);

        // Execution doesn't reach here if validation fails.

        $city = City::create([
            'name' => $this->name,
            'slug' => $this->name
        ]);

        if ($city) {
            $this->resetIput();
            return redirect()->route('admin.cities');
        }
    }


    public function editCity($id)
    {
        $city = City::findOrFail($id);
        $this->cityId = $city->id;
        $this->name = $city->name;

        $this->isUpdate = true;
        // return view('livewire.edit-admin');
    }
    public function update()
    {
        //dd('yyyy');
        // The current user can update the post...
        $this->validate([

            'name' => 'required|string|unique:cities,name,' . $this->cityId,
        ]);


        // Execution doesn't reach here if validation fails.
        if ($this->cityId) {
            $city = City::findOrFail($this->cityId);
            $city->update([
                'name' => $this->name,

            ]);

            if ($city) {
                $this->resetIput();
                return redirect()->route('admin.cities');
            }
        }
    }
    public function deleteCity($id)
    {
        if ($id) {
            $city = City::findOrFail($id);
            $city->delete();
            return redirect()->route('admin.cities');
        }
    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetIput();
    }

    /**** private method ***/
    private function resetIput()
    {
        $this->name = null;
    }
}
