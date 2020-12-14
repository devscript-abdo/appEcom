<?php

namespace App\Http\Livewire\Lead;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

use App\Services\AuthService;
use App\Services\CommandService;
use App\Services\GroupService;
use App\Services\LeadService;
use App\Services\ModeratorService;
use App\Services\ProductService;
use App\Traits\ItemsQuery;

class Leads extends Component
{
    use WithPagination, AuthorizesRequests;

    public $isUpdate = false;
    public $isGroup = false;
    public $isModerator = false;
    public $isCommand = false;
    public $isCreate = true;
    public $leadId;
    public $commanderId;
    public $authAdmin;

    public $groups;
    public $moderators;
    public $products;

    public $selected = []; //when user click to checkbox
    public $model;
    public $total;

    public $fields = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'ville' => '',
        'address' => '',
        'tele' => '',
        'produit' => '',
        'group_id' => '',
    ];

    public $commands = [
        'nom' => '',
        'prenom' => '',
        'email' => '',
        'ville' => '',
        'address' => '',
        'tele' => '',
        'product_id' => '',
        'command_quantity' => '',
        'command_price' => ''

    ];

    protected $paginationTheme = 'bootstrap';

    public $filter = [];

    public $data = [];

    protected $updatesQueryString = ['filter'];

    /**
     * @param GroupService $group
     * @param ModeratorService $moderator
     * @param AuthService $auth
     */
    public function mount(

        GroupService $group,
        ModeratorService $moderator,
        AuthService $auth
    )
    {

        $this->groups = $group->getInstance()->select(['id', 'name', 'slug']);
        $this->moderators = $moderator->getInstance()->select(['id', 'nom', 'prenom']);
        $this->authAdmin = $auth->getInstance()->loggedUser();
    }

    /**
     * @param LeadService $lead
     * @return Application|Factory|View
     */
    public function render(LeadService $lead)
    {

        $relation = $lead->getInstance()->auth()->getLoggedUserType();

        $leads = new ItemsQuery($lead, $this->filter);

        if ($relation === 'moderator') {

            return view('livewire.lead.__basic', [

                'leads' => $leads->with(['group'])
                    //->app()
                    // ->forLoggedUser()
                    ->where('moderator_id', $lead->getInstance()->auth()->loggedUserId())
                    ->paginate(10)
            ]);
        } else {

            return view('livewire.lead.__basic', [

                'leads' => $leads->with(['group', 'moderator'])->paginate(10),
            ]);
        }
    }

    /**
     * @param LeadService $newLead
     */
    public function submit(LeadService $newLead)
    {
        $lead = $newLead->execute('create', $this->fields);

        if ($lead) {
            $this->resetIput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }

    /**
     * @param LeadService $editLead
     * @param $id
     */
    public function editLead(LeadService $editLead, $id)
    {
        $lead = $editLead->getInstance()->findOrFail($id);

        $this->leadId = $lead->id;
        $this->isUpdate = true;
        $this->isCreate = false;
        $this->isCommand = false;
        $this->fields = $lead->toArray();
    }

    /**
     * @param LeadService $updateLead
     * @return bool|void
     */
    public function update(LeadService $updateLead)
    {
        $lead = $updateLead->getInstance()->findOrFail($this->leadId);

        if ($this->fields === $lead->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );

        }

        if ($this->leadId) {

            $lead = $updateLead->execute('update', $this->fields);

            if ($lead) {
                $this->resetIput();
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

    /**
     * @param LeadService $delete
     * @param $id
     */
    public function deleteLead(LeadService $delete, $id)
    {
        if ($id) {
            $delete->getInstance()->delete($id) ?
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

    /**
     *
     */
    public function cancel(): void
    {
        $this->isUpdate = false;
        $this->isCreate = true;
        $this->resetIput();
    }

    public function cancelCmd(): void
    {
        $this->isCommand = false;
        $this->isCreate = true;
        $this->resetIput();
    }

    /**** private method ***/
    private function resetIput()
    {
        $this->fields = null;
        $this->commands = null;
    }

    /**
     * @param LeadService $Lead
     * @param ProductService $product
     * @param $id
     */
    public function makeCommand(LeadService $Lead, ProductService $product, $id)
    {
        $lead = $Lead->getInstance()->findOrFail($id);
        $this->commanderId = $lead->id;
        $this->isCreate = false;
        $this->isUpdate = false;
        $this->isCommand = true;
        $this->products = $product->getInstance()->select(['id', 'name']);
        $this->commands = $lead->toArray();
    }

    /**
     * @param LeadService $Lead
     * @param CommandService $command
     */
    public function generateCommand(LeadService $Lead, CommandService $command)
    {

        if (is_null($this->commands) || is_null($this->commanderId)) {

            return exit;
        }
        if (!isset($this->commands['product_id'])) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => "selecionner un produit"
                ]
            );
        }
        if (isset($this->commanderId) && intval($this->commanderId)) {
            $lead = $Lead->getInstance()->findOrFail($this->commanderId);
            $exit = $command->execute('alreadyCommanded', ['lead' => $this->commanderId, 'product' => $this->commands['product_id']]);
            if ($exit) {

                $this->resetIput();

                $this->isCreate = true;
                $this->isCommand = false;

                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'warning',
                        'message' => "vous avez deja génerer une commande pour ce client"
                    ]
                );


            }

            if ($lead) {
                $cmd = $command->execute('create', array_merge($this->commands, ['lead_id' => $this->commanderId]));
                if ($cmd) {

                    $this->resetIput();

                   return  $this->sendNotificationTobrowser(

                        [
                            'type' => 'success',
                            'message' => trans('la command a bien généréer')
                        ]
                    );
                }
            }
        }
        return exit;
    }

    /**
     * @param $action
     */
    public function moveTo($action)
    {
        if (!$this->selected || !$action) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );

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

        }
    }

    /**
     * @param LeadService $upleads
     * @param $action
     */
    public function moveToAction(LeadService $upleads, $action)
    {

        if (!$this->selected || !$action) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.export.select')
                ]
            );

        }

        $relation = ['group' => 'group_id', 'moderator' => 'moderator_id'];

        $selects = $upleads->getInstance()->find(array_filter($this->selected));

        if ($selects) {

            foreach ($selects as $select) {
                $select->update([$relation[strval($action)] => intval($this->model)]);
            }
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('leadData.lead.export.success')
                ]
            );
            // return redirect()->route('admin.leads');
        }
       return  $this->sendNotificationTobrowser(

            [
                'type' => 'error',
                'message' => trans('leadData.lead.export.error')
            ]
        );
        // return redirect(route('admin.leads'))->withError('Sorry problem detected');
    }

    /**
     * @param LeadService $leads
     */
    public function deleteMultiLead(LeadService $leads)
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
            $leads->getInstance()->destroy(array_filter($this->selected));
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('messages.deleted.ok')
                ]
            );
            // return redirect()->route('admin.leads');
        }
        return $this->sendNotificationTobrowser(

            [
                'type' => 'error',
                'message' => trans('messages.deleted.no')
            ]
        );
    }


    /********************Filters */

    public function setfilter()
    {
        if (!$this->data) {

            return $this->sendNotificationTobrowser(
                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.filter.warning')
                ]
            );

        }

        if ($this->data && array_key_exists('from_to', $this->data)) {

            $this->data['from_to'] = implode(',', array_reverse($this->data['from_to']));
        }
        $this->data = array_filter(array_map('trim', $this->data));

        $this->filter = $this->data;
        $this->data = null;
    }


    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }

}
