@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif

    <h1 class="text-center">Danh Sach Giao Vien</h1>
    <div class="card">
    <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('teachers.create')}}" class="float-end btn btn-success">Add teacher </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Full Name</th>
                        <th class="text-center">Subject</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Options</th>
                    </tr>
                    @if(count($teachers) > 0)
                        <?php $i=0 ?>
                        @foreach($teachers as $key)
                            <tr>
                                <th class="text-center"><?= ++$i ?></th>
                                <th>{{$key->full_name}}</th>
                                <th>{{$key->phone}}</th>
                                <th>{{$key->subject}}</th>
                                <th >
                                    <form action="{{route('teachers.destroy', $key->teacher_id)}}" method="post" class="text-center">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('teachers.show',$key->teacher_id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('teachers.edit',$key->teacher_id)}}" class="btn btn-warning">Edit</a>
                                        <input type="submit" class="btn btn-danger" value="Delete" onclick="return confirmDelete();"></>                               
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