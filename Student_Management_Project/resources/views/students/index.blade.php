@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif

    <h1 class="text-center">Danh Sach Student</h1>
    <div class="card">
    <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('students.create')}}" class="float-end btn btn-success">Add student </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Options</th>
                    </tr>
                    @if(count($students) > 0)
                        <?php $i=0 ?>
                        @foreach($students as $key)
                            <tr>
                                <th class="text-center"><?= ++$i ?></th>
                                <th>{{$key->full_name}}</th>
                                <th>{{$key->phone_number}}</th>
                                <th >
                                    <form action="{{route('students.destroy', $key->student_id)}}" method="post" class="text-center">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('students.show',$key->student_id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('students.edit',$key->student_id)}}" class="btn btn-warning">Edit</a>
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