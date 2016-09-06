@foreach($claim_task_detail as $item)
    <tr id={{$item->idTask}} style="cursor:pointer" onClick ='docketView.viewDetailTask(this)'>
        <td style="display:none">{{ $item->idUser }}</td>
        <td>{{Carbon\Carbon::parse($item->date)->format('d-m-Y')}}</td>
        <td style='text-align: center'>{{ $item->adjuster }}</td>
        <td style='text-align: center'>{{ $item->professionalServices }}</td>
        <td style='text-align: center'>{{ $item->professionalUnit }}</td>
        <td>{{substr($item->professionalNote,0,15)}}....</td>
        <td style='text-align: center'>{{ $item->expense }}</td>
        <td style='text-align: center'>{{ $item->expenseAmount }}</td>
        <td>{{substr($item->expenseNote,0,15)}}....</td>
        <td style="text-align: center">{{$item->invoiceMajorNo}}</td>
        <td style="text-align: center">{{\Carbon\Carbon::parse($item->invoiceDate)->format('d-m-Y')}}</td>
    </tr>
@endforeach
{{--demo--}}
