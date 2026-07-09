<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

use App\Models\DamageReport;

use Illuminate\Http\Request;



class DamageReportController extends Controller
{


public function index(Request $request)
{


$reports=DamageReport::with('user')
->latest()
->get();



return response()->json($reports);



}



public function store(Request $request)
{


$data=$request->validate([


'facility_name'=>'required',

'location'=>'required',

'title'=>'required',

'description'=>'required',

'severity'=>'required'


]);




$data['user_id']=auth()->id();

$data['status']='submitted';



$report=DamageReport::create($data);



return response()->json([

'message'=>'Laporan dibuat',

'data'=>$report

]);


}



}