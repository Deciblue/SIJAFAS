@extends('layouts.app')


@section('content')


<div class="card">


<h1>
Technician Dashboard
</h1>


<p style="color:#64748b">

Kelola pekerjaan perbaikan fasilitas

</p>



<br>



<div class="grid">


<div class="stat">

<h2>
{{ \App\Models\WorkOrder::where('technician_id',auth()->id())->count() }}
</h2>

<p>
Total Task
</p>

</div>



<div class="stat">

<h2>
{{ \App\Models\WorkOrder::where('technician_id',auth()->id())->where('status','IN_PROGRESS')->count() }}
</h2>


<p>
Sedang Dikerjakan
</p>

</div>



<div class="stat">

<h2>
{{ \App\Models\WorkOrder::where('technician_id',auth()->id())->where('status','COMPLETED')->count() }}
</h2>


<p>
Selesai
</p>

</div>


</div>



<br>


<a href="/technician/tasks">

<button>

Lihat Semua Task

</button>

</a>



</div>



@endsection