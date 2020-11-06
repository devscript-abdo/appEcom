<div class="tab-pane fade moveLead show active" id="addnew" role="tabpanel">
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
  
                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.group')}}</label>
                                        <select wire:model.defer="model" name="model" class="custom-select @error('model') is-invalid @enderror">
                                            <option wire:key="" value=""></option>
                                            @foreach($groups as $group)
                                                <option wire:key="{{$group->id}}" value="{{$group->id}}">{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('model')
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
                                    <button wire:click.prevent="moveToAction('group')" class="btn btn-primary">{{__('leadData.lead.add.btn')}}</button>
                                    {{--<button  class="btn btn-default">Cancel</button>--}}
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>