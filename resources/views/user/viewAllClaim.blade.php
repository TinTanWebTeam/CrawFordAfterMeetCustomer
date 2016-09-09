@if($AllClaim!=null)
    @foreach($AllClaim as $item)
        <tr>
            <td>{{$item->code}}</td>
            <td>{{$item->insuredLastName}}</td>
            <td>{{$item->insurerCode}}</td>
            <td>{{Carbon\Carbon::parse($item->receiveDate)->format('d-m-Y')}}</td>
            <td>{{Carbon\Carbon::parse($item->openDate)->format('d-m-Y')}}</td>
            <td>{{$item->adjusterCode}}</td>
            <td>
                <button class='btn btn-xs btn-success' id="{{$item->code}}" onclick='taskView.fillClaimToForm(this)'><span class='glyphicon glyphicon-ok'></span></button>
            </td>
        </tr>
    @endforeach
@endif