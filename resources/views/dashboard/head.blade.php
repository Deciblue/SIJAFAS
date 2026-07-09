@extends('layouts.app')


@section('content')


<div class="card">


<h1>
Head Sarpras Dashboard
</h1>


<p style="color:#64748b">

Monitoring performa sarana prasarana

</p>


</div>



<br>



<div class="grid">



<div class="stat"
style="background:#eff6ff">

<h2 style="color:#2563eb">

📋 {{ $totalReports }}

</h2>


<p>

Total Reports

</p>


</div>




<div class="stat"
style="background:#fff7ed">

<h2 style="color:#ea580c">

⏳ {{ $pendingReports }}

</h2>


<p>

Pending Validation

</p>


</div>




<div class="stat"
style="background:#f0fdf4">

<h2 style="color:#16a34a">

🔧 {{ $activeWorkOrders }}

</h2>


<p>

Active Work Order

</p>


</div>




<div class="stat"
style="background:#f5f3ff">

<h2 style="color:#7c3aed">

✓ {{ $completedWorkOrders }}

</h2>


<p>

Completed

</p>


</div>



</div>




<br>





<div class="card">


<h2>
Technician Performance
</h2>


<br>



<div style="
display:grid;
gap:15px;
">



@foreach($technicianPerformance as $tech)



<div style="
background:#f8fafc;
padding:20px;
border-radius:20px;
display:flex;
justify-content:space-between;
">



<div>


<h3>

{{ $tech->name }}

</h3>


<p style="color:#64748b">

Technician

</p>


</div>




<div>


<b>

{{ $tech->work_orders_count }}

</b>


<br>


<span style="color:#64748b">

Work Orders

</span>


</div>




</div>



@endforeach



</div>


</div>




<br>





<div class="card">


<h2>
Recent Reports
</h2>


<br>



@foreach($latestReports as $report)



<div style="
background:#f8fafc;
padding:20px;
border-radius:20px;
margin-bottom:15px;
">


<h3>

{{ $report->title }}

</h3>


<p>

{{ $report->facility_name }}

-

{{ $report->location }}

</p>



<span style="
background:#dbeafe;
padding:7px 14px;
border-radius:20px;
">

{{ strtoupper($report->status) }}

</span>



</div>



@endforeach



</div>




@endsection