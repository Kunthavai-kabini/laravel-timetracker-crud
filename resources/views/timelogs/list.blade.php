   @extends('layouts.master')
   @section('content')
   @if(session('succMsg') || request('succMsg'))
                <div class="alert alert-success">
                    @if(session('succMsg'))
                  {{session('succMsg')}}
                  @else
                  {{request('succMsg')}}
                  @endif
                </div>
                @endif
                @if(request('success'))
    <div class="alert alert-success">
        Employee updated successfully!
    </div>
@endif
   <br>
   <button type="button" class="btn btn-secondary mb-1 addCls" id="addTask" style="margin-left: 16px">Add Task</button>&nbsp;&nbsp;
   <button type="button" class="btn btn-secondary mb-1 addCls" id="addLeave" style="margin-left: 16px">Add Leave</button>&nbsp;&nbsp;
   
   <br><br>
   <style>
   .fa-2x task{
    font-size: 1em !important;   

}
</style>

<div class="content mt-3">
    <div class="animated fadeIn">
   <div class="row">
   <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Task List</strong>
        </div>
        <div class="card-body">
        @if($task_lists->isNotEmpty())
        @foreach ($task_lists as $date => $logs)
        <h3>{{ \Carbon\Carbon::parse($date)->toFormattedDateString() }}</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Hours</th>
                    <th>Minutes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->task_description }}</td>
                        <td>{{ $log->hours }}</td>
                        <td>{{ $log->minutes }}</td>
                        <td> <a class="loadTask" href="javascript:void(0)" data-id="{{ $log->id }}" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;&nbsp;
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
    

                @else
                No Data
                @endif
               

        </div>
    </div>
    </div>
</div> 
</div>
</div>


    <div class="modal fade" id="taskModal" tabindex="-1">
  <div class="modal-dialog" id="taskModalContent">
  </div>
  </div>
 
    <script>
    const taskEditUrl = "{{ route('ajax.editTask') }}";
    
</script>
 @endsection
   