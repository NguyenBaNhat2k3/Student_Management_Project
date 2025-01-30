@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif

    <h1 class="text-center">Enrollment Management</h1>
    <div class="card">
    <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('enrollments.create')}}" class="float-end btn btn-success">Add enrollment </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Course Name</th>
                        <th class="text-center">Enrollment Date</th>
                        <th class="text-center">Status</th>
                    </tr>
                    @if(count($enrollments) > 0)
                        <?php $i=0 ?>
                        @foreach($enrollments as $key)
                            <tr>
                                <th class="text-center"><?= ++$i ?></th>
                                <th>{{$key->student->full_name}}</th>
                                <th>{{$key->course->course_name}}</th>
                                <th>{{$key->enrollment_date}}</th>
                                <th>
                                    @if($key->status == 'active')
                                        Active  
                                    @endif 
                                    @if($key->status == 'completed')
                                        Completed  
                                    @endif 
                                    @if($key->status == 'dropped')
                                        Dropped  
                                    @endif    
                                </th>
                                <th >
                                    <form action="{{route('enrollments.destroy', $key->enrollment_id)}}" method="post" class="text-center">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('enrollments.show',$key->enrollment_id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('enrollments.edit',$key->enrollment_id)}}" class="btn btn-warning">Edit</a>
                                        <input type="submit" class="btn btn-danger" value="Delete" title="Delete enrollment" onclick="return confirmDelete();"></>                               
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">No data</td>
                            </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

<script>
    function confirmDelete() {
        return confirm("You can delete computerIssue?");
    }
</script> 
    
@endsection