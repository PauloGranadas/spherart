<x-layoutIndex>

  <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mb-5">


      @foreach ($users as $user)

      <div class="card pl-0">
        <div class="row g-0 m-0">
          <div class="col-md-4">
            <img src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp" alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$user->name}}</h5>
              <p class="card-text">
                This is a wider card with supporting text below as a natural lead-in to
              </p>
              <p class="card-text">
                <a href="/collaborators/{{$user->id}}" class="btn btn-secondary">See Detail</a>
              </p>
            </div>
          </div>
        </div>
      </div>


      @endforeach

    </div>
  </div>
</x-layoutIndex>