<div class="tab-pane fade addCategory show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.name') }}</label>
                                    <input type="text" wire:model.defer="fields.name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="{{ __('forms.name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="col-lg-5 col-md-12">
                                <div class="form-group">
                                    <label
                                        class="form-label">{{ __('forms.type') }}</label>
                                    <select wire:model.defer="fields.type" name="category_id"
                                            class="custom-select @error('type') is-invalid @enderror">
                                        <option wire:key="" value=""></option>
                                        <option wire:key="" value="products">products</option>
                                        <option wire:key="" value="leads">leads</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @csrf

                            <div class="col-lg-12 mt-3">
                                <button wire:click.prevent="submit()"
                                    class="btn btn-primary">{{ __('action.add') }}</button>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
