<//laravelproject\routes\web.php
<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

 
//Route::get('/', function () {
//    return view('welcome');
//});

 
Route::get('/', [CustomAuthController::class, 'home']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('postlogin', [CustomAuthController::class, 'login'])->name('postlogin'); 
Route::get('signup', [CustomAuthController::class, 'signup'])->name('register-user');
Route::post('postsignup', [CustomAuthController::class, 'signupsave'])->name('postsignup'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


//..........................Comapny..............................................

// Route::get('index', 'CompanyController@index')->name('index');
// Route::get('/create', 'CompanyController@create')->name('create');
// Route::post('store/', 'CompanyController@store')->name('store');
// Route::get('show/{Company}', 'CompanyController@show')->name('show');
// Route::get('edit/{Company}', 'CompanyController@edit')->name('edit');
// Route::put('edit/{Company}','CompanyController@update')->name('update');
// Route::delete('/{Company}','CompanyController@destroy')->name('destroy');
Route::resource('companies', CompanyController::class);


// ...............Employee.............


// Route::get('employees', 'EmployeeController@index')->name('employees.index');
// Route::get('employees/create', 'EmployeeController@create')->name('employees/create');
// Route::post('employees/store/', 'EmployeeController@store')->name('employees/store');
// Route::get('employees/show/{employee}', 'EmployeeController@show')->name('employees/show');
// Route::get('employees/{employee}', 'EmployeeController@edit')->name('employees/edit');
// Route::put('employees/{employee}', 'EmployeeController@update')->name('employees/update');
// Route::delete('employees/{employee}', 'EmployeeController@destroy')->name('employees/destroy');

Route::resource('employees', EmployeeController::class);