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
       <td></td>
   </tr>
@foreach($claim_task_detail as $item)
   <tr id="{{$item->idTask}}" style="font-size:16px;border-bottom: 1px solid rgba(0, 0, 0, 0.1)">
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
       {{--check onvoice Date--}}
       @if($item->invoiceDate!=null)
           <td style='text-align: center'>{{ date_format(date_create($item->invoiceDate),'d-m-Y') }}</td>
       @else
           <td style='text-align: center'></td>
       @endif
       {{--check delete --}}
       @if($item->invoiceMajorNo!=null || $item->idUser != Auth::user()->id || $item->invoiceTempNo!=null)
           <td style='text-align: center'>
               <button class="btn btn-xs btn-success" id="{{$item->idTask}}" onclick="taskView.viewDetailTask(this)"><span class="glyphicon glyphicon-ok"></span></button>
               <button class="btn btn-xs btn-danger" id="{{$item->idTask}}" onclick="taskView.deleteTask(this)" disabled><span class="glyphicon glyphicon-remove"></span></button>
           </td>
       @else
           <td style='text-align: center'>
               <button class="btn btn-xs btn-success" id="{{$item->idTask}}" onclick="taskView.viewDetailTask(this)"><span class="glyphicon glyphicon-ok"></span></button>
               <button class="btn btn-xs btn-danger" id="{{$item->idTask}}" onclick="taskView.deleteTask(this)"><span class="glyphicon glyphicon-remove"></span></button>
           </td>
       @endif
   </tr>
@endforeach
{{--demo--}}
