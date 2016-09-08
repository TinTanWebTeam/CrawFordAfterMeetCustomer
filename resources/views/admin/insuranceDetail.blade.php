@if($insuranceDetail!=null)
    @foreach($insuranceDetail as $item)
        <tr>
            <td style='display: none'>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td class="text-center"><button class='btn btn-success' onclick='claimView.fillClaimTypeFromModalToInput(this)' style="margin-right: 10px"><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-warning' onclick='claimView.editClaimType(this)'><span class='glyphicon glyphicon-edit'></span></button></td>
        </tr>
    @endforeach
@endif
{{--demo--}}