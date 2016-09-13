<tr id="" style="cursor:pointer;font-size:16px;" onClick ='taskView.viewDetailTask(this)'>
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
   <tr id="{{$item->idTask}}" style="cursor:pointer;font-size:16px;border-bottom: 1px solid rgba(0, 0, 0, 0.1)" onClick ='taskView.viewDetailTask(this)'>
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
