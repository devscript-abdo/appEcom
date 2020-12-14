<?php

namespace App\Http\Livewire\Command;

use App\Notifications\RealTimeNotification;
use App\Services\AuthService;
use App\Services\DeliveryService;
use Livewire\Component;

use App\Services\CommandService;

class Commands extends Component
{

    public $commands;
    public $isUpdate = false;
    public $isDelivery = false;
    public $commandeId;
    public $selected = [];

    public $users;
    public $delivery;

    public $fields = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'ville' => '',
        'address' => '',
        'tele' => '',
        'product' => '',
        'command_quantity' => '',
        'command_price' => '',
        'notes' => '',
        'status' => ''

    ];

    public function render(CommandService $commandService, DeliveryService $deliveryService, AuthService $authService)
    {
        $auth = $authService->getInstance()->getLoggedUserType();

        $this->commands = $commandService->auth()
            ->commands()
            ->with('product')
            ->get();
        if ($auth !== 'delivery') {
            $this->users = $deliveryService->getInstance()
                ->with(['ville'])
                ->select(['nom', 'prenom', 'id', 'city_id'])
                ->get();
            return view('livewire.command._commands', [
                'commands' => $this->commands,
                'users' => $this->users

            ]);
        } else {

            return view('livewire.command.___commands', [
                'commands' => $this->commands,
            ]);
        }
    }

    public function editCommand(CommandService $commandService, $id)
    {

        $command = $commandService->getInstance()->findOrFail($id);
        $this->commandeId = $command->id;
        $this->isUpdate = true;
        $this->fields = $command->toArray();
        $this->fields['product'] = $command->product->name;
    }

    public function updateCommand(CommandService $commandService)
    {
        $command = $commandService->getInstance()->findOrFail($this->commandeId);
        if ($command) {
            $run = $commandService->execute('update', $this->fields);
            if ($run) {
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => "la commande a été modifier avec success"
                    ]
                );
            }
        }
        return false;
    }

    public function deleteCommand(CommandService $commandService, $id)
    {

        $command = $commandService->getInstance()->findOrFail($id);

        if ($command) {

            $commandService->getInstance()->destroy($id);

            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.delete.success')
                ]
            );
        }
    }

    public function deleteCommands(CommandService $commandService)
    {
        if (!$this->selected) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );
        }
        if ($this->selected) {
            $commandService->getInstance()->destroy(array_filter($this->selected));
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.delete.success')
                ]
            );
        }
        return $this->sendNotificationTobrowser(

            [
                'type' => 'error',
                'message' => trans('leadData.lead.delete.success')
            ]
        );
    }

    public function moveTo($action)
    {

        if (!$this->selected || !$action) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );
        } else {
            switch ($action) {
                case 'delivery':
                    $this->isDelivery = true;
                    break;
                default:
                    $this->isDelivery = false;

            }
        }
        return false;
    }

    public function moveToAction(CommandService $commandService, DeliveryService $deliveryService, $action)
    {

        if (!$this->selected || !$action) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );

        }

        $selects = $commandService->getInstance()->find(array_filter($this->selected));
      //  $user = $deliveryService->getInstance()->find($this->delivery);
        if ($selects) {

            foreach ($selects as $select) {
                $select->update(['delivery_id' => intval($this->delivery)]);
              //  $user->notify(new RealTimeNotification('New Command Here '));
            }
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.export.success')
                ]
            );
        }
        return $this->sendNotificationTobrowser(

            [
                'type' => 'error',
                'message' => trans('leadData.lead.export.error')
            ]
        );
    }


    public function cancel()
    {
        $this->isUpdate = false;
        $this->fields = null;

    }

    protected function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
