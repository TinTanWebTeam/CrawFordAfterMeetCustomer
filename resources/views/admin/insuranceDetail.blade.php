@if($insuranceDetail!=null)
    @foreach($insuranceDetail as $item)
        <tr>
            <td style='display: none'>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td><button class='btn btn-success' onclick='claimView.fillClaimTypeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editClaimType(this)'><span class='glyphicon glyphicon-edit'></span></button></td>
        </tr>
    @endforeach
@endif
{{--demo--}}