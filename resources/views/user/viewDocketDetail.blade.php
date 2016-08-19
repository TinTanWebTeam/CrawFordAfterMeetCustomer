@foreach($claim_task_detail as $item)
   <tr id={{$item->idTask}} style="cursor:pointer" onClick ='taskView.viewDetailTask(this)'>
       <td style="display:none">{{ $item->idUser }}</td>
       <td style="text-align: center">{{ $item->date }}</td>
       <td style='text-align: center'>{{ $item->adjuster }}</td>
       <td style='text-align: center'>{{ $item->professionalServices }}</td>
       <td style='text-align: center'>{{ $item->professionalUnit }}</td>
       <td>{{ $item->professionalNote }}</td>
       <td style='text-align: center'>{{ $item->expense }}</td>
       <td style='text-align: center'>{{ $item->expenseAmount }}</td>
       <td>{{ $item->expenseNote }}</td>
   </tr>
@endforeach
