<div class="tab-pane fade moveLead show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                            <div class="row clearfix">

                                <div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.moderator')}}</label>
                                        <select wire:model.defer="model" name="model" class="custom-select @error('model') is-invalid @enderror">
                                            <option wire:key="" value=""></option>
                                            @foreach($moderators as $moderator)
                                                <option wire:key="{{$moderator->id}}" value="{{$moderator->id}}">{{$moderator->fullname}}</option>
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
                                <div class="col-lg-12 mt-3">
                                    <button wire:click.prevent="moveToAction('moderator')" class="btn btn-primary">{{__('action.add')}}</button>
                                    {{--<button  class="btn btn-default">Cancel</button>--}}
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
