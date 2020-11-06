<?php

namespace App\Http\Livewire\Lead;

use App\Http\Requests\LeadRequest;
use Livewire\Component;
use Livewire\WithPagination;

use App\Repositories\Group\GroupRepositoryInterface;
use App\Repositories\Lead\LeadRepositoryInterface;
use App\Repositories\Moderator\ModeratorRepositoryInterface;

use App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface;
use App\Traits\ItemsQuery;

use function PHPUnit\Framework\isNull;

class Leads extends Component
{
    use WithPagination;

    public $isUpdate = false;
    public $isGroup = false;
    public $isModerator = false;

    public $leadId;
    public $authAdmin;

    public $groups;
    public $moderators;

    public $selected = []; //when user click to checkbox
    public $model;
    public $nom;
    public $fields = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'ville' => '',
        'address' => '',
        'tele' => '',
        'produit' => '',
        'group' => ''
    ];


    //protected $listeners = ['editLead'];

    protected $paginationTheme = 'bootstrap';

    public $filter = [];

    public $data = [];

    protected $updatesQueryString = ['filter'];

    public function render(LeadRepositoryInterface $leadRepo)
    {

        $leads = new ItemsQuery($this->filter, $leadRepo);

        return view('livewire.lead.__basic', [

            //'leads' => $leadRepo->query()
            'leads' =>    $leads->paginate(10)

        ]);
    }
    public function setfilter()
    {
        if (!is_array($this->filter) && isNull($this->filter)) {

            return;
        }
        $this->filter = array_filter(array_map('trim', $this->data));
    }

    public function mount(

        GroupRepositoryInterface $groupRepo,
        ModeratorRepositoryInterface $moderatorRepo,
        LoggedGuardRepositoryInterface $loggedUser
    ) {

        $this->groups = $groupRepo->select(['id', 'name', 'slug']);
        $this->moderators = $moderatorRepo->select(['id', 'nom', 'prenom']);
        $this->authAdmin = $loggedUser->loggedUser();
    }

    public function submit(LeadRepositoryInterface $newLead)
    {

        $form = new LeadRequest();
        $form->merge($this->fields);
        $data = $form->validate($form->rules());
        $lead = $newLead->create($data);
        if ($lead) {
            $this->resetIput();
            return $this->sendNotificationTobrowser(
                'attachedToAction',
                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.added.ok')
                ]
            );
            //return redirect()->route('admin.leads');
        }
    }


    public function editLead(LeadRepositoryInterface $editLead, $id)
    {
        $lead = $editLead->findOrFail($id);

        $this->leadId = $lead->id;
        $this->isUpdate = true;
        $this->fields = $lead->toArray();
    }
    public function update(LeadRepositoryInterface $updateLead)
    {

        $form = new LeadRequest();
        $form->setId($this->leadId);
        $form->merge($this->fields);
        $data = $form->validate($form->rules());

        if ($this->leadId) {
            $lead =  $updateLead->update($data, $this->leadId);
            if ($lead) {
                $this->resetIput();
                return $this->sendNotificationTobrowser(
                    'attachedToAction',
                    [
                        'type' => 'success',
                        'message' => trans('leadData.lead.added.update')
                    ]
                );
                // return redirect()->route('admin.leads');
            }
        }
    }
    public function deleteLead(LeadRepositoryInterface $delete, $id)
    {
        if ($id) {
            return  $delete->delete($id) ?
                $this->sendNotificationTobrowser(
                    'attachedToAction',
                    [
                        'type' => 'success',
                        'message' => trans('leadData.lead.added.delete')
                    ]
                )
                :
                $this->sendNotificationTobrowser(
                    'attachedToAction',
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
        $this->resetIput();
    }

    /**** private method ***/
    private function resetIput()
    {
        $this->fields = null;
    }

    /*****Multi action  Elmarzougui Abdelghafour at haymacproduction */

    public function moveTo($action)
    {
        if (!$this->selected || !$action) {
            return $this->sendNotificationTobrowser(
                'attachedToAction',
                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );
            return;
        }
        switch ($action) {
            case 'group':
                $this->isGroup = true;
                break;
            case 'moderator':
                $this->isModerator = true;
                break;
            default:
                $this->isGroup = false;
                $this->isModerator = false;
                return;
        }
    }
    public function moveToAction(LeadRepositoryInterface $upleads, $action)
    {

        if (!$this->selected || !$action) {
            return $this->sendNotificationTobrowser(
                'attachedToAction',
                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );
            return;
        }

        $relation = ['group' => 'group_id', 'moderator' => 'moderator_id'];

        $selects = $upleads->find(array_filter($this->selected));

        if ($selects) {

            foreach ($selects as $select) {
                $select->update([$relation[strval($action)] => intval($this->model)]);
            }
            return $this->sendNotificationTobrowser(
                'attachedToAction',
                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.export.success')
                ]
            );
            // return redirect()->route('admin.leads');
        }
        return $this->sendNotificationTobrowser(
            'attachedToAction',
            [
                'type' => 'error',
                'message' => trans('leadData.lead.export.error')
            ]
        );
        // return redirect(route('admin.leads'))->withError('Sorry problem detected');
    }

    public function deleteMultiLead(LeadRepositoryInterface $leads)
    {
        if (!$this->selected) {
            return $this->sendNotificationTobrowser(
                'attachedToAction',
                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );
            return;
        }
        if ($this->selected) {
            $leads->destroy(array_filter($this->selected));
            return $this->sendNotificationTobrowser(
                'attachedToAction',
                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.delete.success')
                ]
            );
            // return redirect()->route('admin.leads');
        }
        return $this->sendNotificationTobrowser(
            'attachedToAction',
            [
                'type' => 'error',
                'message' => trans('leadData.lead.delete.success')
            ]
        );
        //return redirect(route('admin.leads'))->withError('Sorry problem detected');
    }

    private function sendNotificationTobrowser($name, $options = [])
    {
        $this->dispatchBrowserEvent($name, $options);
    }
}
