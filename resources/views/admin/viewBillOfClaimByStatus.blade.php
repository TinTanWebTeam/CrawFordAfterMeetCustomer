@if($data!=null)
    @foreach($data as $item)
        <tr id="{{$item->idBill}}" onclick="trialFeeView.viewDetailIBClaim(this)" style="cursor: pointer">
            @if($item->majorNo!=null && $item->tempNo == null)
                <td>{{$item->majorNo}}</td>
                <td></td>
            @endif
            @if($item->majorNo==null && $item->tempNo != null)
                <td></td>
                <td>{{$item->tempNo}}</td>
            @endif
            @if($item->majorNo!=null && $item->tempNo != null)
                 <td>{{$item->majorNo}}</td>
                 <td>{{$item->tempNo}}</td>
            @endif
            {{--<td>{{$item->idBill}}</td>--}}
            <td>{{$item->customer}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->type}}</td>
            <td style='display: none'>{{$item->total}}</td>
        </tr>
    @endforeach
@endif
