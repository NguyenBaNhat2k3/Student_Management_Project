@extends('layout')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{$message}}
    </div>
@endif

    <h1 class="text-center">Payment Management</h1>
    <div class="card">
    <div class="card-header">
            <div class="row">
                <div class="col col-md-6"><b></b></div>
                <div class="col col-md-6">
                    <a href="{{route('payments.create')}}" class="float-end btn btn-success">Add payment </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-reponsive">
                <table class="table table-bordered">
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Payment Date</th>
                        <th class="text-center">Payment Method</th>
                        <th class="text-center">Options</th>
                    </tr>
                    @if(count($payments) > 0)
                        <?php $i=0 ?>
                        @foreach($payments as $key)
                            <tr>
                                <th class="text-center"><?= ++$i ?></th>
                                <th>{{$key->student->full_name}}</th>
                                <th>{{$key->amount}}</th>
                                <th>{{$key->payment_date}}</th>
                                <th>{{$key->payment_method}}</th>
                                <th >
                                    <form action="{{route('payments.destroy', $key->payment_id)}}" method="post" class="text-center">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('payments.show',$key->payment_id)}}" class="btn btn-primary">Show</a>
                                        <a href="{{route('payments.edit',$key->payment_id)}}" class="btn btn-warning">Edit</a>
                                        <input type="submit" class="btn btn-danger" value="Delete" title="Delete payment" onclick="return confirmDelete();"></>                               
                                        <a href="{{url('report/report1/'.$key->payment_id)}}" class="btn btn-success">Printf</a>
                                    
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