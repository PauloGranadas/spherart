<x-layoutIndex>
    <div class="container">
        <h1 class="my-3">Add Collaborators</h1>
        <span>to your project</span>
        <h3>{{$project->name}}</h3>

        <!--Search Collaborators-->
        <div class="row my-4">
            <div class="col-5">           
                <form action="{{ route('collaborators.search') }}" method="GET" class="input-group">                    
                        <div class="form-outline">
                            <input type="text" name="search" id="form1" class="form-control" />
                            <label class="form-label" for="form1">Search per nikname</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>                    
                </form>
            </div>            
        </div>

        <!--Collaborators for the project-->
        <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
            <th>Collaborators</th>
            <!-- <th>Status</th>
                <th>Title</th>-->
            <th></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($collaborators as $collaborator)
            <tr>
                <td>
                <div class="d-flex align-items-center">
                    <img
                        src="{{$collaborator->avatar ? asset('storage/' . $collaborator->avatar) : asset('images/no-image.png')}}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                    <p class="fw-bold mb-1">{{$collaborator->nikname}}</p>
                    <p class="text-muted mb-0">{{$collaborator->email}}</p>
                    </div>
                </div>
                </td>
                <td>
                    @foreach ($collaborator->categories as $category)
                        <span class="badge rounded-pill badge-info px-4 py-2 h2">{{$category->area_name}}</span> 
                    @endforeach
                </td>
                <td>
                    <form action="{{ route('projects.collaborators.store', [$project, $collaborator]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn btn-warning btn-sm btn-rounded">
                            collaborate <i class="fas fa-people-arrows"></i>
                        </button>  
                    </form>              
                </td>
            </tr>
            @endforeach

        </tbody>
        </table>
        

    </div>
    
</x-layoutIndex>