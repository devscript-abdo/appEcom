<div>

    @if($isUpdate)
        @include('livewire.admin.__update')
    @else
        @include('livewire.admin.__create')
    @endif
    {{--dd($categories)--}}
    <div class="row clearfix">
        {{--$products->onEachSide(2)->links()--}}
        {{--$commands->links()--}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ __('adminCrud.admin.list') }}</h3>

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
                                </a>

                                <a wire:click="moveTo('moderator')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-user"></i>
                                    {{ __('productData.product.export.moderator') }}
                                </a>--}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                            <thead>
                            <tr>
                                <th colspan="5">Ticket Detail</th>
                                <th colspan="3">Activity</th>
                            </tr>
                            <tr>
                                <th class="w30">&nbsp;</th>
                                <th>{{__('adminCrud.admin.table.fullname')}}</th>
                                <th>{{__('adminCrud.admin.table.city')}}</th>
                                {{--<th>{{__('adminCrud.admin.table.address')}}</th>--}}
                                <th>{{__('adminCrud.admin.table.tele')}}</th>
                                <th>{{__('adminCrud.admin.table.email')}}</th>
                                <th>{{__('adminCrud.admin.table.status')}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td class="width45" id="selectCommand">
                                        <label class="custom-control custom-checkbox mb-0">
                                            <input wire:model.defer="selected" type="checkbox"
                                                   class="custom-control-input" name="selected[]"
                                                   value="{{ $user->id }}">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </td>

                                    <td><span>{{$user->fullname}}</span></td>
                                    <td><span>{{$user->city->name}}</span></td>
                                    {{--}}<td><span>{{$user->address}}</span></td>--}}
                                    <td><span>{{$user->tele}}</span></td>
                                    <td><span>{{$user->email}}</span></td>
                                    <td><span class="tag tag-default">{{$user->status}}</span></td>
                                    <td>
                                        <a wire:click="editAdmin({{ $user->id }})" href="javascript:void(0);"
                                           class="btn btn-success btn-sm" onclick="topFunction()">Edit</a>
                                    </td>
                                    <td>
                                        <button wire:click="deleteAdmin({{ $user->id }})"
                                                class="btn btn-danger btn-sm"><i class="icon-trash"></i></button>
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

