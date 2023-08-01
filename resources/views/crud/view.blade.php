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
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Information</title>
</head>

<body>

    <h5 class="font-monospace text-center p-1">WELCOME PAGE</h5>

    <div class="pull-right">
        <a class="btn btn-outline-dark" href="{{ route('store-student') }}">Create New Post</a>
    </div><br>

    <table class="table table-striped" id="example">
        <thead>
            <tr>
                <th>Index</th>
                <th>NAME</th>`
                <th>Birthdate</th>
                <th>Address</th>
                <th>Email</th>
                <th>Fees</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @php
                $index='';
            @endphp
            @foreach ($students as $student)
                <tr>
                    <td>{{ ++ $index }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ date('d-m-y', strtotime($student->birthdate)) }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->fees }}</td>
                    <td><button type="submit" class="btn btn-dark">Delete</button></td>
                    <td><a href="{{ route('store-student', ['id' => $student->id]) }}" class="btn btn-dark text-light">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example justify-content-center">
        <ul class="pagination">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
      
      <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true
            });
    
    
            $('.pagination li').click(function() {
                $('.pagination li').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
    
</body>

</html>
