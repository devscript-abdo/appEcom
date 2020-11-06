<div>
    @if($isUpdate)
        @include('livewire.group.__update')
    @else
        @include('livewire.group.__create')
    @endif

    <div class="tab-pane fade show active" id="list" role="tabpanel">
        <div class="row clearfix">
 
            <div class="col-lg-12">
                <div class="table-responsive" id="users">
                    <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                        <tbody>
    
                            @foreach($groups as $group)
                                <tr class="">
                                    <td class="width35 hidden-xs">
                                        <a href="javascript:void(0);" class="mail-star"><i class="fa fa-lock""></i></a>
                                    </td>
                                    <td class="text-center width40">
                                        <div class="avatar d-block">
                                            <img class="avatar" src="{{asset('assets/images/xs/avatar4.jpg')}}" alt="avatar">
                                        </div>
                                    </td>
                                    <td>
                                        <div><a href="{{route('admin.groups.single',$group->slug)}}">{{$group->name}}</a></div>
                                        <div class="text-muted">Group created by : {{$group->admin->fullname ??''}}</div>
                                    </td>
                                    {{--<td class="hidden-xs">
                                        <div class="text-muted">{{$role->email}}</div>
                                    </td>--}}
                               
                                    <td class="text-right">
                                        <a  wire:click="loadData({{$group->id}})" class="btn btn-sm btn-link" href="javascript:void(0)" data-toggle="tooltip" title="Load data"><i class="fa fa-spinner"></i></a>
                                        <a  wire:click="editGroup({{$group->id}})" class="btn btn-sm btn-link" href="javascript:void(0)" data-toggle="tooltip" title="Edite"><i class="fa fa-edit"></i></a>
                                        <a  wire:click="deleteGroup({{$group->id}})" class="btn btn-sm btn-link hidden-xs js-sweetalert" data-type="confirm" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                           
                            @endforeach
                      
                        </tbody>
                    </table>
                </div>
            </div>
          
        </div>
    </div>
    @if($isLoad)
        @include('livewire.group.__loadData')
    @endif
</div>