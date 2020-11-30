<?php

namespace App\Http\Livewire\Dilevery;

use App\Services\CityService;
use App\Services\DeliveryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class Dilevery extends Component
{

    public $fields = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'password' => '',
        'city_id' => '',
        'address' => '',
        'tele' => '',
    ];

    public $isUpdate = false;
    public $userId;
    public $villes;

    /**
     * @param DeliveryService $deliveryService
     * @return Application|Factory|View
     */
    public function render(DeliveryService $deliveryService)
    {
        $users = $deliveryService->getInstance()->with(['ville'])->get();

        return view('livewire.dilevery.dilevery',[

            'users'=>$users,

        ]);
    }

    /**
     * @param CityService $cityService
     */
    public function mount(CityService $cityService){

        $this->villes = $cityService->getInstance()->getSelect(['id','name']);
    }

    public function submit(DeliveryService $deliveryService)
    {
        if(!isset($this->fields) || !is_array($this->fields)){
            return false;
        }
        $user = $deliveryService->execute('create',$this->fields);
        if($user){

            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('deliveryData.delivery.added.ok')
            ]);
        }
        return false;
    }

    public function editUser(DeliveryService $deliveryService, $id){

        $user = $deliveryService->getInstance()->findOrFail($id);
        $this->userId = $user->id;
        $this->isUpdate = true;
        $this->fields = $user->toArray();

    }

    public function update(DeliveryService $deliveryService){

        if(!isset($this->userId) || !is_int($this->userId)) return false;

        $user = $deliveryService->getInstance()->findOrFail($this->userId);

        if ($this->fields === $user->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.added.update.nochange')
                ]
            );

        }

        if ($this->userId) {

            $user = $deliveryService->execute('update', $this->fields);

            if ($user) {
                $this->resetInput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('leadData.lead.added.update')
                    ]
                );
            }
        }
        return false;
    }

    public function deleteUser(DeliveryService $deliveryService, $id)
    {
        if ($id) {
            $deliveryService->getInstance()->delete($id) ?
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('leadData.lead.added.delete')
                    ]
                )
                :
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'error',
                        'message' => trans('leadData.lead.delete.error')
                    ]
                );
        }
    }

    public function cancel(){

        $this->isUpdate = false;
        $this->fields = null;
    }

    private function resetInput(){

        $this->fields = null;
    }
    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
