<div class="tab-pane fade addAdmin show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row clearfix">

                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.fname')}}</label>
                                    <input type="text" wire:model.defer="fields.nom" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('forms.fname')}}">
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            @csrf
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.lname')}}</label>
                                    <input type="text" wire:model.defer="fields.prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="{{__('forms.lname')}}">
                                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.email')}}</label>
                                    <input type="email" wire:model.defer="fields.email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('forms.email')}}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.tele')}}</label>
                                    <input type="text" wire:model.defer="fields.tele" name="tele" class="form-control @error('tele') is-invalid @enderror" placeholder="{{__('forms.tele')}}">
                                    @error('tele')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.city')}}</label>
                                    <select wire:model.defer="fields.city_id" name="city_id" class="custom-select @error('city_id') is-invalid @enderror">
                                        <option wire:key="" value=""></option>
                                        @foreach($villes as $ville)
                                            <option wire:key="{{$ville->id}}" value="{{$ville->id}}">{{$ville->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" wire:model="moderatorId" class="haymacproduction">
                            <div class="col-lg-7 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.address')}}</label>
                                    <input type="text" wire:model.defer="fields.address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{__('forms.address')}}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{__('forms.password')}}</label>
                                    <input readonly type="text" wire:model.defer="fields.password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" onclick="generatePassword()" value="" placeholder="{{__('forms.password')}}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 mt-3">
                                <button wire:click.prevent="update()" class="btn btn-primary">{{__('action.update')}}</button>
                                <button wire:click.prevent="cancel()"  class="btn btn-default">{{__('action.cancel')}}</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




