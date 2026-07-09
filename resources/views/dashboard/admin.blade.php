@extends('layouts.app')


@section('content')


<div class="card"
style="
padding:35px;
background:linear-gradient(135deg,#005cab,#2563eb);
color:white;
">


<div style="
display:flex;
justify-content:space-between;
align-items:center;
">


<div>


<h1 style="
font-size:34px;
margin-bottom:10px;
">

Good Morning,
{{auth()->user()->name}}

</h1>


<p style="
opacity:.85;
">

Manage facility reports, work orders, and technician activities.

</p>


</div>



<a href="/reports">


<button style="
background:white;
color:#005cab;
font-weight:600;
">

Manage Report

</button>


</a>



</div>


</div>



<br>




<div class="grid"
style="
grid-template-columns:repeat(4,1fr);
">



<div class="stat"
style="
background:#eff6ff;
">


<h2 style="color:#2563eb">

📋 {{ $totalReports }}

</h2>


<p>

Total Reports

</p>


</div>




<div class="stat"
style="
background:#fff7ed;
">


<h2 style="color:#ea580c">

⏳ {{ $pendingReports }}

</h2>


<p>

Waiting Validation

</p>


</div>




<div class="stat"
style="
background:#f0fdf4;
">


<h2 style="color:#16a34a">

🔧 {{ $activeOrders }}

</h2>


<p>

Active Work Order

</p>


</div>




<div class="stat"
style="
background:#f5f3ff;
">


<h2 style="color:#7c3aed">

✓ {{ $completedOrders }}

</h2>


<p>

Completed

</p>


</div>



</div>





<br>





<div class="card">



<div style="
display:flex;
justify-content:space-between;
align-items:center;
">


<div>

<h2>

Recent Damage Reports

</h2>


<p style="color:#64748b">

Latest facility complaints

</p>


</div>



<a href="/reports">

View All

</a>



</div>



<br>




@foreach($latestReports as $report)



<div style="
padding:25px;
border-radius:20px;
background:#f8fafc;
margin-bottom:15px;
">



<div style="
display:flex;
justify-content:space-between;
align-items:center;
">



<div>


<h3>

{{ $report->title }}

</h3>


<p style="
color:#64748b;
">


{{ $report->facility_name }}

•
{{ $report->location }}


</p>


</div>



@if($report->status=='validated')


<span style="
background:#dcfce7;
color:#166534;
padding:8px 16px;
border-radius:20px;
font-size:13px;
">

VALIDATED

</span>



@elseif($report->status=='submitted')


<span style="
background:#fef3c7;
color:#92400e;
padding:8px 16px;
border-radius:20px;
">

WAITING

</span>



@endif



</div>



<br>


<div style="
display:flex;
gap:20px;
color:#475569;
">


<span>

👤 {{$report->user->name}}

</span>



<span>

⚠ {{$report->severity}}

</span>


</div>



</div>



@endforeach




</div>



@endsection