<div class="tab-pane active show" id="Company_Settings">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Company Settings</h3>
            <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                        class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                        class="fe fe-maximize"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i
                        class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="card-body">
        <form action="{{route('admin.settings')}}" method="post">
            @csrf
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <input 
                                class="form-control"
                                type="text"
                                id="site_name"
                                name="site_name"
                                value="{{ config('settings.site_name') }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>CEO</label>
                            <input 
                            type="text"
                            class="form-control" 
                            id="site_admin"
                            name="site_admin"
                            value="{{ config('settings.site_admin') }}"
                            >
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label>Mobile Number <span class="text-danger">*</span></label>
                            <input class="form-control"
              
                              type="text"
                              id="site_tele"
                              name="site_tele"
                              value="{{ config('settings.site_tele') }}"
                              >
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control"
                                
                                aria-label="With textarea"
                                id="site_address"
                                name="site_address"
                             
                                >
                                {{ config('settings.site_address') }}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i
                                            class="icon-envelope"></i></span>
                                </div>
                                <input type="email"
                                class="form-control"
                                id="default_email_address"
                                name="default_email_address"
                                value="{{ config('settings.default_email_address') }}"
                                    >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label>Website Url</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-globe"></i></span>
                                </div>
                                <input type="text" 
                                class="form-control" 
                                
                                id="site_url"
                                name="site_url"
                                value="{{ config('settings.site_url') }}"
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Country</label>
                            <select 
                            class="form-control"
                            id="site_country"
                            name="site_country"
                            >

                                <option value="Maroc">{{ config('settings.site_country') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>State/Province</label>
                            <select 
                            class="form-control"
                            id="site_province"
                            name="site_province"
                            >
                                <option>Casablanca</option>
                               
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>City</label>
                            <input 
                            class="form-control"
                            
                                type="text"
                                id="site_city"
                                name="site_city"
                                value="{{ config('settings.site_city') }}"
                              >
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-3">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input 
                            class="form-control"
                        
                             id="site_postal_code"
                             name="site_postal_code"
                             value="{{ config('settings.site_postal_code') }}"
                              type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input 
                            class="form-control"
                             type="text"
                             id="site_tele_fix"
                             name="site_tele_fix"
                             value="{{ config('settings.site_tele_fix') }}"
                             >
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fax</label>
                            <input 
                            class="form-control"
                              type="text"
                              id="site_fax"
                              name="site_fax"
                              value="{{ config('settings.site_fax') }}"
                              >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right m-t-20">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>