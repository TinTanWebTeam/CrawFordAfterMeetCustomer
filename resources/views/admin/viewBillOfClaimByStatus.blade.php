@if($data!=null)
    @foreach($data as $item)
        <tr id="{{$item->idBill}}" onclick="trialFeeView.viewDetailIBClaim(this)" style="cursor: pointer">
            <td>{{$item->idBill}}</td>
            <td>{{$item->customer}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->type}}</td>
            <td style='display: none'>{{$item->total}}</td>
        </tr>
    @endforeach
@endif
