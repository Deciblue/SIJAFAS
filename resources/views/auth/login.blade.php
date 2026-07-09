<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Login SIJAFAS
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


    min-height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

    background:#f6f8fc;


}




.container{


    width:100%;

    max-width:420px;

    padding:20px;


}




.login-card{


    background:white;

    padding:40px;

    border-radius:28px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.08);


}




.logo{


    text-align:center;

    font-size:34px;

    font-weight:700;

    color:#005cab;

    margin-bottom:10px;


}



.subtitle{


    text-align:center;

    color:#64748b;

    margin-bottom:35px;


}




label{


    font-size:14px;

    font-weight:600;

    color:#334155;

}



input{


    width:100%;

    padding:14px 16px;

    margin-top:8px;

    margin-bottom:20px;


    border:1px solid #dbe3ef;

    border-radius:14px;


    font-size:15px;


    outline:none;


}



input:focus{


    border-color:#2563eb;


}





button{


    width:100%;

    padding:15px;


    border:none;

    border-radius:14px;


    background:#2563eb;


    color:white;


    font-size:16px;

    font-weight:600;


    cursor:pointer;


}



button:hover{


    background:#1d4ed8;


}




.error{


    background:#fee2e2;

    color:#dc2626;

    padding:12px;

    border-radius:12px;

    margin-bottom:20px;

    font-size:14px;


}




.footer{


    text-align:center;

    margin-top:25px;

    color:#94a3b8;

    font-size:13px;


}


</style>


</head>



<body>



<div class="container">



<div class="login-card">



<div class="logo">

SIJAFAS

</div>



<p class="subtitle">

Sistem Informasi Sarana dan Prasarana

</p>




@if($errors->any())


<div class="error">

Email atau password salah

</div>


@endif





<form method="POST" action="/login">


@csrf



<label>
Email
</label>


<input

type="email"

name="email"

placeholder="Masukkan email"

required

>



<label>
Password
</label>


<input

type="password"

name="password"

placeholder="Masukkan password"

required

>



<button type="submit">

Login

</button>



</form>




<div class="footer">

© SIJAFAS 2026

</div>



</div>


</div>



</body>


</html>