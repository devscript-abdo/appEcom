<?php

namespace App\Http\Livewire\Product;

use App\Http\Requests\ProductRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use Livewire\Component;

use Livewire\WithPagination;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Traits\ItemsQuery;

use Illuminate\Support\Facades\Gate;

class Products extends Component
{
    use WithPagination, AuthorizesRequests;

    public $isUpdate = false;

    public $productId;
    public $authAdmin;
    public $categories;
    public $selected = []; //when user click to checkbox

    public $filter = [];

    public $data = [];

    public $allowedsFilters = [];

    public $fields = [
        'name' => '',
        'photo' => '',
        'description' => '',
        'quantity' => '',
        'price'=>'',
        'category_id' => '',
    ];

    protected $model;

    protected $paginationTheme = 'bootstrap';
    protected $updatesQueryString = ['filter'];

    public function mount(
        LoggedGuardRepositoryInterface $loggedUser,
        ProductRepositoryInterface $product,
        CategoryRepositoryInterface $category
    ) {
        //$this->categories = $category->all();
        $this->categories = $category->selectWithType(['name', 'id'], 'products');
        $this->model = $product;
        $this->authAdmin = $loggedUser->loggedUser();
    }


    public function render(ProductRepositoryInterface $product)
    {

        return view('livewire.product.products', [

            'products' =>    $product->withRelations(['category', 'admin','commands'])
            ->withCount('commands')
            ->paginate(10),
            // 'products' =>    $product->paginate(10)
        ]);
    }
    public function setfilter()
    {
        if (!$this->data) {

            return $this->sendNotificationTobrowser(
                'attachedToAction',
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

    public function submit(ProductRepositoryInterface $newproduct, LoggedGuardRepositoryInterface $auth)
    {


        $relation = $auth->getLoggedUserType();
        $form = new ProductRequest();
        $form->merge($this->fields);
        $data = $form->validate($form->rules());

        $product = $newproduct->create($data);
        if ($product) {

            $product->$relation()->associate($auth->loggedUserId())->save();

            $this->resetIput();

            return $this->sendNotificationTobrowser(['type' => 'success', 'message' => trans('productData.product.added.ok')]);
        }
    }

    private function permission()
    {
        // $this->authorize('update', $lead);
        $response = Gate::inspect('update', $product);

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
    public function editProduct(ProductRepositoryInterface $edit, $id)
    {
        $product = $edit->findOrFail($id);

        $this->productId = $product->id;
        $this->isUpdate = true;
        $this->fields = $product->toArray();
    }
    public function update(ProductRepositoryInterface $upProduct)
    {

        $product = $upProduct->findOrFail($this->productId);

        if ($this->fields === $product->toArray()) {
            $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('productData.product.added.update.nochange')
                ]
            );
            return;
        }

        $form = new ProductRequest();
        $form->setId($this->productId);
        $form->merge($this->fields);
        $data = $form->validate($form->rules());

        if ($this->productId) {

            $product =  $upProduct->update($data, $this->productId);

            if ($product) {
                // event(new LeadCreated($lead));
                $this->resetIput();
                return $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('productData.product.added.update')
                    ]
                );
                // return redirect()->route('admin.leads');
            }
        }
    }
    public function deleteProduct(ProductRepositoryInterface $deleteProduct, $id)
    {
        if ($id) {
            return  $deleteProduct->delete($id) ?
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'success',
                        'message' => trans('productData.product.added.delete')
                    ]
                )
                :
                $this->sendNotificationTobrowser(

                    [
                        'type' => 'error',
                        'message' => trans('productData.product.delete.error')
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


    public function deleteMultiProducts(ProductRepositoryInterface $products)
    {
        if (!$this->selected) {

            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('productData.product.export.select')
                ]
            );

            return;
        }
        if ($this->selected) {
            $products->destroy(array_filter($this->selected));
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'success',
                    'message' => trans('productData.product.delete.success')
                ]
            );
            // return redirect()->route('admin.leads');
        }
        return $this->sendNotificationTobrowser(

            [
                'type' => 'error',
                'message' => trans('productData.product.delete.success')
            ]
        );
        //return redirect(route('admin.leads'))->withError('Sorry problem detected');
    }

    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
