@extends('layouts.app')


@section('content')


<div class="card">


<div style="
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:30px;
">


<div>

<h1>
My Work Orders
</h1>


<p style="color:#64748b">

Kelola pekerjaan perbaikan fasilitas

</p>


</div>


<div style="
background:#dbeafe;
padding:15px 20px;
border-radius:18px;
color:#1d4ed8;
font-weight:600;
">

Technician Panel

</div>


</div>




<div class="grid"
style="
grid-template-columns:repeat(3,1fr);
margin-bottom:30px;
">


<div class="stat">

<h2>
{{ $tasks->count() }}
</h2>

<p>
Total Work Order
</p>

</div>



<div class="stat">

<h2>
{{ $tasks->where('status','OPEN')->count() }}
</h2>

<p>
Open
</p>

</div>



<div class="stat">

<h2>
{{ $tasks->where('status','COMPLETED')->count() }}
</h2>

<p>
Completed
</p>

</div>



</div>





<h2>
Assigned Tasks
</h2>


<br>



<div style="
display:grid;
gap:25px;
">


@forelse($tasks as $task)



<div style="
background:white;
border-radius:25px;
padding:30px;
border:1px solid #e5e7eb;
box-shadow:0 10px 25px rgba(0,0,0,.05);
">



<div style="
display:flex;
justify-content:space-between;
align-items:center;
">


<div>


<h2>
{{ $task->damageReport->title }}
</h2>


<p style="color:#64748b">

{{ $task->damageReport->facility_name }}

<br>

{{ $task->damageReport->location }}

</p>


</div>




@if($task->status=="OPEN")

<span style="
background:#fef3c7;
color:#92400e;
padding:8px 15px;
border-radius:20px;
">

OPEN

</span>


@elseif($task->status=="IN_PROGRESS")


<span style="
background:#dbeafe;
color:#1d4ed8;
padding:8px 15px;
border-radius:20px;
">

IN PROGRESS

</span>



@elseif($task->status=="COMPLETED")


<span style="
background:#dcfce7;
color:#166534;
padding:8px 15px;
border-radius:20px;
">

COMPLETED

</span>



@else


<span style="
background:#fee2e2;
color:#dc2626;
padding:8px 15px;
border-radius:20px;
">

CANCELLED

</span>


@endif



</div>




<br>



<p>

<b>Deskripsi Kerusakan</b>

</p>


<p style="color:#475569">

{{ $task->damageReport->description }}

</p>



<br>



<p>

<b>Status Progress</b>

</p>



@php

$progress = match($task->status){

'OPEN'=>25,

'IN_PROGRESS'=>60,

'COMPLETED'=>100,

default=>0

};

@endphp



<div style="
height:12px;
background:#e2e8f0;
border-radius:20px;
overflow:hidden;
">


<div style="
height:100%;
width:{{ $progress }}%;
background:#2563eb;
">

</div>


</div>



<p style="
margin-top:8px;
color:#64748b;
">

{{ $progress }}% Completed

</p>




<br>




<form method="POST"

action="{{ route('technician.status',$task->id) }}">


@csrf



<div style="
display:flex;
gap:15px;
">


<select name="status"

style="
flex:1;
padding:14px;
border-radius:14px;
border:1px solid #ddd;
">


<option value="OPEN">
OPEN
</option>


<option value="IN_PROGRESS">
IN PROGRESS
</option>


<option value="COMPLETED">
COMPLETED
</option>


<option value="CANCELLED">
CANCELLED
</option>


</select>



<button>

Update

</button>



</div>


</form>



</div>



@empty



<div class="card">

<center>

<h2>
Tidak Ada Work Order
</h2>


<p>
Belum ada pekerjaan yang diberikan admin.
</p>


</center>


</div>



@endforelse



</div>


</div>


@endsection