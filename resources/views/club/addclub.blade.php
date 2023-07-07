<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD ClUB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="bg-dark py-2">
        <div class="container">
            <div class="h4 text-white">ADD CLUB</div>
        </div>
    </div>
  

    <div class="container pt-4">
        
        <div class="d-flex justify-content-between py-3">
            <div class="h4"></div>
               <div>
                <a href="{{ route('all.club') }}" class="btn btn-info">All Club</a>
               </div>
        </div>       
        <form action="{{ route('club.store') }} " method="post" enctype="multipart/form-data" class="pt-3">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class='mb-3'>
                        <label for="name" class="form-label">Club Name:</label>
                        <input typee="text" name="club_name" id="name" placeholder="Enter Name"
                            class="form-control" />
                        @error('club_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class='mb-3'>
                        <label for="email" class="form-label">Club League:</label>
                        <input type="text" name="club_league" id="email" placeholder="Enter email"
                            class="form-control" />
                        @error('club_league')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class='mb-3'>
                        <label for="image" class="form-label">Club Image:</label>
                        <input type="file" name="club_image" id="image" class="form-control" />
                        @error('club_image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

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
