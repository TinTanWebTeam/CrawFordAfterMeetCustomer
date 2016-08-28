@if($expense !=null)
    @foreach($expense as $item)
        <tr id="{{$item->id}}" onclick="taskView.chooseTaskExpenseWhenUseEventDoubleClick(this)" style="cursor: pointer">
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
        </tr>
    @endforeach
@endif
{{--demo--}}