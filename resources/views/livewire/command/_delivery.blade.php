<div class="col-lg-5 col-md-12">
    <div class="form-group">
        <label
            class="form-label">{{ __('select delivery') }}</label>
        <select required wire:model.defer="delivery" name="delivery"
                class="custom-select @error('delivery') is-invalid @enderror">
            <option wire:key="" value=""></option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->fullname }}=>{{$user->ville->name}}</option>
            @endforeach
        </select>
        @error('delivery')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="col-lg-12 mt-3">
    <button wire:click.prevent="moveToAction('delivery')" class="btn btn-success">{{__('Move')}}</button>
</div>
