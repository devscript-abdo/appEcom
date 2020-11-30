<div>
    @if($isUpdate)
      @include('livewire.lead.__update')
    @else
      @include('livewire.lead.__create')
    @endif

    <div class="row clearfix haymacproduction">
        <div class="col-lg-12 haymacproduction">
            <div class="card haymacproduction">
                <div class="card-body haymacproduction">
                    <div class="table-responsive haymacproduction">
                        <table class="table table-hover js-basic-example haymacproduction dataTable table_custom border-style spacing5">
                            <thead>
                                <tr>
                                    <th>{{__('leadData.lead.table.fname')}}</th>
                                    <th>{{__('leadData.lead.table.lname')}}</th>
                                    {{--<th>{{__('leadData.lead.table.email')}}</th>--}}
                                    <th>{{__('leadData.lead.table.city')}}</th>
                                    <th>{{__('leadData.lead.table.address')}}</th>
                                    <th>{{__('leadData.lead.table.tele')}}</th>
                                    <th>{{__('leadData.lead.table.product')}}</th>
                                    <th>{{__('leadData.lead.table.action')}}</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>{{__('leadData.lead.table.fname')}}</th>
                                    <th>{{__('leadData.lead.table.lname')}}</th>
                                    {{--<th>{{__('leadData.lead.table.email')}}</th>--}}
                                    <th>{{__('leadData.lead.table.city')}}</th>
                                    <th>{{__('leadData.lead.table.address')}}</th>
                                    <th>{{__('leadData.lead.table.tele')}}</th>
                                    <th>{{__('leadData.lead.table.product')}}</th>
                                    <th>{{__('leadData.lead.table.action')}}</th>
                                </tr>
                            </tfoot>
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
                                        <td class="actions">

                                            <button wire:click="editLead({{$lead->id}})"  class="btn btn-sm btn-icon m-r-5"
                                            data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></button>
                                            <button wire:click="deleteLead({{$lead->id}})" class="btn btn-sm btn-icon on-default button-remove"
                                            data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


