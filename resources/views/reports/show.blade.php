@extends('layouts.app')


@section('content')


<div class="card">


<h1>

{{ $report->title }}

</h1>


<p style="color:#64748b">

Damage Report Detail

</p>



<br>



<div class="card">


<h2>
Informasi Kerusakan
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
<b>Severity:</b>
{{ strtoupper($report->severity) }}
</p>



<p>
<b>Status:</b>

{{ strtoupper($report->status) }}

</p>



<br>


<p>

{{ $report->description }}

</p>



</div>




<br>



<div class="card">


<h2>
Timeline
</h2>


<br>


<p>

✅ Submitted

</p>


<p>

@if(
in_array(
$report->status,
[
'validated',
'completed'
]
)
)

✅

@else

○

@endif


Validated

</p>




<p>

@if($report->workOrder)

✅

@else

○

@endif


Work Order Created

</p>




<p>

@if(
$report->status=='completed'
)

✅

@else

○

@endif


Completed

</p>



</div>




</div>



@endsection