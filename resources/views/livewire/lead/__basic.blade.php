<div>
        @if($isUpdate)
         @include('livewire.lead.__update')
        @else
         @include('livewire.lead.__create')
        @endif

        @if($isGroup)
          @include('livewire.lead.__moveTo')
        @endif
        @if($isModerator)
          @include('livewire.lead.__moderator')
        @endif
       @include('livewire.lead.__filter')
       {{$leads->links()}}
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{__('leadData.lead.list')}}</h3>
           
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        <div class="item-action dropdown ml-2">
                            <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                             
                                <a wire:click="moveTo('group')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-copy"></i>
                                    {{__('leadData.lead.export.group')}}
                                </a>
 
                                <a wire:click="moveTo('moderator')" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-user"></i> 
                                    {{__('leadData.lead.export.moderator')}}
                                </a>
                                <a wire:click="deleteMultiLead()" href="javascript:void(0)" class="dropdown-item">
                                    <i class="dropdown-icon fa fa-trash"></i> 
                                    {{__('leadData.lead.export.delete')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter text-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="custom-control custom-checkbox mb-0">
                                            <input  type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                            <span class="custom-control-label">&nbsp;</span>
                                        </label>
                                    </th>
                                    {{--<th>{{__('leadData.lead.table.group')}}</th>
                                    <th>{{__('leadData.lead.table.moderator')}}</th>--}}
                                    {{--<th>{{__('leadData.lead.table.fname')}}</th>
                                    <th>{{__('leadData.lead.table.lname')}}</th>--}}
                                    <th>{{__('leadData.lead.table.date')}}</th>
                                    <th>{{__('leadData.lead.table.fullname')}}</th>
                                    {{--<th>{{__('leadData.lead.table.email')}}</th>--}}
                                    <th>{{__('leadData.lead.table.city')}}</th>
                                    <th>{{__('leadData.lead.table.address')}}</th>
                                    <th>{{__('leadData.lead.table.tele')}}</th>
                                    <th>{{__('leadData.lead.table.product')}}</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($leads as $lead)
                                        <tr>
                                            <td class="width45" id="selectLead">
                                                <label class="custom-control custom-checkbox mb-0">
                                                    <input wire:model.defer="selected" type="checkbox" class="custom-control-input" name="selected[]" value="{{$lead->id}}">
                                                    <span class="custom-control-label">&nbsp;</span>
                                                </label>
                                            </td>
                                            {{--<td>{{$lead->group->name ?? ''}}</td>
                                            <td>{{$lead->moderator->fullname ??''}}</td>--}}
                                            {{--<td>{{$lead->nom}}</td>
                                            <td>{{$lead->prenom}}</td>--}}
                                            <td style="color:red">{{$lead->created_at}}</td>
                                            <td>{{$lead->fullname}}</td>
                                            {{--<td>{{$lead->email}}</td>--}}
                                            <td>{{$lead->ville}}</td>
                                            <td>{{$lead->address}}</td>
                                            <td>{{$lead->tele}}</td>
                                            <td>{{$lead->produit}}</td>
                                            <td><a wire:click="editLead({{$lead->id}})" href="javascript:void(0);" class="btn btn-success btn-sm" onclick="topFunction()">Edit</a></td>
                                            <td><button wire:click="deleteLead({{$lead->id}})" class="btn btn-danger btn-sm"><i class="icon-trash"></i></button></td>
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