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
    <div class="my-5 mx-5">
        <h1 class="text-center">Menambahkan Barang</h1>
        <form action="/update-barang/{{$barang->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nama" minlength="5" maxlength="80" required value="{{$barang->Nama}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Harga Barang</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="Harga" required value="{{$barang->Harga}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="Jumlah" required value="{{$barang->Jumlah}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Foto Barang</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="Image" required value="{{$barang->Image}}">
        </div>
        {{-- <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->nama}}</option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
