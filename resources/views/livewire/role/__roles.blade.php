<div>

    <div class="row clearfix">
        {{--$products->onEachSide(2)->links()--}}
        {{--$commands->links()--}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('tables.list') }}</h3>

                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                                class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                                class="fe fe-maximize"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        <div class="item-action dropdown ml-2">
                            <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">

                                {{--<a wire:click="moveTo('group')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-copy"></i>
                                    {{ __('productData.product.export.group') }}
                                </a>--}}

                                <a wire:click="moveTo('delivery')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-ship"></i>
                                    {{ __('Send to dilevery') }}
                                </a>
                                <a wire:click="deleteCommands()" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-trash"></i>
                                    {{ __('productData.product.export.delete') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                            <thead>
                            <tr>
                                @if($isUpdate)
                                    @include('livewire.role.__update')
                                @else
                                    @include('livewire.role.__create')
                                @endif
                            </tr>
                            <tr>
                                <th class="w30">&nbsp;</th>
                                <th>{{__('tables.id')}}</th>
                                <th>{{__('tables.name')}}</th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td class="width45" id="selectCommand">
                                        <label class="custom-control custom-checkbox mb-0">
                                            <input wire:model.defer="selected" type="checkbox"
                                                   class="custom-control-input" name="selected[]"
                                                   value="{{ $role->id }}">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </td>
                                    <td>{{$role->id}}</td>
                                    <td><span>{{$role->name}}</span></td>


                                    <td><a wire:click="editRole({{ $role->id }})" href="javascript:void(0);"
                                           class="btn btn-success btn-sm" onclick="topFunction()">
                                            {{__('action.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <button wire:click="deleteRole({{$role->id}})" class="btn btn-danger btn-sm">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
