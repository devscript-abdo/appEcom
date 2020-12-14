<div class="col-lg-3 col-md-12 haymacproduction">
    <div class="form-group haymacproduction">
        <label class="form-label haymacproduction">{{__('forms.name')}}</label>
        <input type="text" wire:model.defer="fields.name" name="name"
               class="form-control @error('name') is-invalid @enderror" placeholder="{{__('forms.name')}}">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
        @enderror
    </div>
</div>
<div class="col-lg-12 mt-3">
    <button wire:click.prevent="submit()" class="btn btn-success">{{__('action.add')}}</button>
</div>
