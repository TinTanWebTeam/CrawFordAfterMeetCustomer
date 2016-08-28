@if($result!=null)
    @foreach($result as $item)
        <tr id="{{$item->id}}" onclick="docketView.chooseTaskTimeCode(this)" style="cursor: pointer">
            <td>{{$item->code}}</td>
            <td>{{$item->description}}</td>
        </tr>
    @endforeach
@endif
{{--demo--}}