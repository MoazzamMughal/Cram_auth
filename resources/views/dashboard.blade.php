//laravelproject\resources\views\dashboard.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>CRM_MINI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #0dcaf0;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#"><b> CRM_MINI</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container"><br/><br/>
    <div class="row">
    <p><h3>WELLCOME TO Mini_CRM_Website  <br> {{ Auth::user()->name }} </h3> </p>
    </div>
    <a class="btn btn-info" href="companies">Company Dashboard</a> <br>
    <p>Go to the Company Dashboard to add your company Records </p> <br>
    <a class="btn btn-info" href="employees">Employee Dashboard</a><br>
    <p>Go to the Employees Dashboard to add Employees Details </p>
    </div>
    @yield('content')
</body>
</html>