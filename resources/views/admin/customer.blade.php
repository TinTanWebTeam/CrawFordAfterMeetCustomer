@if($customer!=null)
    @foreach($customer as $item)
        <tr>
            <td style='display: none'>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->fullName}}</td>
            <td style='text-align: center'>{{$item->sourceCustomerId}}</td>
            <td style='display: none'>{{$item->address}}</td>
            <td style='display: none'>{{$item->contactPersonFirstName}}</td>
            <td><button class='btn btn-success' onclick='claimView.fillInsurerCodeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-warning' onclick='claimView.editInsurerCode(this)'><span class='glyphicon glyphicon-edit'></span></button></td>
        </tr>
    @endforeach
@endif
{{--//demo--}}