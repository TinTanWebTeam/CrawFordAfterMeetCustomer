{{--@foreach($claim_task_detail as $item)--}}
    {{--<tr id={{$item->idTask}} style="cursor:pointer" onClick ='docketView.viewDetailTask(this)'>--}}
        {{--<td style="display:none">{{ $item->idUser }}</td>--}}
        {{--<td>{{Carbon\Carbon::parse($item->date)->format('d-m-Y')}}</td>--}}
        {{--<td style='text-align: center'>{{ $item->adjuster }}</td>--}}
        {{--<td style='text-align: center'>{{ $item->professionalServices }}</td>--}}
        {{--<td style='text-align: center'>{{ $item->professionalUnit }}</td>--}}
        {{--<td>{{substr($item->professionalNote,0,15)}}....</td>--}}
        {{--<td style='text-align: center'>{{ $item->expense }}</td>--}}
        {{--<td style='text-align: center'>{{ $item->expenseAmount }}</td>--}}
        {{--<td>{{substr($item->expenseNote,0,15)}}....</td>--}}
        {{--<td style="text-align: center">{{$item->invoiceMajorNo}}</td>--}}
        {{--<td style="text-align: center">{{\Carbon\Carbon::parse($item->invoiceDate)->format('d-m-Y')}}</td>--}}
    {{--</tr>--}}
{{--@endforeach--}}
{{--demo--}}

<tr id="" style="cursor:pointer;font-size:16px;" onClick ='docketView.viewDetailTask(this)'>
    <td style="display:none"></td>
    <td style="text-align: center;height: 10px;"></td>
    <td style='text-align: center'></td>
    <td style='text-align: center'></td>
    <td style='text-align: center'></td>
    <td style="display:none"></td>
    <td style='text-align: center'></td>
    <td style='text-align: center'></td>
    <td style="display:none"></td>
    <td></td>
    <td></td>
</tr>
@foreach($claim_task_detail as $item)
    <tr id="{{$item->idTask}}" style="cursor:pointer;font-size:16px;border-bottom: 1px solid rgba(0, 0, 0, 0.1)" onClick ='docketView.viewDetailTask(this)'>
        <td style="display:none">{{ $item->idUser }}</td>
        <td style="text-align: center;height: 25px;">{{ date_format(date_create($item->date),'d-m-Y') }}</td>
        <td style='text-align: center'>{{ strtoupper($item->adjuster) }}</td>
        <td style='text-align: center'>{{ $item->professionalServices }}</td>
        <td style='text-align: center'>{{ $item->professionalUnit }}</td>
        <td style="display:none">{{ $item->professionalNote }}</td>
        <td style='text-align: center'>{{ $item->expense }}</td>
        <td style='text-align: center'>{{ number_format($item->expenseAmount,0, ".", ",") }}</td>
        <td style="display:none">{{ $item->expenseNote }}</td>
        <td style='text-align: center'>{{ $item->invoiceMajorNo }}</td>
        @if($item->invoiceDate!=null)
            <td style='text-align: center'>{{ date_format(date_create($item->invoiceDate),'d-m-Y') }}</td>
        @else
            <td style='text-align: center'></td>
        @endif
    </tr>
@endforeach
{{--demo--}}

