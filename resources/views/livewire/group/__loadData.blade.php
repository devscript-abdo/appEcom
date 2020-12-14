<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('tables.list')}}</h3>

                <div class="card-options">
                    <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                    <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                    <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter text-nowrap mb-0">
                        <thead>
                        <tr>
                            <th>
                                <label class="custom-control custom-checkbox mb-0">
                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1"
                                           value="option1">
                                    <span class="custom-control-label">&nbsp;</span>
                                </label>
                            </th>
                            @if(Auth::guard('admin')->check())
                                {{--<th>{{ __('tables.group') }}</th>--}}
                                <th>{{ __('tables.moderator') }}</th>
                            @endif
                            {{-- <th>{{__('tables.fname') }}</th>
                            <th>{{ __('tables.lname') }}</th>--}}
                            <th>{{ __('tables.date') }}</th>
                            <th>{{ __('tables.fullname') }}</th>
                            {{-- <th>{{__('tables.email') }}</th>--}}
                            <th>{{ __('tables.city') }}</th>
                            <th>{{ __('tables.addresse') }}</th>
                            <th>{{ __('tables.tele') }}</th>
                            <th>{{ __('tables.product') }}</th>
                            <th></th>
                            <th></th>
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
                                        <input wire:model.defer="selected" type="checkbox"
                                               class="custom-control-input" name="selected[]"
                                               value="{{ $lead->id }}">
                                        <span class="custom-control-label">&nbsp;</span>
                                    </label>
                                </td>
                                @if(Auth::guard('admin')->check())
                                    {{--<td>{{ $lead->group->name ?? '' }}</td>--}}
                                    <td>{{ $lead->moderator->fullname ??'' }}</td>
                                @endif
                                {{-- <td>{{$lead->nom }}</td>
                                <td>{{ $lead->prenom }}</td>--}}
                                <td style="color:red">{{ $lead->created_at }}</td>
                                <td>{{ $lead->fullname }}</td>
                                {{-- <td>{{$lead->email }}</td>--}}
                                <td>{{ $lead->ville }}</td>
                                <td>{{ $lead->address }}</td>
                                <td>{{ $lead->tele }}</td>
                                <td>{{ $lead->produit }}</td>

                                {{--<td>
                                    <a wire:click="makeCommand({{ $lead->id }})" href="javascript:void(0);"
                                       class="btn btn-info btn-sm">
                                        {{__('action.generate',['name'=>'Command'])}}
                                    </a>
                                </td>--}}
                                <td><a wire:click="editLead({{ $lead->id }})" href="javascript:void(0);"
                                       class="btn btn-success btn-sm" onclick="topFunction()">
                                        {{__('action.edit')}}
                                    </a>
                                </td>
                                <td><button wire:click="deleteLead({{ $lead->id }})"
                                            class="btn btn-danger btn-sm"><i class="icon-trash"></i></button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>
