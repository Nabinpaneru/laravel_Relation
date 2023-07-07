<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">ALL PLAYERS</div>
        </div>
    </div>

    <div class="container pt-4">
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
            <div>
                <a href="{{ route('add.player') }}" class="btn btn-dark">Add Player</a>
            </div>

        </div>
        @php
            $i = 1;
        @endphp

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">SN:</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Image</th>
                    <th scope="col">Club</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($players as $player)
{{-- 
     {{dd($player->relation)}}   --}}
                @foreach ($player->relation as $item)
             <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $item->name??'' }}</td>
                        <td>{{ $item->age ?? '' }}</td>
                        <td>@if($item!=null)
                            <img src="{{ asset('player/'.$item->image) }}" height="70" width="70"></td>
                            @endif
                        <td>{{ $player->club_name }}</td>
                        <td><a href="{{ route('edit.player', $player->id) }}" class="btn btn-info sm">Edit</a>
                            <a href="{{ route('delete.player', $player->id) }}"class="btn btn-danger " id="delete">Delete</a>

                    </tr>
                    @endforeach   
                @endforeach

            </tbody>
        </table>


</body>

</body>
<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>

<script>
    $(function() {
        $(document).on('click', '#delete', function(e) {
            e.preventDefault();
            var link = $(this).attr("href");


            Swal.fire({
                title: 'Are you sure?',
                text: "Delete This Data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })


        });

    });
</script>


</html>
