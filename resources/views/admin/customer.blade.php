@if($customer!=null)
    @foreach($customer as $item)
        <tr>
            <td style='display: none'>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->fullName}}</td>
            <td style='text-align: center'>{{$item->sourceCustomerId}}</td>
            <td style='display: none'>{{$item->address}}</td>
            <td style='display: none'>{{$item->contactPersonFirstName}}</td>
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <button class='btn btn-success' onclick='claimView.fillInsurerCodeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>
                    </div>
                    <div class="col-sm-6">
                        <button class='btn btn-warning' onclick='claimView.editInsurerCode(this)'><span class='glyphicon glyphicon-edit'></span></button>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@endif
{{--//demo--}}