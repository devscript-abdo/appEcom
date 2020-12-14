<div class="tab-pane fade addLead show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>

                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.fname')}}</label>
                                        <input type="text" wire:model.defer="commands.nom" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('forms.fname')}}">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <input type="hidden" wire:model="commanderId" class="haymacproduction">
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.lname')}}</label>
                                        <input type="text" wire:model.defer="commands.prenom" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="{{__('forms.lname')}}">
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.email')}}</label>
                                        <input type="email" wire:model.defer="commands.email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('forms.email')}}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.city')}}</label>
                                        <input type="text" wire:model.defer="commands.ville" name="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="{{__('forms.city')}}">
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.address')}}</label>
                                        <input type="text" wire:model.defer="commands.address" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{__('forms.address')}}">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" wire:model="commanderId" class="haymacproduction">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.tele')}}</label>
                                        <input type="text" wire:model.defer="commands.tele" name="tele" class="form-control @error('tele') is-invalid @enderror" placeholder="{{__('forms.tele')}}">
                                        @error('tele')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.product')}}</label>
                                        <select wire:model.defer="commands.product_id" name="product_id" class="custom-select @error('product_id') is-invalid @enderror">
                                            <option wire:key="" value=""></option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                                @endforeach
                                        </select>
                                        @error('product_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.quantity')}}</label>
                                        <input type="number" wire:model.defer="commands.command_quantity" name="command_quantity" class="form-control @error('command_quantity') is-invalid @enderror" placeholder="{{__('forms.quantity')}}">
                                        @error('command_quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.total')}}</label>
                                        <input type="number" wire:model.defer="commands.command_price" name="command_price" class="form-control @error('command_price') is-invalid @enderror" placeholder="{{__('forms.total')}}">
                                        @error('command_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('forms.notes')}}</label>
                                        <textarea wire:model.defer="commands.notes" name="notes" class="form-control @error('notes') is-invalid @enderror">

                                        </textarea>
                                        @error('notes')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                @csrf

                                <div class="col-lg-12 mt-3">
                                    <button wire:click.prevent="generateCommand()" class="btn btn-primary">{{__('action.generate',['name'=>'Command'])}}</button>
                                    <button wire:click.prevent="cancelCmd()"  class="btn btn-default">{{__('action.cancel')}}</button>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
