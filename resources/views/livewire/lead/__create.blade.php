<div class="tab-pane fade addLead show active" id="addnew" role="tabpanel">
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
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.nom')}}</label>
                                        <input type="text" wire:model.defer="nom" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('leadData.lead.nom')}}">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.prenom')}}</label>
                                        <input type="text" wire:model.defer="prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="{{__('leadData.lead.prenom')}}">
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.email')}}</label>
                                        <input type="email" wire:model.defer="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('leadData.lead.email')}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.ville')}}</label>
                                        <input type="text" wire:model.defer="ville" name="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="{{__('leadData.lead.ville')}}">
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.address')}}</label>
                                        <input type="text" wire:model.defer="address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{__('leadData.lead.address')}}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.tele')}}</label>
                                        <input type="text" wire:model.defer="tele" name="tele" class="form-control @error('tele') is-invalid @enderror" placeholder="{{__('leadData.lead.tele')}}">
                                        @error('tele')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.product')}}</label>
                                        <input type="text" wire:model.defer="produit" name="produit" class="form-control @error('produit') is-invalid @enderror" placeholder="{{__('leadData.lead.product')}}">
                                        @error('produit')
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
                                    <button wire:click.prevent="submit()" class="btn btn-primary">{{__('leadData.lead.add.btn')}}</button>
                                    {{--<button  class="btn btn-default">Cancel</button>--}}
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>