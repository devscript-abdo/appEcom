<div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="id">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Priority">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Department">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Agent">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="input-group">
                            <input type="text" class="form-control" data-provide="datepicker" placeholder="Date">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <a href="javascript:void(0);" class="btn btn-primary btn-block" title="">Search</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($isUpdate)
        @include('livewire.command.command')
    @endif
    <div class="col-12">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                    <thead>
                    <tr>
                        <th colspan="5">Ticket Detail</th>
                        <th colspan="3">Activity</th>
                    </tr>
                    <tr>
                        <th class="w30">&nbsp;</th>
                        <th>{{__('commandData.command.table.code')}}</th>
                        <th>{{__('commandData.command.table.fullname')}}</th>
                        <th>{{__('commandData.command.table.city')}}</th>
                        <th>{{__('commandData.command.table.address')}}</th>
                        <th>{{__('commandData.command.table.tele')}}</th>
                        <th>{{__('commandData.command.table.product')}}</th>
                        <th>{{__('commandData.command.table.qte')}}</th>
                        <th>{{__('commandData.command.table.price')}}</th>
                        <th>{{__('commandData.command.table.status')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($commands as $command)
                        <tr>
                            <td>
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </td>
                            <td><a href="#" wire:click="editCommand({{$command->id}})">{{$command->command_number}}</a></td>
                            <td><span>{{$command->fullname}}</span></td>
                            <td><span>{{$command->ville}}</span></td>
                            <td><span>{{$command->address}}</span></td>
                            <td><span>{{$command->tele}}</span></td>
                            <td><span>{{$command->product->name}}</span></td>
                            <td><span>{{$command->command_quantity}}</span></td>
                            <td><span>{{$command->command_price}}</span></td>
                            <td><span class="tag tag-default">{{$command->status}}</span></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
