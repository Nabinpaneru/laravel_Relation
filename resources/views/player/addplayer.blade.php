<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="bg-dark py-2">
        <div class="container">
            <div class="h4 text-white">Add Players</div>
        </div>
    </div>
  

    <div class="container pt-4">
        
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
               <div>
                <a href="{{ route('all.player') }}" class="btn btn-info">All Players</a>
               </div>
        </div>       
        <form action="{{ route('store.player') }} " method="post" enctype="multipart/form-data" class="pt-3">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class='mb-3'>
                        <label for="name" class="form-label">Player Name:</label>
                        <input typee="text" name="name" id="name" placeholder="Enter Name"
                            class="form-control"/>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class='mb-3'>
                        <label for="email" class="form-label">Player Age:</label>
                        <input type="text" name="age" placeholder="Enter Age"
                            class="form-control" />
                        @error('age')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class='mb-3'>
                        <label for="image" class="form-label">Player Image:</label>
                        <input type="file" name="image" id="image" class="form-control" /><br>
                        {{-- <img src="{{asset('club/'.$club->club_image)}}" height="90" width="90"> --}}
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class='mb-3'>
                        <label for="image" class="form-label">Player Club:</label>
                        <select class="form-select" aria-label="Default select example" name="club_id">
                            <option selected>Open this select menu</option>
                            @foreach($clubs as $club)
                            <option value="{{ $club->id }}">{{$club->club_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button class="btn btn-success mt-3">Save</button>
                    </div>



                </div>

            </div>
        </form>
    </div>

</body>
</html>
