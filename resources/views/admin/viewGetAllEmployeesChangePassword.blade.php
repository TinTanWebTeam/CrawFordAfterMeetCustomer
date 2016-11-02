@if($listEmployee!=null)
    @foreach($listEmployee as $item)
        <tr id="{{$item->id}}" onclick="changePasswordView.viewEmployeeDetailWhenChooseRowOfEventDoubleClick(this)" style="cursor: pointer">
            <td>{{$item->name}}</td>
            <td>{{$item->firstName}}</td>
            <td>{{$item->lastName}}</td>
            <td>{{$item->sex}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->address}}</td>
        </tr>
    @endforeach
@endif