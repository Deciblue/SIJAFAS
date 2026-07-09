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
Create Work Order
</h1>


<p style="color:#64748b">

Assign teknisi untuk menyelesaikan laporan kerusakan

</p>

</div>


<a href="/reports">

<button style="background:#64748b">

Kembali

</button>

</a>


</div>



<br>



<div style="
background:#f8fafc;
padding:25px;
border-radius:20px;
margin-bottom:25px;
">



<h2>
Detail Damage Report
</h2>


<br>


<p>

<b>Pelapor:</b>

{{ $report->user->name }}

</p>


<p>

<b>Fasilitas:</b>

{{ $report->facility_name }}

</p>


<p>

<b>Lokasi:</b>

{{ $report->location }}

</p>


<p>

<b>Judul:</b>

{{ $report->title }}

</p>


<p>

<b>Severity:</b>


<span style="
background:#fee2e2;
color:#dc2626;
padding:6px 12px;
border-radius:20px;
">

{{ strtoupper($report->severity) }}

</span>


</p>



<p>

<b>Deskripsi:</b>

<br>

{{ $report->description }}

</p>


</div>





<form method="POST"
action="{{ route('workorders.store') }}">


@csrf



<input
type="hidden"
name="damage_report_id"
value="{{ $report->id }}"
>



<div style="
background:white;
padding:25px;
border-radius:20px;
border:1px solid #e5e7eb;
">



<h2>
Assignment Technician
</h2>


<br>




<label>

Pilih Technician

</label>



<select

name="technician_id"

required

style="
width:100%;
padding:15px;
border-radius:14px;
border:1px solid #ddd;
margin-top:10px;
margin-bottom:25px;
">


<option value="">

-- Pilih Technician --

</option>



@foreach($technicians as $technician)


<option value="{{ $technician->id }}">


{{ $technician->name }}


</option>


@endforeach



</select>




<label>

Catatan Pekerjaan

</label>


<textarea

name="notes"

placeholder="Berikan instruksi pekerjaan teknisi"

style="
width:100%;
height:120px;
padding:15px;
border-radius:14px;
border:1px solid #ddd;
margin-top:10px;
margin-bottom:25px;
"

></textarea>




<button type="submit">

Buat Work Order

</button>




</div>



</form>




</div>



@endsection