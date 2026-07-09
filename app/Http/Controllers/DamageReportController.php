<?php

namespace App\Http\Controllers;


use App\Models\DamageReport;
use Illuminate\Http\Request;


class DamageReportController extends Controller
{


    public function index()
    {

        $reports = DamageReport::with('user')
            ->latest()
            ->get();


        return view(
            'reports.index',
            compact('reports')
        );

    }





    public function create()
    {

        return view(
            'reports.create'
        );

    }





    public function store(Request $request)
    {


        $validated = $request->validate([


            'facility_name'
            =>
            'required',


            'location'
            =>
            'required',


            'title'
            =>
            'required',


            'description'
            =>
            'required',


            'severity'
            =>
            'required|in:low,medium,high'


        ]);





        DamageReport::create([


            'user_id'
            =>
            auth()->id(),



            'facility_name'
            =>
            $validated['facility_name'],



            'location'
            =>
            $validated['location'],



            'title'
            =>
            $validated['title'],



            'description'
            =>
            $validated['description'],



            'severity'
            =>
            $validated['severity'],



            'status'
            =>
            'submitted'


        ]);






        return redirect('/reports')

        ->with(
            'success',
            'Laporan berhasil dikirim'
        );


    }








    public function show($id)
    {


        $report = DamageReport::with([

            'user',

            'workOrder.technician'

        ])
        ->findOrFail($id);



        return view(

            'reports.show',

            compact('report')

        );


    }







    public function validateReport($id)
    {


        $report = DamageReport::findOrFail($id);



        $report->update([

            'status'
            =>
            'validated'

        ]);




        return back()

        ->with(
            'success',
            'Laporan berhasil divalidasi'
        );


    }



}