@if($listExpense!=null)
    @foreach($listExpense as $item)
        <tr id="{{$item->id}}" onclick="docketView.chooseTaskExpenseCode(this)" style="cursor: pointer">
            <td>{{$item->code}}</td>
            <td>{{$item->description}}</td>
        </tr>
    @endforeach
@endif
{{--demo--}}