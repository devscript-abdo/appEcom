<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Services\AdminService;
use App\Services\CityService;
use App\Services\RoleService;

class Admins extends Component
{
    public $isUpdate = false;

    public $villes;
    public $roles;

    public $adminId;

    public $fields = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'password' => '',
        'city_id' => '',
        'address' => '',
        'tele' => '',
        'role' => null,
    ];

    /**
     * @param AdminService $adminService
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render(AdminService $adminService)
    {
        $users = $adminService->getInstance()->with(['city'])->get();

        return view('livewire.admin.admins', [

            'users' => $users,

        ]);
    }

    /**
     * @param CityService $city
     * @param RoleService $roles
     */
    public function mount(
        CityService $city,
        RoleService $roles
    )
    {

        $this->villes = $city->getInstance()->getSelect(['id', 'name']);
        $this->roles = $roles->getInstance()->Select(['id', 'name'])->get();
    }

    /**
     * @param AdminService $newAdmin
     * @return bool|void
     */
    public function submit(AdminService $newAdmin)
    {
        $admin = $newAdmin->execute('create', $this->fields);

        if ($admin) {
            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('adminCrud.admin.added.ok')
            ]);
        }
        return false;
    }

    /**
     * @param AdminService $Admin
     * @param $id
     */
    public function editAdmin(AdminService $Admin, $id)
    {
        $admin = $Admin->getInstance()->findOrFail($id);

        $this->adminId = $admin->id;
        $this->fields = $admin->toArray();

        $this->isUpdate = true;
    }

    /**
     * @param AdminService $updateAdmin
     * @return bool|void
     */
    public function update(AdminService $updateAdmin)
    {

        if ($this->adminId) {

            $admin = $updateAdmin->execute('update', $this->fields);

            if ($admin) {
                $this->resetInput();
                return $this->sendNotificationTobrowser([
                    'type' => 'success',
                    'message' => trans('adminCrud.admin.added.ok')
                ]);
            }
        }
        return false;
    }


    /**
     *
     */
    public function cancel()
    {
        $this->isUpdate = false;
        $this->resetInput();
    }

    /**
     * @param AdminService $deleteAdmin
     * @param $id
     */
    public function deleteAdmin(AdminService $deleteAdmin, $id)
    {
        $deleteAdmin->getInstance()->deleteAdmin($id) ?
            $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('adminCrud.admin.delete.success')
                ]
            )
            :
            $this->sendNotificationTobrowser(

                [
                    'type' => 'error',
                    'message' => trans('adminCrud.admin.delete.error')
                ]
            );
    }

    /**
     *
     */
    private function resetInput()
    {
        $this->fields = null;

    }

    /**
     * @param array $options
     */
    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
