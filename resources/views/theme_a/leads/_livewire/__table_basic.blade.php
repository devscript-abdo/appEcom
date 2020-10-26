<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__('leadData.lead.list')}}</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>{{__('leadData.lead.table.fname')}}</th>
                                <th>{{__('leadData.lead.table.lname')}}</th>
                                {{--<th>{{__('leadData.lead.table.email')}}</th>--}}
                                <th>{{__('leadData.lead.table.city')}}</th>
                                <th>{{__('leadData.lead.table.address')}}</th>
                                <th>{{__('leadData.lead.table.tele')}}</th>
                                <th>{{__('leadData.lead.table.product')}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td>{{$lead->nom}}</td>
                                        <td>{{$lead->prenom}}</td>
                                        {{--<td>{{$lead->email}}</td>--}}
                                        <td>{{$lead->ville}}</td>
                                        <td>{{$lead->address}}</td>
                                        <td>{{$lead->tele}}</td>
                                        <td>{{$lead->produit}}</td>
                                        <td><a href="javascript:void(0);" class="btn btn-success btn-sm">View Order</a></td>
                                        <td><button class="btn btn-danger btn-sm"><i class="icon-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>