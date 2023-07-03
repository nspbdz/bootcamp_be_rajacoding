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
    <button type="button" class="btn btn-primary">Add product</button>
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
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-primary">Remove</button>

                </td>

            </tr>
            @endforeach

        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>


<!--
<table border="1">
    <tr> ->
        <td> kebawah
            nama
        </td>
        <td>
            jenis
        </td>
    </tr>
    @foreach($data as $val)
    <tr>
        <td>
            {{$val->name}}
        </td>
        <td>
            {{$val->type_id}}
        </td>
    </tr>
    @endforeach
</table> -->
