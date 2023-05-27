@extends('employees.layout')
section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>MINI_CRM</h2>
            </div><br><br>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-success" href="{{ url('employees/create') }}"> Create New Employees</a>
            </div>
            <div class="pull-left">
                <a class="btn btn-success" href="dashboard"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 
    <table class="table table-bordered">
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
        @foreach ($employees as $Employee)
        <tr>
                                    <td>{{ $Employee->first_name }}</td>
                                    <td>{{ $Employee->last_name }}</td>
                                    <td>{{ $Employee->company_id }}</td>
                                    <td>{{ $Employee->email }}</td>
                                    <td>{{ $Employee->phone }}</td>
                                    <td>
                                        <form action="{{ route('employees.destroy',$Employee->id) }}" method="POST">
                                           <a class="btn btn-info"  href="{{ route('employees.show',$Employee->id) }}">Show</a>
       
                                           <a class="btn btn-primary" href="{{ route('employees.edit',$Employee->id) }}">Edit</a>
                                       
                                         
                                            @csrf
                                            @method('DELETE')
                                
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
        </tr>
        @endforeach
    </table>
     
    {!! $employees->links() !!}
 
