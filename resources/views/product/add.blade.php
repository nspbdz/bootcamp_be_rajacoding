<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>

</style>

<body>

    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <form class="main-form position-relative" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="" class="form-label">Nama Produk</label>
                <input type="text" name="name" placeholder="Nama Produk" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <br>
            <div class="mb-6">
                <label for="">Tipe Produk</label>
                <select name="productType" class="form-control @error('productType') is-invalid @enderror" value="{{ old('productType') }}" id="productType">
                    <option value="">Tipe Produk</option>
                    @foreach ($type as $value)
                    <option value="{{ $value->id }}" {{ old('productType') == $value->id ? 'selected' : null }}> {{$value->name}} </option>
                    @endforeach
                </select>
                @error('productType')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="" class="form-label">Deskripsi Produk</label>
                <textarea name="description" placeholder="Deskripsi Produk" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="mb-6">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{route('product.index')}}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
