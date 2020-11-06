<div>
    @include('livewire.todo.__create')
    <div class="tab-pane fade show active" id="todo-list" role="tabpanel">
        <div class="card">
            <div class="card-body">
                <div class=""><button class="btn btn-primary" wire:click.prevent="toFinish()">Finish</button></div>
                <div class="table-responsive todo_list">
                    <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="w150 text-right">Due</th>
                                <th class="w100">Priority</th>
                                <th class="w80"><i class="icon-user"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($todos as $todo)
                                <tr>
                                    
                                    <td>
                                        <label class="custom-control custom-checkbox">
                                            <input wire:model.defer="active"  type="checkbox" class="custom-control-input" 
                                             value="{{$todo->id}}" name="active[]" {{$todo->active ? 'checked':''}}>
                                            <span class="custom-control-label">{{ $todo->name }}</span>
                                        </label>
                                    </td>
                                    <td class="text-right">{{-- Feb 12-2019 --}}{{ $todo->date_fin }}</td>
                                    <td><span class="tag tag-danger ml-0 mr-0">{{ $todo->priority }}</span></td>
                                    <td>
                                        <span class="avatar avatar-pink" data-toggle="tooltip" data-placement="top"
                                            title="" data-original-title="Avatar Name">NG</span>
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
