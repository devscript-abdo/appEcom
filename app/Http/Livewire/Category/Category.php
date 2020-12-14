<?php

namespace App\Http\Livewire\Category;

use App\Services\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

class Category extends Component
{

    public $isUpdate = false;
    public $isCreate = true;
    public $fields = ['name'=>'','type'=>''];
    public $cateId;
    public $selected = []; //when user click to checkbox

    public function mount()
    {

    }

    /**
     * @param CategoryService $categoryService
     * @return Application|Factory|View
     */
    public function render(CategoryService $categoryService)
    {
        return view('livewire.category.category', [
            'categories' => $categoryService->getInstance()
                ->query()
                ->select(['id', 'name'])
                ->withCount('products')
                ->get()
        ]);
    }

    /**
     * @param CategoryService $categoryService
     * @return bool|void
     */
    public function submit(CategoryService $categoryService){

        $cate = $categoryService->execute('create', $this->fields);

        if ($cate) {
            $this->resetInput();
            return $this->sendNotificationTobrowser([
                'type' => 'success',
                'message' => trans('messages.added.ok')
            ]);
        }
        return false;
    }

    /**
     * @param CategoryService $categoryService
     * @param $id
     */
    public function editCategory(CategoryService $categoryService,$id){
        $cate = $categoryService->getInstance()->findOrFail($id);

        $this->cateId = $cate->id;
        $this->isUpdate = true;
        $this->isCreate = false;
        $this->fields = $cate->toArray();
    }

    /**
     * @param CategoryService $categoryService
     * @return bool|void
     */
    public function update(CategoryService $categoryService){
        $cate = $categoryService->getInstance()->findOrFail($this->cateId);

        if ($this->fields === $cate->toArray()) {
            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('messages.nochange')
                ]
            );

        }

        if ($this->cateId) {

            $lead = $categoryService->execute('update', $this->fields);

            if ($lead) {
                $this->resetInput();
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
     * @param CategoryService $categoryService
     * @param $id
     */
    public function deleteCategory(CategoryService $categoryService , $id){

        if ($id) {
            $categoryService->getInstance()->delete($id) ?
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

    public function deleteMultiCats(CategoryService $categoryService){

        if (!$this->selected) {

            return $this->sendNotificationTobrowser(

                [
                    'type' => 'warning',
                    'message' => trans('productData.product.export.select')
                ]
            );


        }
        if ($this->selected) {
            $categoryService->getInstance()->destroy(array_filter($this->selected));
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
    /**** private method ***/
    private function resetInput()
    {
        $this->fields = null;

    }

    public function cancel()
    {
        $this->isUpdate = false;
        $this->isCreate = true;
        $this->resetInput();
    }


    private function sendNotificationTobrowser($options = [])
    {
        $this->dispatchBrowserEvent('attachedToAction', $options);
    }
}
