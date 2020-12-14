<div class="col-lg-3 col-md-12 haymacproduction">
    <div class="form-group haymacproduction">
        <label class="form-label haymacproduction">{{__('forms.name')}}</label>
        <input type="text" wire:model.defer="fields.name" name="name"

               class="form-control @error('name') is-invalid @enderror" placeholder="{{__('forms.name')}}">
        <input type="hidden" wire:model="roleId" class="haymacproduction">
        @error('name')
        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
        @enderror
    </div>
</div>
<div class="col-lg-12 mt-3">
    <button wire:click.prevent="update()" class="btn btn-success">{{__('action.update')}}</button>
    <button wire:click.prevent="cancel()" class="btn btn-default">{{__('action.cancel')}}</button>

</div>
