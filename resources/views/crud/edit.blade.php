<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        form {
            min-width: 300px;
            max-width: 400px;
            padding: 30px;
            margin: 100px;
            background: #ffffff59;
            -webkit-box-shadow: 3px 3px 23px -9px rgba(0, 0, 0, 0.86);
            -moz-box-shadow: 3px 3px 23px -9px rgba(0, 0, 0, 0.86);
            box-shadow: 3px 3px 23px -9px rgba(0, 0, 0, 0.86);
        }
        .container
        {
          display:contents;
        }
        form input {
            border: 1px solid #eee;
            border-radius: 0 !important;
            padding: 5px 8px;
            color: #444;
        }

        form button {
            color: #555;
            background: #5d4c9aad;
            border: 1px solid #fff !important;
            margin-top: 20px;
            border-radius: 0px Important;
        }

        form button:hover {
            background: #5d4e6d !important;
        }

        .pull-right {
            float: right;
        }

        body {
            background: #413c69;
            background: -webkit-linear-gradient(to right, #a894ff, #5458d2);
            background: linear-gradient(to right, #94dfff, #7072f5);
        }
    </style>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-1">
            <h5 class="text-white text-center"> Student Form </h5>
        </div>
    </div>
    <nav class="navbar navbar-dark bg-secondary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        <form action="{{ route('store-student') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Full Name :</label>
                <input type="text" class="form-control" name="name" value="{{ old('name',$student->name)}}">
                <label for="dob">Date of Birth :</label>
                <input type="date" class="form-control" name="birthdate" value="{{ old('birthdate',$student->birthdate)}}">
                <label for="email">Email address :</label>
                <input type="email" class="form-control" name="email" value="{{ old('email',$student->email)}}">
                <label for="address">Address :</label>
                <input type="text" class="form-control" name="address" value="{{ old ('address',$student->address)}}">
                <label for="income">Fees:</label>
                <input type="number" class="form-control" name="fees" value="{{ old('fees',$student->fees )}}">
            </div>

            <button type="reset" class="btn">Reset</button>
            <button type="submit" class="btn" style="float:right">Submit</button>
        </form>
    </div>
</body>

</html>
