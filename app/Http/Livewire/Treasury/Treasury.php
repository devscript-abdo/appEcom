<?php

namespace App\Http\Livewire\Treasury;

use App\Services\TreasuryService;
use Livewire\Component;

class Treasury extends Component
{
    public $isUpdate = false;

    public $fields = [
        'type' => '',
        'title' => '',
        'banque' => '',
        'client' => '',
        'designation' => '',
        'total' => '',

       //'admin_id' => '',
       // 'command_id' => '',
       // 'delivery_id' => '',
       // 'client_id' => '',

    ];

    public function render(TreasuryService $service)
    {
        return view('livewire.treasury.treasury', [
            'items' => $service->getInstance()->all()
        ]);
    }

    public function submit(TreasuryService $service){
        if (!in_array($this->fields['type'], ['recipes','depenses'])) {

            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('type no exist')
            ]);
        }
        $item = $service->execute('create', $this->fields);

        if ($item) {
            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }
    /**** private method ***/
    private function resetInput()
    {
        $this->fields = null;

    }

    public function cancel()
    {
        $this->isUpdate = false;
       // $this->isCreate = true;
        $this->resetInput();
    }


    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
