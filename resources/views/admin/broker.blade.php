@if($broker!=null)
    @foreach($broker as $item)
        <tr>
            <td style="display: none">{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->firstName}}</td>
            <td>{{$item->lastName}}</td>
            <td>{{$item->phone}}</td>
            <td>
                <button class='btn btn-success' onclick='claimView.fillBrokerFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-warning' onclick='claimView.editBroker(this)'><span class='glyphicon glyphicon-edit'></span></button>
            </td>
        </tr>
    @endforeach
@endif