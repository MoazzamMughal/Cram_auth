@extends('employees.layout')
@section('content')
<div class="container">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('employees') }}"> Back</a>
            </div>
        </div>
    </div>
    <h1>
    @if ($employee)
        {{ $employee->first_name }} {{ $employee->last_name }}
    @else
        Employee not found
    @endif
</h1>

    <table class="table table-bordered">
        <tr>
            <th>First Name:</th>
            <td>
    @if ($employee)
        {{ $employee->first_name }}
    @else
        N/A
    @endif
</td>
        </tr>
        <tr>
            <th>Last Name:</th>
            <td>
    @if ($employee)
        {{ $employee->last_name }}
    @else
        N/A
    @endif
</td>
        </tr>

        <tr>
        
            <th>Email:</th>
            <td>
            @if ($employee)
        {{ $employee->email }}
    @else
        N/A
    @endif
    </td>
        </tr>

    </table>

  
</div>
@endsection



