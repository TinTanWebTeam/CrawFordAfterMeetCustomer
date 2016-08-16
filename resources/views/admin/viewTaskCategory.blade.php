@if($result!=null)
    @foreach($result as $item)
        <tr id="{{$item->id}}" onclick="docketView.chooseTaskProfessionalOrExpense(this)" style="cursor: pointer">
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td><button class='btn btn-info' data-id="{{$item->id}}" onclick="docketView.modifyTaskCategory(this)">
                    <span class='glyphicon glyphicon-edit'></span>
                </button>
            </td>
        </tr>
    @endforeach
@endif