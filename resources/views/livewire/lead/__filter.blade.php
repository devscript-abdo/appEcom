<div class="tab-pane fade addLead show active" id="addnew" role="tabpanel">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.nom')}}</label>
                                        <input type="text" wire:model.defer="data.nom" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('leadData.lead.nom')}}">
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.ville')}}</label>
                                        <input type="text" wire:model.defer="data.ville" name="ville" class="form-control @error('ville') is-invalid @enderror" placeholder="{{__('leadData.lead.nom')}}">
                                        @error('ville')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.product')}}</label>
                                        <input type="text" wire:model.defer="data.produit" name="produit" class="form-control @error('produit') is-invalid @enderror" placeholder="{{__('leadData.lead.product')}}">
                                        @error('produit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                      
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12">
                                    
                                        <label class="form-label">Date filter <span class="text-danger">*</span></label>
                                        <div class="col-md-10">
                                            <div class="input-daterange input-group" data-provide="datepicker">
                                                <input type="text" wire:model.defer="data.from_to.from"
                                                  class="form-control @error('date_depart') is-invalid @enderror"
                                                  name="start"
                                                  onchange="this.dispatchEvent(new InputEvent('input'))"
                                                  >
                                                <span class="input-group-addon"> to </span>
                                                <input  type="text" wire:model.defer="data.from_to.to"
                                                 class="form-control @error('date_fin') is-invalid @enderror"
                                                  name="end"
                                                  onchange="this.dispatchEvent(new InputEvent('input'))"
                                                  >
                                            </div>
                                        </div>
                                   
                                </div>
                                {{--<div class="col-lg-5 col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{__('leadData.lead.group')}}</label>
                                        <select wire:model.defer="fields.group_id" name="group" class="custom-select @error('group_id') is-invalid @enderror">
                                            <option wire:key="" value=""></option>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach
                                        </select>
                                        @error('group_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>--}}
                                @csrf
                       
                                <div class="col-lg-12 mt-3">
                                    <button wire:click.prevent="setfilter()" class="btn btn-primary">{{__('Filter')}}</button>
                                    {{--<button  class="btn btn-default">Cancel</button>--}}
                                </div>
                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>