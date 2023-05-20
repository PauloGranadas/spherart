<x-layoutIndex>
    <style>
        .container{
            width: 60%;
        }
        .container h1 {
            margin-top: 10%;
            margin-bottom:7%;
            text-align:center;
        }
        .container p{
            text-align: center;
            margin-bottom: 7%;
        }
        #project_showcase{
            margin-bottom:7%;
            align-items: center;
        }
    
    </style>
    <div class="container">
        <h1>{{$project->name}}</h1>
     <!-- Project Explanations-->
    <p class="text-lowercase" >{{$project->description}}</p>
    
     <!--Images to showcase the project-->
     <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/no-image.png')}}" class="img-fluid" alt="Wild Landscape" id="project_showcase"/>
    
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
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img
                  src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                  alt=""
                  style="width: 45px; height: 45px"
                  class="rounded-circle"
                  />
              <div class="ms-3">
                <p class="fw-bold mb-1">John Doe</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Multidisciplinary artist</p>
          </td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>



  <div class="row">
  <div class="col-md-8 offset-md-2">
        <!-- Project Title -->
        <h1 class="text-center">Project Title</h1>
        
        <!-- Cover Image -->
        <img src="{{$project->cover ? asset('storage/' . $project->cover) : asset('images/no-image.png')}}" class="img-fluid rounded mx-auto d-block mt-4" alt="Cover Image">
        
        <!-- Project Description -->
        <p class="mt-4">Project description goes here.</p>
        
        <!-- Categories -->
        <div class="mt-4">
          <h5>Categories:</h5>
          <span class="badge badge-primary">Category 1</span>
          <span class="badge badge-primary">Category 2</span>
        </div>
        
        <!-- Author -->
        <div class="mt-4">
          <h5>Author:</h5>
          <div class="media">
            <img src="path/to/author-photo.jpg" class="d-flex align-self-center mr-3 rounded-circle" alt="Author Photo" style="width: 50px;">
            <div class="media-body">
              <h6 class="mt-0">Author Name</h6>
            </div>
          </div>
        </div>
  </div>


    
    </x-layoutIndex>