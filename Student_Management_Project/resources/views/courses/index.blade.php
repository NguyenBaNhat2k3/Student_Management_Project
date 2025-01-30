@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif

    <h1 class="text-center">Courses Management</h1>
    <div class="card">
    <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('courses.create')}}" class="float-end btn btn-success">Add course </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Course Name</th>
                        <th class="text-center">Teacher Name</th>
                        <th class="text-center">Options</th>
                    </tr>
                    @if(count($courses) > 0)
                        <?php $i=0 ?>
                        @foreach($courses as $key)
                            <tr>
                                <th class="text-center"><?= ++$i ?></th>
                                <th>{{$key->course_name}}</th>
                                <th>{{$key->teacher->full_name}}</th>

                                <th >
                                    <form action="{{route('courses.destroy', $key->course_id)}}" method="post" class="text-center">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('courses.show',$key->course_id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('courses.edit',$key->course_id)}}" class="btn btn-warning">Edit</a>
                                        <input type="submit" class="btn btn-danger" value="Delete" title="Delete Student" onclick="return confirmDelete();"></>                               
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