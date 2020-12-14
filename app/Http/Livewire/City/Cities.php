<?php

namespace App\Http\Livewire\City;

use App\Services\CityService;
use Livewire\Component;

class Cities extends Component
{

    public $isUpdate = false;

    public $fields = ['name'=>''];
    public $cityId;

    public function render(CityService $cityService)
    {

        return view('livewire.city.__cities',[
            'cities'=>$cityService->getInstance()->getSelect(['name','id','pay'])
        ]);
    }

    public function submit(CityService $cityService)
    {
        $city = $cityService->execute('create', $this->fields);

        if ($city) {
            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }


    public function editCity(CityService $cityService,$id)
    {
         $city = $cityService->getInstance()->findOrFail($id);
         $this->cityId = $city->id;
         $this->isUpdate = true;
         $this->fields = $city->toArray();
    }
    public function update(CityService $cityService)
    {
        $city = $cityService->getInstance()->findOrFail($this->cityId);

        if ($this->fields === $city->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );

        }

        if ($this->cityId) {

            $city = $cityService->execute('update', $this->fields);

            if ($city) {
                $this->resetInput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.updated.ok')
                    ]
                );
            }
        }
        return false;
    }
    public function deleteCity(CityService $cityService,$id)
    {
        if ($id) {
            $cityService->getInstance()->delete($id) ?
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.deleted.ok')
                    ]
                )
                :
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'error',
                        'message' => trans('messages.deleted.no')
                    ]
                );
        }
    }

    /**** private method ***/
    private function resetInput()
    {
        $this->fields = null;

    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->isCreate = true;
        $this->resetInput();
    }


    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
