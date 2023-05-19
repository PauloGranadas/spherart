<x-layoutIndex>
    <div class="container">
        
        @auth
        <a href="/projects/register" class="btn btn-primary mt-3">Create new project</a> 
        @endauth        
        
        <div class="row row-cols-1 row-cols-md-3 g-4 my-4">   
           
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card">
                    <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/no-image.png')}}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <p class="card-text">
                            {{Str::limit($project->description, 70)}}
                        </p>

                        <span class="mx-2">
                            <img
                                src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
                                class="rounded-circle"
                                height="25"
                                alt="Black and White Portrait of a Man"
                                loading="lazy"
                            />
                            author:  
                        </span>
                        
                        <a href="" class="btn btn-outline-secondary btn-rounded" data-mdb-ripple-color="dark">Add collaborator</a>
                        <a href=""  class="btn btn-outline-danger btn-rounded" data-mdb-ripple-color="dark"><i class="fas fa-trash"></i></a>
                    </div>
                    </div>
                </div>            
            @endforeach

        </div>
    </div>
</x-layoutIndex>