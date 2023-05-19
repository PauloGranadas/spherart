<x-layoutIndex>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 my-4">   
                          
        
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card">
                    <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/no-image.png')}}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <p class="card-text">
                            {{Str::limit($project->description, 40)}}
                        </p>
                    </div>
                    </div>
                </div>            
            @endforeach

        </div>
    </div>
</x-layoutIndex>