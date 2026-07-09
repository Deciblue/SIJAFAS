@extends('layouts.app')


@section('content')


<div class="card"
style="
padding:35px;
background:linear-gradient(
135deg,
#111827,
#334155
);
color:white;
">


<h1>

Executive Dashboard

</h1>


<p style="opacity:.8">

SIJAFAS Facility Management Overview

</p>



</div>




<br>





<div class="grid">



<div class="stat"
style="
background:#eff6ff;
">


<h2 style="color:#2563eb">

{{ $totalReports }}

</h2>


<p>

Total Reports

</p>


</div>





<div class="stat"
style="
background:#dcfce7;
">


<h2 style="color:#16a34a">

{{ $completedReports }}

</h2>


<p>

Completed

</p>


</div>





<div class="stat"
style="
background:#fff7ed;
">


<h2 style="color:#ea580c">

{{ $activeReports }}

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

{{ $completionRate }}%

</h2>


<p>

Completion Rate

</p>


</div>



</div>






<br>






<div class="card">


<h2>

Monthly Report Statistic

</h2>



<br>




@php

$months = [

"01"=>"January",

"02"=>"February",

"03"=>"March",

"04"=>"April",

"05"=>"May",

"06"=>"June",

"07"=>"July",

"08"=>"August",

"09"=>"September",

"10"=>"October",

"11"=>"November",

"12"=>"December"

];

@endphp





@forelse($monthlyReports as $data)



<div style="
margin-bottom:20px;
">



<div style="
display:flex;
justify-content:space-between;
">


<span>

{{ $months[$data->month] ?? $data->month }}

</span>


<b>

{{ $data->total }}

Reports

</b>


</div>




<div style="
height:12px;
background:#e5e7eb;
border-radius:20px;
margin-top:8px;
">


<div style="
height:100%;
width:{{ $data->total * 20 }}%;
background:#2563eb;
border-radius:20px;
">

</div>


</div>



</div>




@empty



<p style="color:#64748b">

Belum ada statistik

</p>



@endforelse




</div>







<br>






<div class="card">


<h2>

Latest Activity

</h2>



<br>



@foreach($latestReports as $report)



<div style="
background:#f8fafc;
padding:20px;
border-radius:18px;
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



<div style="
color:#64748b;
">

Reporter:

{{ $report->user->name }}

</div>



<br>



<span style="
background:#dbeafe;
padding:7px 15px;
border-radius:20px;
">

{{ strtoupper($report->status) }}

</span>



</div>



@endforeach



</div>




@endsection