<x-layoutIndex>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mb-5">


      @foreach ($users as $user)                
            
      <div class="card pl-0">
        <div class="row g-0 m-0">
          <div class="col-md-4">
            
            <img
              src="{{$user->avatar ? asset('storage/app/public/' . $user->avatar) : asset('images/no-image.png')}}"
              alt="Avatar"
              class="img-fluid rounded-start"
              width="50px"
            />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$user->nikname}}</h5>
              <p class="card-text">
                {{$user->bio}}                       
              </p>
              <p class="card-text">
                <a href="/collaborators/{{$user->id}}"  class="btn btn-secondary">See Detail</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    
   
@endforeach

      </div>
  </div>
</x-layoutIndex>

    



