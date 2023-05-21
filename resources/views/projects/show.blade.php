<x-layoutIndex>
    
    <div class="container">

      <div class="text-right">
        <a href="/projects/{{$project->id}}/add" class="btn btn-warning btn-rounded my-2 fs-6"><i class="fas fa-people-arrows"></i> add Collaborator</a>
      </div>

      <div class="position-relative">
        <!--Images to showcase the project-->
        <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/no-image.png')}}" class="img-fluid rounded mx-auto d-block mt-4" alt="Cover Image" id="project_showcase" style="object-fit: cover; max-height: 500px; width: 100%;"/>
      
        <div class="position-absolute top-0 end-0 bg-primary text-white p-3 h-100" style="max-width: 30%; min-width: 20%; border-top-right-radius: 5px; border-bottom-right-radius: 5px; opacity: 0.9;">
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

     <!-- Project Explanations-->
    <p class="mt-4" >{{$project->description}}</p>

     <!--Collaborators of the project-->
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
              <p class="fw-normal mb-1">{{$collaborator->member_type}}</p>
            </td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">
                Delete
              </button>
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>



  <div class="row">
  <div class="col-md-8 offset-md-2">
       
        
        <!-- Categories -->
        <div class="mt-4">
          <h5>Categories:</h5>
          <span class="badge badge-primary">Category 1</span>
          <span class="badge badge-primary">Category 2</span>
        </div>
       
  </div>


    
    </x-layoutIndex>