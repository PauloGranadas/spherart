<x-layoutIndex>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-5 mt-5">Login

        </h2>
        <p class="mb-4">Log into your account to collaborate and create projects</p>
    </header>
    <form method="POST" action="/users/authenticate">
        @csrf
    <div class="container-sm mb-5 bg-image card shadow-1-strong col-md-2">
      <div class="input-group mb-3 mt-3">
        <span class="input-group-text" id="basic-addon1">Email</span>
        <input
          type="email"
          class="form-control"
          placeholder="email"
          aria-label="Email"
          name="email"
          aria-describedby="basic-addon1"
          value="{{old('email')}}"
        />
      </div>
      @error('email') 
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Password</span>
        <input
          type="password"
          class="form-control"
          placeholder="password"
          aria-label="Password"
          aria-describedby="basic-addon1"
          name="password"
          value="{{old('password')}}"
        />
      </div>
      @error('password') 
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
      
      
      
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary mb-3">Log in</button>

      <div class="mt-8">
        <p>
            Don't have an account?
            <a href="/register" class="text-laravel"
                >Register</a
            >
        </p>
    </div>
    </form>

</x-layoutIndex>