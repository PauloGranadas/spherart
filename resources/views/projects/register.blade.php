<x-layoutIndex>

    <div class="container">
        <header>
            <h2 class="text-2xl font-bold uppercase mb-1 mt-5"> Project Registration

            </h2>
            <p class="mb-4">Create your project and demand for collaboration</p>
        </header>

        </header>
    </div>
    <div class="container">
        <form method="POST" action="{{route('projects.store')}}" enctype="multipart/form-data">
            @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form3Example1" class="form-control" name="name" value="{{old('name')}}" />
                        <label class="form-label" for="form3Example1">Project Title</label>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>                
            </div>     

            <div class="form-outline">
                <textarea class="form-control" id="textAreaExample" rows="4" name="description">{{old('description')}}</textarea>
                <label class="form-label" for="textAreaExample">Description of your project (50 characters min.)</label>                
                @error('description')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            {{-- Importe File Feature  --}}
            <div class="mb-4">
                <label for="cover" class="inline-block text-lg mb-2">
                    Image Cover of your project
                </label>
                <br>
                <input type="file" {{--  --}} class="btn btn-primary" name="cover" />
                @error('cover')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>             
            {{-- Categories --}}
            @include('partials._categories')
            
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Create</button>


        </form>
    </div>


   

</x-layoutIndex>