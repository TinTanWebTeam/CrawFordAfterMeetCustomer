@if($sourceCode!=null)
    @foreach($sourceCode as $item)
        <tr>
            <td style='display: none'>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td><button class='btn btn-success' onclick='claimView.fillSourceCustomerFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-warning' onclick='claimView.editSourceCode(this)'><span class='glyphicon glyphicon-edit'></span></button></td>
        </tr>
    @endforeach
@endif
{{--demo--}}