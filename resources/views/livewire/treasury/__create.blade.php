<div class="tab-pane fade addProduct show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form>

                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.type') }}</label>
                                    <select wire:model.defer="fields.type" name="type"
                                            class="custom-select @error('type') is-invalid @enderror">
                                        <option  value=""></option>
                                        <option  value="recipes">recettes</option>
                                        <option  value="depenses">dépenses</option>

                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.title') }}</label>
                                    <input type="text" wire:model.defer="fields.title" name="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="{{ __('forms.title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.banque') }}</label>
                                    <input type="text" wire:model.defer="fields.banque" name="banque"
                                        class="form-control @error('banque') is-invalid @enderror"
                                        placeholder="{{ __('forms.banque') }}">
                                    @error('banque')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.client') }}</label>
                                    <input type="text" wire:model.defer="fields.client" name="client"
                                           class="form-control @error('client') is-invalid @enderror"
                                           placeholder="{{ __('forms.client') }}">
                                    @error('client')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.designation') }}</label>
                                    <input type="text" wire:model.defer="fields.designation" name="designation"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        placeholder="{{ __('forms.designation') }}">
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.total') }}</label>
                                    <input type="number" wire:model.defer="fields.total" name="total"
                                        class="form-control @error('total') is-invalid @enderror"
                                        placeholder="{{ __('forms.total') }}">
                                    @error('total')
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
                                <button wire:click.prevent="submit()"
                                    class="btn btn-primary">{{ __('action.add') }}</button>
                                {{-- <button  class="btn btn-default">Cancel</button> --}}
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
