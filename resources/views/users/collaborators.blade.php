<x-layoutIndex>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-2 mt-5 mb-5">


              @foreach ($users as $user)                
            
              <div class="card px-0">
                <div class="row g-0 m-0">
                  <div class="col-md-4" style="position: relative;">
                    <img
                      src="{{$user->avatar ? asset('storage/' . $user->avatar) : asset('images/no-image.png')}}"
                      alt="Trendy Pants and Shoes"
                      class="img-fluid rounded-start"                      
                      style="position: absolute; top: 0;left: 0;width: 100%; height: 100%; object-fit: cover;"
                    />
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">{{$user->nikname}}</h5>
                      <p class="card-text">           

                        @foreach ($user->categories as $category)
                          <span class="badge rounded-pill badge-info">{{$category->area_name}}</span> 
                        @endforeach

                        <span class="d-block"><i class="fas fa-location-dot"></i> {{$user->country}}, {{$user->locality}}</span>                 
                      </p>
                      <p class="card-text">
                        <a href="/collaborators/{{$user->id}}"  class="btn btn-secondary">See Detail</a>
                        <a href="" class="btn btn-warning"><i class="fas fa-people-arrows"></i></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            
           
              @endforeach

      </div>
  </div>
</x-layoutIndex>

    



