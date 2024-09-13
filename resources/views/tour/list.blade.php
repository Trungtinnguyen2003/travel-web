<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="bg-dark py-3">
        <h3 class="text-white text-center">Quản lí tour du lịch</h3>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('tour.create') }}" class="btn btn-dark">Tạo</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @if (Session::has('success'))
            <div class="col-md-10 mt-4">
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            </div>        
            @endif

        
            <div class="col-md-10">
                <div class="card borde-0 shadow-lg my-4">
                    <div class="card-header bg-dark">
                        <h3 class="text-white">Tours</h3>
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>
                                </th>
                                <th>Tour</th>
                                <th>Phương tiện</th>
                                <th>Giá</th>
                                <th>Thời gian tạo</th>
                                <th>Hành động</th>
                            </tr>
                            @if ($tour->isNotEmpty())
                            @foreach ($tour as $tour)
                            <tr>
                                <td> {{ $tour->id }}</td>
                                <td>
                                    @if ($tour->image != "")
                                    <img width="50" src="{{ asset('uploads/tours/'.$tour->image) }}" alt="">
                                @endif
                                </td>
                                <td>{{ $tour->name }}</td>
                                <td>{{ $tour->vehicle }}</td>
                                <td>{{ $tour->price }}</td>
                                <td>{{ \Carbon\Carbon::parse($tour->created_at)->format('d M, Y') }}</td>
                                <td>
                                    <a href=" {{ route('tour.edit',$tour->id) }} " class="btn btn-dark">Sửa</a>
                                    <a href="#" onclick="deleteTour({{ $tour->id }});" class="btn btn-danger">Xóa</a>
                                    <form id="delete-tour-from-{{ $tour->id }}" action=" {{ route('tour.destroy',$tour->id) }} " method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        
                            @endif
                           
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>

<script>
    function deleteTour(id) {
        if(confirm("Bạn có muốn xóa tour này không?")) {
            document.getElementById("delete-tour-from-"+id).submit();
        }
    }

</script>