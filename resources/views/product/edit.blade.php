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
    <h1>Edit Product</h1>


    <div class="container-fluid d-flex justify-content-center align-items-center vh-100">

        <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" placeholder="Product Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" placeholder="Product Description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>

            <div class="mb-6">
                <label for="">Tipe Produk</label>
                <select name="productType" class="form-control @error('productType') is-invalid @enderror" id="productType">
                    <option value="">Tipe Produk</option>
                    @foreach ($type as $value)
                    <option value="{{ $value->id }}" {{ old('productType', $product->type_id) == $value->id ? 'selected' : null }}> {{ $value->name }} </option>
                    @endforeach
                </select>
                @error('productType')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <br>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Photo" class="mb-2" style="max-width: 200px;">
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
