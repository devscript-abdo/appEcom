<?php

namespace App\Http\Livewire\Group;

use App\Services\AuthService;
use App\Services\GroupService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Groups extends Component
{

    public $isUpdate = false;
    public $isLoad = false;

    public $group;

    public $leads;

    public $groupId;

    public $authAdmin;

    public $fields = [
        'name' => '',
        'description' => '',
    ];

    public function render(GroupService $groupService){

        return view('livewire.group.__groups',[

            'groups' =>$groupService->getInstance()->with(['admin'])->get(),

        ]);
    }
    public function mount(GroupService $groupService , AuthService $auth)
    {
        $this->authAdmin = $auth->getInstance()->loggedUser();
    }

    public function submit(GroupService $groupService)
    {

        $lead = $groupService->execute('create', $this->fields);

        if ($lead) {
            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;

    }

    public function loadData(GroupService $groupService,$id)
    {

        $this->group = $groupService->getInstance()->findOrFail($id);
        $this->isLoad = true;
        $this->leads = $this->group->leads()->get();
    }
    public function editGroup(GroupService $groupService,$id)
    {
        $group = $groupService->getInstance()->findOrFail($id);
        $this->groupId = $group->id;
        $this->fields = $group->toArray();
        $this->isUpdate = true;

    }
    public function update(GroupService $groupService)
    {
        $grp = $groupService->getInstance()->findOrFail($this->groupId);

        if ($this->fields === $grp->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );

        }

        if ($this->groupId) {

            $grp = $groupService->execute('update', $this->fields);

            if ($grp) {
                $this->resetInput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('messages.updated.ok')
                    ]
                );
            }
        }
        return false ;
    }
    public function deleteGroup(GroupService $groupService,$id)
    {
        if ($id) {
            $groupService->getInstance()->delete($id) ?
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
