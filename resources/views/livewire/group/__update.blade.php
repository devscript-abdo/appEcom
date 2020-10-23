<div class="tab-pane fade addRole show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                        {{--@if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif--}}
                    <form>
                        <div class="row clearfix">
                            
                                <div class="col-lg-3 col-md-12 haymacproduction">
                                    <div class="form-group haymacproduction">
                                        <label class="form-label haymacproduction">{{__('cityCrud.city.name')}}</label>
                                        <input type="text" wire:model.defer="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('cityCrud.city.name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @csrf
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('groupCrud.group.name')}}</label>
                                        <textarea wire:model.defer="description" name="description" class="form-control @error('description') is-invalid @enderror">

                                        </textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" wire:model="groupId" class="haymacproduction">
                                {{--<div class="col-lg-12">
                                    <input type="file" class="dropify">
                                </div>--}}
                                <div class="col-lg-12 mt-3">
                                    <button wire:click.prevent="update()" class="btn btn-primary haymacproduction">{{__('cityCrud.city.update.btn')}}</button>
                                    <button wire:click.prevent="cancel()" class="btn btn-default">Cancel</button>

                                </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    

