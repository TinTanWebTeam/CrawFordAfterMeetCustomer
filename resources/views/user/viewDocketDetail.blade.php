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
   <tr id="{{$item->idTask}}" style="cursor:pointer;font-size:16px;" onClick ='taskView.viewDetailTask(this)'>
       <td style="display:none">{{ $item->idUser }}</td>
       <td style="text-align: center;height: 25px;">{{ date_format(date_create($item->date),'d-m-Y') }}</td>
       <td style='text-align: center'>{{ $item->adjuster }}</td>
       <td style='text-align: center'>{{ $item->professionalServices }}</td>
       <td style='text-align: center'>{{ $item->professionalUnit }}</td>
       <td style="display:none">{{ $item->professionalNote }}</td>
       <td style='text-align: center'>{{ $item->expense }}</td>
       <td style='text-align: center'>{{ $item->expenseAmount }}</td>
       <td style="display:none">{{ $item->expenseNote }}</td>
       <td>{{ $item->invoiceMajorNo }}</td>
       <td>{{ $item->invoiceDate }}</td>
   </tr>
@endforeach
{{--demo--}}
