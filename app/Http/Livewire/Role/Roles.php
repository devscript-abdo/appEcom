<?php

namespace App\Http\Livewire\Role;

use App\Services\RoleService;
use Livewire\Component;

class Roles extends Component
{
    public $isUpdate = false;
    public $roleId;

    public $fields=['name'=>''];

    public function render(RoleService $roleService)
    {
        return view('livewire.role.roles',[
            'roles'=>$roleService->getInstance()->All()
        ]);
    }

    public function mount()
    {

    }

    public function submit(RoleService $roleService)
    {
        if(!isset($this->fields) || !is_array($this->fields)){
            return false;
        }
        $role = $roleService->execute('create',$this->fields);
        if($role){

            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('deliveryData.delivery.added.ok')
            ]);
        }
        return false;
    }


    public function editRole(RoleService $roleService,$id)
    {
        $role = $roleService->getInstance()->Find($id);
        $this->roleId = $role->id;
        $this->fields = $role->toArray();
        $this->isUpdate = true;

    }
    public function update(RoleService $roleService)
    {
        if(!isset($this->roleId) || !is_int($this->roleId)) return false;

        $r = $roleService->getInstance()->Find($this->roleId);

        if ($this->fields ===  $r->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.added.update.nochange')
                ]
            );

        }

        if ($this->roleId) {

            $r = $roleService->execute('update', $this->fields);

            if ($r) {
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
    public function deleteRole(RoleService $roleService,$id)
    {
        if ($id) {
            $roleService->getInstance()->delete($id) ?
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

    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetInput();
    }

    /**** private method ***/
    private function resetInput()
    {
        $this->fields = null;
    }




    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
