<div class="tab-pane fade" id="grid" role="tabpanel">
    <div class="row row-deck">
        @foreach($admins as $admin)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card " >
                    <div class="card-body">
                        <div class="card-status bg-blue"></div>
                        <div class="mb-3"> <img src="{{asset('assets/images/sm/avatar1.jpg')}}" class="rounded-circle w100" alt=""> </div>
                        <div class="mb-2">
                            <h5 class="mb-0">{{$admin->fullName()}}</h5>
                            <p class="text-muted">{{$admin->email}}</p>
                            <span>{{$admin->biography}}</span>
                        </div>
                        <span class="font-12 text-muted">Common Contact</span>
                        <ul class="list-unstyled team-info margin-0 pt-2">
                            <li><img src="{{asset('assets/images/xs/avatar1.jpg')}}" alt="Avatar"></li>
                            <li><img src="{{asset('assets/images/xs/avatar8.jpg')}}" alt="Avatar"></li>
                            <li><img src="{{asset('assets/images/xs/avatar2.jpg')}}" alt="Avatar"></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>