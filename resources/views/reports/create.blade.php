@extends('layouts.app')


@section('content')


<div class="card">


<h1>
Buat Damage Report
</h1>


<p style="color:#64748b">

Laporkan fasilitas yang mengalami kerusakan

</p>


<br>



<form method="POST" action="/reports">


@csrf



<label>
Nama Fasilitas
</label>


<input
style="width:100%;padding:15px;border-radius:14px;border:1px solid #ddd;margin:10px 0 20px"
name="facility_name"
placeholder="Contoh: AC Gedung A"
>



<label>
Lokasi
</label>


<input
style="width:100%;padding:15px;border-radius:14px;border:1px solid #ddd;margin:10px 0 20px"
name="location"
placeholder="Contoh: Lantai 2"
>




<label>
Judul Kerusakan
</label>


<input
style="width:100%;padding:15px;border-radius:14px;border:1px solid #ddd;margin:10px 0 20px"
name="title"
placeholder="Contoh: AC Tidak Dingin"
>




<label>
Deskripsi
</label>


<textarea

style="
width:100%;
padding:15px;
height:120px;
border-radius:14px;
border:1px solid #ddd;
margin:10px 0 20px"

name="description"

placeholder="Jelaskan kondisi kerusakan"

></textarea>




<label>
Severity
</label>


<select

style="
width:100%;
padding:15px;
border-radius:14px;
margin:10px 0 20px"

name="severity">


<option value="low">
Low
</option>


<option value="medium">
Medium
</option>


<option value="high">
High
</option>


</select>



<button>

Kirim Laporan

</button>



</form>



</div>


@endsection