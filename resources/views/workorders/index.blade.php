@extends('layouts.app')


@section('content')



<div class="card">


<div style="
display:flex;
justify-content:space-between;
align-items:center;
">


<div>

<h1>
Work Order Management
</h1>


<p style="color:#64748b">

Monitoring pekerjaan teknisi

</p>


</div>



</div>



</div>




<br>





@if(session('success'))

<div class="card"
style="
background:#dcfce7;
color:#166534;
">

{{ session('success') }}

</div>

<br>

@endif






<div style="
display:grid;
gap:20px;
">





@forelse($orders as $order)



<div class="card">


<div style="
display:flex;
justify-content:space-between;
align-items:center;
">


<div>


<h2>

{{ $order->damageReport->title }}

</h2>


<p style="color:#64748b">

{{ $order->damageReport->facility_name }}

-

{{ $order->damageReport->location }}

</p>


</div>






@if($order->status=="OPEN")


<span style="
background:#fef3c7;
color:#92400e;
padding:8px 15px;
border-radius:20px;
">

OPEN

</span>



@elseif($order->status=="IN_PROGRESS")


<span style="
background:#dbeafe;
color:#1d4ed8;
padding:8px 15px;
border-radius:20px;
">

IN PROGRESS

</span>



@elseif($order->status=="COMPLETED")


<span style="
background:#dcfce7;
color:#166534;
padding:8px 15px;
border-radius:20px;
">

COMPLETED

</span>



@endif



</div>




<br>



<p>

<b>
Technician:
</b>


@if($order->technician)

{{ $order->technician->name }}

@else

Belum ditentukan

@endif


</p>




<p>

<b>
Catatan:
</b>


{{ $order->notes ?? '-' }}


</p>




<br>



<a href="/reports/{{ $order->damageReport->id }}">


<button>

Lihat Report

</button>


</a>




</div>




@empty



<div class="card">


<center>

<h3>
Belum ada Work Order
</h3>


</center>


</div>



@endforelse





</div>



@endsection