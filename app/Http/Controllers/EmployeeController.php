<?php

namespace App\Http\Controllers;


use App\Models\Employee;
use App\Models\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    

        $employees = Employee::paginate(10);

        return view('employees.index', compact('employees'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
      
       public function create()
       {
           $employee = new Employee();
           $companies = Company::all();
           return view('employees.create', compact('employee', 'companies'));
       }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('employees.create')
                ->withErrors($validator)
                ->withInput();
        }

        Employee::create($request->all());

        return redirect()->route('employees.create')->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employees.show',compact('employee'));
    }
    
    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("employees/{$employee->id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */

     public function destroy(Employee $employee)
     {
         $employee->delete();
     
         return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
     }
     
}


// namespace App\Http\Controllers;

// use App\Models\Employee;
// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class EmployeeController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $employees = Employee::latest()->paginate(5);
     
//         return view('index',compact('employees'))
//             ->with('i', (request()->input('page', 1) - 1) * 5);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         $companies = Company::all();
//         return view('employees.create', compact('companies'));
//     }
    

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'first_name' => 'required',
//             'last_name' => 'required',
//             'email' => 'required',
//             'phone' => 'required',

//         ]);
   
//         $input = $request->all();
   
//         // if ($image = $request->file('image')) {
//         //     $destinationPath = 'images/';
//         //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//         //     $image->move($destinationPath, $profileImage);
//         //     $input['image'] = "$profileImage";
//         // }
//         Employee::create($input);
      
//         return redirect()->route('index')
//                         ->with('success','Employee created successfully.');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\Models\Employee  $employee
//      * @return \Illuminate\Http\Response
//      */
//     public function show(Employee $employee)
//     {
//         return view('show',compact('employee'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Employee  $employee
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Employee $employee)
//     {
//         return view('edit',compact('employee'));
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Employee  $employee
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Employee $employee)
//     {
//         $request->validate([
//             'first_name' => 'required',
//             'last_name' => 'required',
//             'email' => 'required',
//             'phone' => 'required',
//         ]);
   
//         $input = $request->all();
   
//         // if ($image = $request->file('image')) {
//         //     $destinationPath = 'images/';
//         //     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
//         //     $image->move($destinationPath, $profileImage);
//         //     $input['image'] = "$profileImage";
//         // }else{
//         //     unset($input['image']);
//         // }
           
//         $employee->update($input);
     
//         return redirect()->route('index')
//                         ->with('success','Employee updated successfully');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Employee  $employee
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Employee $employee)
//     {
//         $employee->delete();
      
//         return redirect()->route('index')
//                         ->with('success','Employee deleted successfully');
//     }
// }






