<div>
    @if($isUpdate)
        @include('livewire.__update')
    @else
        @include('livewire.__create')
    @endif
    <div class="tab-pane fade show active" id="list" role="tabpanel">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="table-responsive" id="users">
                    <table class="table table-hover table-vcenter text-nowrap table_custom border-style list">
                        <tbody>
    
                            @foreach($admins as $admin)
                                <tr class="">
                                    <td class="width35 hidden-xs">
                                        <a href="javascript:void(0);" class="mail-star"><i class="fa fa-star"></i></a>
                                    </td>
                                    <td class="text-center width40">
                                        <div class="avatar d-block">
                                            <img class="avatar" src="{{asset('assets/images/xs/avatar4.jpg')}}" alt="avatar">
                                        </div>
                                    </td>
                                    <td>
                                        <div><a href="javascript:void(0);">{{$admin->fullname}}</a></div>
                                        <div class="text-muted">{{$admin->tele}}</div>
                                    </td>
                                    <td class="hidden-xs">
                                        <div class="text-muted">{{$admin->role ??''}}</div>
                                    </td>
                                    <td class="hidden-xs">
                                        <div class="text-muted">{{$admin->email}}</div>
                                    </td>
                                    <td class="hidden-sm">
                                        <div class="text-muted">{{$admin->city->name ?? ''}}</div>                                                
                                    </td>
                                    <td class="hidden-sm">
                                        <div class="text-muted">{{$admin->address}}</div>                                                
                                    </td>
                                    <td class="text-right">
                                        {{--<a class="btn btn-sm btn-link" href="javascript:void(0)" data-toggle="tooltip" title="Phone"><i class="fa fa-phone"></i></a>--}}
                                        <a  wire:click="editAdmin({{$admin->id}})" class="btn btn-sm btn-link" href="javascript:void(0)" data-toggle="tooltip" title="Edite"><i class="fa fa-edit"></i></a>
                                        <a  wire:click="deleteAdmin({{$admin->id}})" class="btn btn-sm btn-link hidden-xs js-sweetalert" data-type="confirm" href="javascript:void(0)" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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
