<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <h1>Hello, world!</h1>
    <a href="{{ route('product.create') }}" class="btn btn-primary">Add product</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $val)

            <tr>
                <td>
                    {{$val->name}}
                </td>
                <td>
                    {{$val->type_id}}
                </td>
                <td>
                    <a href="{{ route('product.detail', ['id' => $val->id]) }}" class="btn btn-primary">Detail</a>
                    <a href="{{ route('product.edit', ['id' => $val->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('product.destroy', ['id' => $val->id]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to remove this product?')">Remove</button>
                    </form>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
