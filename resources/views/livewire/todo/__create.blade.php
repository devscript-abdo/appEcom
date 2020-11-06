<div class="tab-pane fade show active" id="todo-add" role="tabpanel">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Todo</h3>
            <div class="card-options ">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <form class="card-body">
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Todo Name <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input type="text" wire:model.defer="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Priority <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <select wire:model.defer="priority" class="form-control show-tick @error('priority') is-invalid @enderror">
                        <option>Select</option>
                        <option>high</option>
                        <option>med</option>
                    </select>
                    @error('priority')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{--<div class="form-group row">
                <label class="col-md-3 col-form-label">Select Team <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <select class="form-control show-tick">
                        <option>Select</option>
                        <option>John Smith</option>
                        <option>Claire Peters</option>
                        <option>Allen Collins</option>
                        <option>Cory Carter</option>
                        <option>Rochelle Barton</option>
                    </select>
                </div>
            </div>--}}
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Description <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <textarea wire:model.defer="description" rows="4" class="form-control no-resize @error('description') is-invalid @enderror" placeholder="Please type what you want..."></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label">Due <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <div class="input-daterange input-group" data-provide="datepicker">
                        <input type="text" wire:model.defer="date_depart" class="form-control @error('date_depart') is-invalid @enderror" name="start">
                        <span class="input-group-addon"> to </span>
                        <input type="text" wire:model.defer="date_fin" class="form-control @error('date_fin') is-invalid @enderror" name="end">
                    </div>
                    @error('date_depart')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @error('date_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label"></label>
                <div class="col-md-7">
                    <button wire:click.prevent="submit()" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>