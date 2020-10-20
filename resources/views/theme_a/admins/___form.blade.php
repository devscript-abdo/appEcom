<form method="post" action="{{route('admin.admins.add')}}">
    <div class="row clearfix">
        
            <div class="col-lg-3 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.nom')}}</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="{{__('adminCrud.admin.nom')}}">
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
                    <label class="form-label">{{__('adminCrud.admin.prenom')}}</label>
                    <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="{{__('adminCrud.admin.prenom')}}">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="col-lg-3 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.email')}}</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{__('adminCrud.admin.email')}}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.tele')}}</label>
                    <input type="text" name="tele" class="form-control @error('tele') is-invalid @enderror" placeholder="{{__('adminCrud.admin.tele')}}">
                    @error('tele')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.ville')}}</label>
                    <select name="ville" class="custom-select @error('ville') is-invalid @enderror">
                        @foreach($villes as $ville)
                    <option value="{{$ville->id}}">{{$ville->name}}</option>
                        @endforeach
                    </select>
                    @error('ville')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.address')}}</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{__('adminCrud.admin.address')}}">
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.password')}}</label>
                    <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" onclick="generatePassword()" placeholder="{{__('adminCrud.admin.password')}}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
  
            <div class="col-lg-4 col-md-12">
                <div class="form-group">
                    <label class="form-label">{{__('adminCrud.admin.role')}}</label>
                    <select name="role" class="custom-select @error('role') is-invalid @enderror">
                        @foreach($roles as $role)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{--<div class="col-lg-12">
                <input type="file" class="dropify">
            </div>--}}
            <div class="col-lg-12 mt-3">
                <button type="submit" class="btn btn-primary">{{__('adminCrud.admin.add.btn')}}</button>
                {{--<button  class="btn btn-default">Cancel</button>--}}
            </div>
        
    </div>
</form>