@extends('student.layout')
@section('content')

<section class="add-student-section">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center">Add New Student</h2>
        <a href="{{route('Student.index')}}" class="btn btn-secondary">
          <i class="bi bi-arrow-left me-2"></i>
          Back
        </a>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There is something problem..<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                 <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      @endif
      <div class="row">

        <!-- In the HTML Form -->
<form class="col-12" id="add-student-form" action="{{ route('Student.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input id="first_name" name="first_name" type="text" class="form-control">
        </div>
        <div class="col-12 col-md-6 mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input id="last_name" name="last_name" type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <label for="dep" class="form-label">Department</label>
            <input id="dep" name="dep" type="text" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <button class="btn btn-primary" type="submit" name="action">
                Add Student
                <i class="bi bi-send ms-2"></i>
            </button>
        </div>
    </div>
</form>
      </div>
    </div>
  </section>
@endsection
