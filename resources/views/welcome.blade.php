</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT Meksiko</title>
</head>

<style>
    *{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
    }

    nav{
        font-weight: bold
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light text-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">PT. Meksiko</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-
            controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    @can('isAdmin')
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">LIST BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/create-barang">ADD BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/create-category">ADD CATEGORY</a>
                        </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/register">REGISTER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{url('showcart')}}">CART [{{$count = 0}}]</a>
                    </li>
                    @can('isAdmin')
                        <p class="nav-link active text-primary">YOU ARE AN ADMINISTRATOR</p>
                    @endcan
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search Barang" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div style="background-color:#F5F5F5">
    <h1 class="text-center" style="font-weight: bold" >LIST BARANG</h1>
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="btn-close" aria-label="Close"></button>
            {{session()->get('message')}}
        </div>
        @endif
    <div class="d-flex mx-5 flex-wrap">
        @foreach($barangs as $barang)
            <div class="card w-40 my-5 mx-5" style="width: 18rem;"">
                <img src="{{asset('/storage/Barang/'.$barang->Image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-title"><b>Menu&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: {{$barang->Nama}}</b></p>
                    <p class="card-text">Harga&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Rp.{{$barang->Harga}}</p>
                    <p class="card-text">Jumlah&nbsp&nbsp&nbsp&nbsp: {{$barang->Jumlah}}</p>
                    <p class="card-text">Kategori&nbsp&nbsp: {{$barang->category->nama}}</p>

                    <form action="{{url('addcart', $barang->id)}}" method="POST">
                        @csrf
                        <input type="number" value="1" min="1" class="form-control" style="width:110px" name="quantity"><br>
                        <input class="btn btn-primary" type="submit" value="Add to Cart"></input><br>
                    </form>

                    @can('isAdmin')
                        <a href="{{route('edit', $barang -> id)}}" class="btn btn-success">Edit</a><br><br>
                        <form action="/delete-barang/{{$barang->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button  class="btn btn-danger">Delete</button>
                        </form>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/
