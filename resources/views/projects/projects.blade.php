<x-layoutIndex>
    <div class="container">
        
        @auth
        <a href="/project/create" class="btn btn-primary mt-3">Create new project</a> 
        @endauth        
        
        <div class="row row-cols-1 row-cols-md-3 g-4 my-4">   
           
            @foreach ($projects as $project)
                <div class="col">
                    <div class="card">
                    <a href="/projects/{{$project->id}}">
                        <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/no-image.png')}}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <p class="card-text">
                            {{Str::limit($project->description, 70)}}
                        </p>

                        <span class="mx-2 d-block"> 
                            <a href="/collaborators/{{$project->creator_id}}">
                                <img
                                    src="{{$project->user->avatar ? asset('storage/' . $project->user->avatar) : asset('images/no-image.png')}}"
                                    class="rounded-circle"
                                    height="25"
                                    width="25"
                                    alt="Black and White Portrait of a Man"
                                    loading="lazy"
                                />                                
                                <small class="text-body">{{$project->user->nikname}}</small>
                           </a>   
                        </span>
                        
                        @if (auth()->check() && $project->creator_id === auth()->user()->id)
                            <div class="d-flex justify-content-end">
                                <a href="" class="btn btn-outline-secondary btn-rounded" data-mdb-ripple-color="dark">Add collaborator</a>
                                <a href=""  class="btn btn-outline-danger btn-rounded mx-2" data-mdb-ripple-color="dark"><i class="fas fa-trash"></i></a>
                                <a href=""  class="btn btn-outline-success btn-rounded" data-mdb-ripple-color="dark"><i class="fas fa-gear"></i></a>
                            </div>
                        @endif
                    </div>
                    </div>
                </div>            
            @endforeach

        </div>
    </div>
</x-layoutIndex>