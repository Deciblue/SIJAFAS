<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;

use App\Models\WorkOrder;

use Illuminate\Http\Request;



class WorkOrderController extends Controller
{


public function technicianTasks(Request $request)
{


$data=WorkOrder::with(

'damageReport'

)

->where(
'technician_id',
auth()->id()
)

->latest()

->get();



return response()->json($data);



}




public function updateStatus(
Request $request,
$id
)
{


$order=WorkOrder::findOrFail($id);



$order->update([

'status'=>$request->status

]);



return response()->json([

'message'=>'Status updated'

]);


}



}