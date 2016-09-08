@if($branch!=null)
    @foreach($branch as $item)
        <tr>
            <td style='display: none'>{{$item->id}}</td>
            <td>{{$item->code}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->branchTypeCode}}</td>
            <td class="text-center"><button class='btn btn-success' onclick='claimView.fillBranchFromModalToInput(this)' style="padding-right: 10px"><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-warning' onclick='claimView.editBranch(this)'><span class='glyphicon glyphicon-edit'></span></button></td>
        </tr>
    @endforeach
@endif
{{--demo--}}