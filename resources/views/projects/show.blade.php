<x-layoutIndex>
    
    <div class="container">

      @auth
      @if (auth()->check() && $project->creator_id === auth()->user()->id)

        <div class="text-right">
          <a href="/projects/{{$project->id}}/add" class="btn btn-warning btn-rounded my-2 fs-6"><i class="fas fa-people-arrows"></i> add Collaborator</a>
        </div>
      @endif
      @endauth
      <div class="position-relative">
        <!--Images to showcase the project-->
        <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/cover-no-image.png')}}" class="img-fluid rounded mx-auto d-block mt-4" alt="Cover Image" id="project_showcase" style="object-fit: cover; max-height: 500px; width: 100%;"/>
      
        <div class="position-absolute top-0 end-0 bg-white text-primary p-3 h-100" style="max-width: 30%; min-width: 20%; border-top-right-radius: 5px; border-bottom-right-radius: 5px; opacity: 0.9;">
          <!-- Project Title -->
          <span>Project title</span>
          <h2>{{$project->name}}</h1>
          
          <!-- Author -->
          <div class="mt-4" >
            <span>Author</span>
            <div class="media">
              <img src="{{$project->user->avatar ? asset('storage/' . $project->user->avatar) : asset('images/no-image.png')}}" class="d-flex align-self-center mr-3 rounded-circle" alt="Author Photo" style="width: 50px; height: 50px; opacity: 1;">
              <div class="media-body">
                <h6 class="mt-0">{{$project->user->nikname}}</h6>
              </div>
            </div>
          </div>

        </div>
      </div>

    <!-- Categories -->
    <div class="mt-4">
      <h5>Project demands</h5>
      @foreach ($project->categories as $category)
        <span class="badge rounded-pill badge-info px-4 py-2 h2">{{$category->area_name}}</span> 
      @endforeach          
    </div>

    <!-- Project Explanations-->
    <p class="mt-4" >{{$project->description}}</p>

     <!--Collaborators of the project-->
    <table class="table align-middle my-3 bg-white">
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
        @foreach ($project->members as $collaborator)
          <tr>
            <td>
              <div class="d-flex align-items-center">
                <img
                    src="{{$collaborator->user->avatar ? asset('storage/' . $collaborator->user->avatar) : asset('images/no-image.png')}}"
                    alt=""
                    style="width: 45px; height: 45px"
                    class="rounded-circle"
                    />
                <div class="ms-3">
                  <p class="fw-bold mb-1">{{$collaborator->user->nikname}}</p>
                  <p class="text-muted mb-0">{{$collaborator->user->email}}</p>
                </div>
              </div>
            </td>
            <td>
              <span class="badge rounded-pill badge-info px-4 py-2 h2 mx-3">{{$collaborator->status}}</span> 
              <span class="fw-normal mb-1">{{$collaborator->member_type}}</span>
            </td>
            <td>
              @auth
              <form action="{{route('collaborator.delete', $collaborator) }}" method="POST">
                  @csrf

                      
                  @if (auth()->check() && $project->creator_id === auth()->user()->id)
                  <button type="submit" class="btn btn-link btn-sm btn-rounded">
                    Delete
                  </button>
                  @endif
              </form>
              @endauth
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>
   
</x-layoutIndex>