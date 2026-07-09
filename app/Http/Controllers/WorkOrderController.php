<?php

namespace App\Http\Controllers;


use App\Models\WorkOrder;
use App\Models\DamageReport;
use App\Models\User;

use Illuminate\Http\Request;



class WorkOrderController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | LIST WORK ORDER ADMIN
    |--------------------------------------------------------------------------
    */


    public function index()
    {


        $orders = WorkOrder::with([

            'damageReport',

            'technician'

        ])

        ->latest()

        ->get();





        return view(

            'workorders.index',

            compact('orders')

        );


    }







    /*
    |--------------------------------------------------------------------------
    | CREATE WORK ORDER FORM
    |--------------------------------------------------------------------------
    */


    public function create($report_id)
    {


        $report = DamageReport::with('user')

        ->findOrFail($report_id);






        $technicians = User::whereHas(

            'role',

            function($query){


                $query->where(

                    'name',

                    'technician'

                );


            }

        )->get();






        return view(

            'workorders.create',

            compact(

                'report',

                'technicians'

            )

        );


    }







    /*
    |--------------------------------------------------------------------------
    | STORE WORK ORDER
    |--------------------------------------------------------------------------
    */


    public function store(Request $request)
    {



        $validated = $request->validate([


            'damage_report_id'

            => 'required|exists:damage_reports,id',



            'technician_id'

            => 'required|exists:users,id',



            'notes'

            => 'nullable|string'


        ]);






        WorkOrder::create([


            'damage_report_id'

            => $validated['damage_report_id'],



            'technician_id'

            => $validated['technician_id'],



            'status'

            => 'OPEN',



            'notes'

            => $validated['notes'] ?? null


        ]);







        return redirect('/work-orders')

        ->with(

            'success',

            'Work Order berhasil dibuat'

        );



    }







    /*
    |--------------------------------------------------------------------------
    | TECHNICIAN TASK
    |--------------------------------------------------------------------------
    */


    public function myTasks()
    {


        $tasks = WorkOrder::with(

            'damageReport'

        )

        ->where(

            'technician_id',

            auth()->id()

        )

        ->latest()

        ->get();





        return view(

            'technician.tasks',

            compact('tasks')

        );


    }







    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS TECHNICIAN
    |--------------------------------------------------------------------------
    */


    public function updateStatus(

        Request $request,

        $id

    )

    {


        $request->validate([


            'status'

            =>
            'required|in:OPEN,IN_PROGRESS,COMPLETED,CANCELLED'


        ]);





        $order = WorkOrder::findOrFail($id);





        $order->update([


            'status'

            => $request->status


        ]);






        return back()

        ->with(

            'success',

            'Status berhasil diperbarui'

        );


    }



}