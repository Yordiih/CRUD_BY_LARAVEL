@extends('student.layout')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>
                list of student
            </h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('Student.create') }}">Create new student</a>
        </div>
    </div>

</div>

@if ($message = Session::get('success'))
    <div class="alter alter-success">
        <p>{{ $message }}</p>
    </div>
@endif



<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Department</th>
        <th width="280px">Action</th>
    </tr>



    @foreach ($students as $stu)
        <tr>
            <td>{{ $stu->id }}</td>
            <td>{{ $stu->First_name }}</td>
            <td>{{ $stu->Last_name }}</td>
            <td>{{ $stu->Department }}</td>
            <td>
                <form action="{{ route('Student.destroy',$stu->id)}}" method="POST">
                    <a class="btn btn-info" href="{{ route('Student.show', $stu->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('Student.edit', $stu->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>
{{ $students->links() }}
@endsection
