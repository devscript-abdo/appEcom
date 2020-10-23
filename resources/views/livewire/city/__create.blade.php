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
                            
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('groupCrud.group.name')}}</label>
                                        <input type="text" wire:model.defer="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{__('groupCrud.group.name')}}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                @csrf
                                {{--<div class="col-lg-12">
                                    <input type="file" class="dropify">
                                </div>--}}
                                <div class="col-lg-12 mt-3">
                                    <button wire:click.prevent="submit()" class="btn btn-primary">{{__('roleCrud.role.add.btn')}}</button>
                                    {{--<button  class="btn btn-default">Cancel</button>--}}
                                </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>