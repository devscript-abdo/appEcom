<div>

    @if($isUpdate)
        @include('livewire.command.command')
    @endif
    {{--dd($categories)--}}
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
                                @if($isDelivery)
                                 @include('livewire.command._delivery')
                                @endif
                            </tr>
                            <tr>
                                <th colspan="5">{{__('tables.total_commands')}} : {{$commands->count()}}</th>
                                {{--<th colspan="3">Activity</th>--}}
                            </tr>
                            <tr>
                                <th class="w30">&nbsp;</th>
                                <th>{{__('tables.code')}}</th>
                                <th>{{__('tables.fullname')}}</th>
                                <th>{{__('tables.city')}}</th>
                                <th>{{__('tables.addresse')}}</th>
                                <th>{{__('tables.tele')}}</th>
                                <th>{{__('tables.product')}}</th>
                                <th>{{__('tables.quantity')}}</th>
                                <th>{{__('tables.price')}}</th>
                                <th>{{__('tables.status')}}</th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($commands as $command)
                                <tr style="{{$command->admin_id ?'color:#b2a5ab':''}}">
                                    <td class="width45" id="selectCommand">
                                        <label class="custom-control custom-checkbox mb-0">
                                            <input wire:model.defer="selected" type="checkbox"
                                                   class="custom-control-input" name="selected[]"
                                                   value="{{ $command->id }}">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </td>
                                    <td>{{$command->command_number}}</td>
                                    <td><span>{{$command->fullname}}</span></td>
                                    <td><span>{{$command->ville}}</span></td>
                                    <td><span>{{$command->address}}</span></td>
                                    <td><span>{{$command->tele}}</span></td>
                                    <td><span>{{$command->product->name}}</span></td>
                                    <td><span>{{$command->command_quantity}}</span></td>
                                    <td><span>{{$command->command_price}}</span></td>
                                    <td><span class="tag tag-default">{{$command->status}}</span></td>
                                    <td><a wire:click="editCommand({{ $command->id }})" href="javascript:void(0);"
                                           class="btn btn-success btn-sm" onclick="topFunction()">
                                            {{__('action.edit')}}
                                        </a>
                                    </td>
                                    <td>
                                        <button wire:click="deleteCommand({{$command->id}})" class="btn btn-danger btn-sm">
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
