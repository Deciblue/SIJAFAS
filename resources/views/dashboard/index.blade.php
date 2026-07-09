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
Halo, {{ auth()->user()->name }}
</h1>


<p style="color:#64748b">

Selamat datang di SIJAFAS

</p>


</div>



<a href="/reports/create">


<button>

+ Buat Laporan

</button>


</a>


</div>



<br><br>



<div class="grid">



<div class="stat">


<h2>

{{ $reports->count() }}

</h2>


<p>

Total Laporan

</p>


</div>




<div class="stat">


<h2>

{{ 
$reports->where(
'status',
'submitted'
)->count()
}}

</h2>


<p>

Menunggu Proses

</p>


</div>




<div class="stat">


<h2>

{{ 
$reports->where(
'status',
'completed'
)->count()
}}

</h2>


<p>

Selesai

</p>


</div>



<div class="stat">


<h2>

{{ 
$reports->where(
'status',
'validated'
)->count()
}}

</h2>


<p>

Diproses

</p>


</div>



</div>



</div>





<br>




<div class="card">


<h2>

Riwayat Laporan Terbaru

</h2>



<br>




@if($reports->count() > 0)



<div style="
display:grid;
gap:15px;
">



@foreach($reports->take(5) as $report)



<div style="
background:#f8fafc;
padding:20px;
border-radius:20px;
">



<div style="
display:flex;
justify-content:space-between;
">


<h3>

{{ $report->title }}

</h3>



<span style="
background:#dbeafe;
color:#1d4ed8;
padding:6px 12px;
border-radius:20px;
">

{{ strtoupper($report->status) }}

</span>



</div>



<br>



<p>

<b>
Fasilitas:
</b>

{{ $report->facility_name }}

</p>



<p>

<b>
Lokasi:
</b>

{{ $report->location }}

</p>



<p>

<b>
Severity:
</b>

{{ strtoupper($report->severity) }}

</p>



</div>



@endforeach



</div>



@else



<div style="
padding:30px;
text-align:center;
color:#64748b;
">


<h3>
Belum ada laporan
</h3>


<p>
Silakan buat laporan kerusakan fasilitas.
</p>



</div>



@endif




</div>



@endsection