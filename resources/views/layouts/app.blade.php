<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
SIJAFAS
</title>


<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">


<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Plus Jakarta Sans',sans-serif;
}


body{

    background:#f6f8fc;

}



/* SIDEBAR */

.sidebar{

    position:fixed;

    width:260px;

    height:100vh;

    background:#0f172a;

    color:white;

    padding:25px;

}



.logo{

    font-size:26px;

    font-weight:700;

    margin-bottom:40px;

}



.menu a{

    display:flex;

    align-items:center;

    gap:12px;

    color:#cbd5e1;

    text-decoration:none;

    padding:14px;

    border-radius:14px;

    margin-bottom:10px;

}



.menu a:hover{

    background:#2563eb;

    color:white;

}



/* CONTENT */


.main{

    margin-left:260px;

}



.navbar{

    height:80px;

    background:white;

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:0 40px;

    border-bottom:1px solid #e5e7eb;

}



.content{

    padding:40px;

}





.card{

    background:white;

    border-radius:24px;

    padding:25px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.05);

}



.grid{

display:grid;

grid-template-columns:
repeat(auto-fit,minmax(220px,1fr));

gap:20px;

}


.stat{

background:white;

padding:25px;

border-radius:24px;

min-height:130px;

display:flex;

flex-direction:column;

justify-content:center;

}


.stat h2{

font-size:32px;

margin-bottom:10px;

}


.stat p{

color:#64748b;

font-weight:600;

}



.stat{

    background:white;

    padding:25px;

    border-radius:20px;

}



button{

    border:none;

    background:#2563eb;

    color:white;

    padding:12px 20px;

    border-radius:12px;

    cursor:pointer;

}



.logout{

    background:#dc2626;

}



</style>


</head>


<body>



@include('components.sidebar')



<div class="main">


@include('components.navbar')



<div class="content">


@yield('content')


</div>



</div>



</body>

</html>