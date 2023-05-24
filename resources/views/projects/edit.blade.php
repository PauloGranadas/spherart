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
            @method('PUT')
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form3Example1" class="form-control" name="name" value="{{$project->name}}" />
                        <label class="form-label" for="form3Example1">Project Title</label>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-outline">
                <textarea class="form-control" id="textAreaExample" rows="4" name="description">{{$project->description}}</textarea>
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
                <img class="w-48 mr-6 mb-6" style="height:150px;"
                src="{{$project->cover ? asset('storage/' . $project->cover) : asset('/images/cover-no-image.png')}}"
                alt=""
                >
            </div>
            {{-- Categories --}}
            <label for="options" class="form-label mt-3">Choose the categories:</label>
            <div class="checkbox-group border border-secondary rounded p-4 mb-4">
                @foreach($categories as $category)
                    <label class="btn  {{ in_array($category->id, $projectCategories) ? 'btn-outline-success' : 'btn-outline-secondary' }} btn-rounded mb-2">                        
                        <input type="checkbox" id="{{$category->id }}" value="{{$category->id}}" name="categories[]" class="d-none" {{ in_array($category->id, $projectCategories) ? 'checked' : '' }} >
                        {{$category->area_name}}
                    </label>
                @endforeach           
            </div>
            @if($errors->has('categories'))
                <p class="text-danger">{{ $errors->first('categories') }}</p>
            @endif


            <script>
                document.addEventListener('DOMContentLoaded', function() {
                const checkboxGroup = document.querySelector('.checkbox-group');
                const labels = checkboxGroup.querySelectorAll('label');

                labels.forEach(function(label) {
                    const checkbox = label.querySelector('input[type="checkbox"]');

                    label.addEventListener('click', function() {
                    checkbox.checked = !checkbox.checked;

                    if (checkbox.checked) {
                        label.classList.add('btn-outline-success');
                    } else {
                        label.classList.remove('btn-outline-success');
                    }
                    });
                    
                });
                });
            </script>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary">Update</button>


        </form>
    </div>




</x-layoutIndex>