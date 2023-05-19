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
    </table></div>
    
    </x-layoutIndex>