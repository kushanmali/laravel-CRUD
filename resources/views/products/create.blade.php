<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OPERATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class=" bg-dark py-3">

        <h3 class='text-white text-center'>LARAVEL CRUD</h3>

    </div>

    <div class = 'container'>
        <div class = 'row d-flex justify-content-center'>
            <div class='col-md-10'>
                <div class = 'card borde-0 shadow-lg'>
                    <div class = 'card-header bg-dark'>
                        <h3 class="text-white">Create Product</h3>
                    </div>

                 <form action="{{route ('products.store')}}" method="POST">
                    @csrf
                    <div class = 'card-body'>
                        <div class = 'mb-3'>
                            <label for="" class='form-lable h5'>Name</label>
                            <input value="{{old('name')}}" type="text" class=" @error('name') is-invalid
                                
                            @enderror form-control form-control-lg" placeholder="Name" name="name">
                            @error('name')
                            <p class = 'invalid-feedback'>{{$message}}</p>
                                
                            @enderror
                        </div>
                        <div class = 'mb-3'>
                            <label for="" class='form-lable h5'>Sku</label>
                            <input value="{{old('sku')}}" type="text" class=" @error('sku') is-invalid
                                
                            @enderror form-control form-control-lg" placeholder="Sku" name="sku">
                            @error('sku')
                            <p class = 'invalid-feedback'>{{$message}}</p>
                                
                            @enderror
                        </div>
                        <div class = 'mb-3'>
                            <label for="" class='form-lable h5' >Price</label>
                            <input value="{{old('price')}}" type="text" class="@error('price') is-invalid
                                
                            @enderror form-control form-control-lg" placeholder="Price" name="price">

                            @error('price')
                            <p class = 'invalid-feedback'>{{$message}}</p>
                                
                            @enderror
                        </div>
                        <div class = 'mb-3'>
                            <label for="" class='form-lable h5'>Description</label>
                            <textarea class="form-control" name="description" cols="30" rows="5" placeholder="description" value="{{old('description')}}"></textarea>
                        </div>
                        <div class = 'mb-3'>
                            <label for="" class='form-lable h5' >Image</label>
                            <input type="file" class="form-control form-control-lg" placeholder="Image" name="image">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-lg btn-primary">Submit</button>
                        </div>
                    </div>
                 </form>
                </div>
            </div>
        </div>
    </div>


    
  </body>
</html>