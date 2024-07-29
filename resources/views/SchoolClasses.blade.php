<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AllClasses</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">AllClasses</h2>
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
              <th scope="col">Class Name</th>
              <th scope="col">Capacity</th>
              <th scope="col">Is Fulled</th>
              <th scope="col">Price</th>
              <th scope="col">Time From</th>
              <th scope="col">Time To</th>
              <th scope="col">Edit</th>
              <th scope="col">Show</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($SchoolClasses as $SchoolClass)
            <tr>
              <td scope="row">{{$SchoolClass['name']}}</td>
              <td>{{$SchoolClass['capacity']}}</td>
              <td>{{$SchoolClass->is_fulled ? 'YES' : 'NO'}}</td>
              <td>{{$SchoolClass['price']}}</td>
              <td>{{$SchoolClass['time_from']}}</td>
              <td>{{$SchoolClass['time_to']}}</td>
              <td><a href="{{route('SchoolClasses.edit', $SchoolClass['id'])}}">Edit</a></td>
              <td><a href="{{route('SchoolClasses.Show', $SchoolClass['id'])}}">Show</a></td>

              <td>
                <form action="{{ route('deleteSchoolClass', $SchoolClass->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  
                  <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>