@extends('layouts.app')


@section('content')


<div class="card">


<div style="display:flex; justify-content:space-between; align-items:center;">


<div>

<h1>
Damage Report
</h1>


<p style="color:#64748b">
Daftar laporan kerusakan fasilitas
</p>

</div>



<a href="/reports/create">

<button>
+ Buat Laporan
</button>

</a>



</div>



<br>



@if(session('success'))

<div style="
background:#dcfce7;
padding:15px;
border-radius:15px;
color:#166534;
">

{{ session('success') }}

</div>


@endif



<br>



<div style="
display:grid;
gap:20px;
">



@foreach($reports as $report)


<div style="
background:#f8fafc;
padding:25px;
border-radius:20px;
border:1px solid #e5e7eb;
">



<div style="
display:flex;
justify-content:space-between;
">



<h2>

<a href="{{ route('reports.show',$report->id) }}">

{{ $report->title }}

</a>

</h2>



<span style="
background:#dbeafe;
color:#1d4ed8;
padding:8px 14px;
border-radius:20px;
">

{{ strtoupper($report->status) }}

</span>


</div>



<br>


<p>

<b>Fasilitas:</b>

{{ $report->facility_name }}

</p>



<p>

<b>Lokasi:</b>

{{ $report->location }}

</p>



<p>

<b>Pelapor:</b>

{{ $report->user->name }}

</p>



<p>

<b>Tingkat Kerusakan:</b>

{{ strtoupper($report->severity) }}

</p>



<br>



@if(auth()->user()->role->name == 'admin_sarpras')



@if($report->status == 'submitted')


<form method="POST"
action="/reports/{{ $report->id }}/validate">


@csrf


<button>

Validasi

</button>


</form>



@elseif($report->status == 'validated')


<a href="/work-orders/create/{{ $report->id }}">

<button>

Buat Work Order

</button>

</a>



@endif



@endif



</div>



@endforeach


</div>


</div>



@endsection