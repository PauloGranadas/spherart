<x-layoutIndex>   

    <div class="container my-5">
        <div class="row">        
            <div class="col-4 text-center">
                <img
                src="{{$user->avatar ? asset('storage/' . $user->avatar) : asset('images/no-image.png')}}"
                    class="img-thumbnail hover-shadow"
                    alt="Los Angeles Skyscrapers"
                    />

                    <a href="" class="btn btn-secondary btn-rounded my-2">Collaborate with {{$user->nikname}}</a>
            </div>
            <div class="col-7">        
              

                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0">
                    <div class="p-3 badge-primary rounded-4">
                        <i class="fas fa-user fa-lg text-primary fa-fw"></i>                        
                    </div>
                    </div>
                    <div class="flex-grow-1 ms-4">
                    <p class="fs-2">{{$user->nikname}}</p>
                    <p class="text-muted mb-1">

                        <span class="d-block">
                        @foreach ($user->categories as $category)
                          <span class="badge rounded-pill badge-info px-4 py-2 h2">{{$category->area_name}}</span> 
                        @endforeach
                        
                        </span>

                        {{$user->bio}}
                    </p>
                    <span class="d-block my-3"><i class="fas fa-location-dot"></i> {{$user->country}}, {{$user->locality}}</span>
                    </div>
                </div>


                <!--Grid row-->

                <p class="fs-5 mt-3">Participation in projects</p>
              
            <div class="row">     

           

            <div class="col-lg-4 mb-4 mb-lg-0">
                <!-- Image with violet mask -->
                <div class="bg-image rounded-6">
                <img
                    src="https://mdbootstrap.com/img/new/ecommerce/vertical/010.jpg"
                    class="w-100"
                    alt="Alternative text"
                />
                <!-- Mask -->
                <div
                    class="mask"
                    style="
                    background: linear-gradient(
                        to bottom,
                        hsla(0, 0%, 0%, 0),
                        hsla(263, 80%, 20%, 0.5)
                    );
                    "
                >
                    <div
                    class="
                        bottom-0
                        d-flex
                        align-items-end
                        h-100
                        text-center
                        justify-content-center
                    "
                    >
                    <div>
                        <h4 class="fw-bold text-white mb-4">Project Music Art</h4>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <!--Grid row-->


            </div>
        </div>

    </div>    
</x-layoutIndex>