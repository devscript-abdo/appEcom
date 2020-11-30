<?php

namespace App\Services;

use App\Http\Requests\LeadRequest;
use App\Repositories\Lead\LeadRepositoryInterface;
use Illuminate\Support\Facades\Gate;

class LeadService extends Servicer
{


    protected $model;
    protected static $_instance = null;
    /**
     * LeadService constructor.
     * @param LeadRepositoryInterface $lead
     */
    public function __construct(LeadRepositoryInterface $lead)
    {

        $this->model = $lead;
    }
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

    /**
     * @return LeadRequest
     */
    protected function getRequest()
    {
        return  new LeadRequest();
    }



    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        $form = $this->getRequest();
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function update(array $data)
    {
        $id = $data['id'];
        $form = $this->getRequest();
        $form->setId($id);
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->update($data, $id);
    }


    /******Authorisations system  */

    /**
     *
     */
    public function getPermissions()
    {
        $response = Gate::inspect('update', $lead);

        if (!$response->allowed()) {
            $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('leadData.lead.permission.update')
                ]
            );
            return;
        }
    }
}
