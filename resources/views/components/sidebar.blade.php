<div class="sidebar">


<div class="logo">

SIJAFAS

</div>



<div class="menu">


<a href="/dashboard">
🏠 Dashboard
</a>



@if(
auth()->user()->role->name == 'student'
||
auth()->user()->role->name == 'lecturer'
)


<a href="/reports/create">

📝 Buat Laporan

</a>


<a href="/reports">

📄 Riwayat Laporan

</a>


@endif





@if(auth()->user()->role->name == 'admin_sarpras')


<a href="/reports">

⚠ Damage Report

</a>



<a href="/work-orders">

🔧 Work Order Management

</a>


@endif





@if(auth()->user()->role->name == 'technician')


<a href="/technician/tasks">

🔧 My Work Orders

</a>


<a href="#">

📷 Upload Evidence

</a>


@endif





<a href="#">

⚙ Pengaturan

</a>



</div>


<br>


<form method="POST" action="/logout">


@csrf


<button class="logout">

Logout

</button>


</form>


</div>