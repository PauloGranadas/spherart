<x-layoutIndex>
    <div style="width: 700px; padding-top: 4%; padding-bottom: 15%; margin: 0 auto;">
    <form method="POST" action="{{route('sendContactForm')}}">
        @csrf
        
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success') }}
            </div>
        @endif

    <!-- Name input -->
    <div class="form-outline mb-4">
      <input type="text" id="form4Example1" class="form-control" />
      <label class="form-label" for="form4Example1">Name</label>
    </div>
  
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form4Example2" class="form-control" />
      <label class="form-label" for="form4Example2">Email address</label>
    </div>
  
    <!-- Message input -->
    <div class="form-outline mb-4">
      <textarea class="form-control" id="form4Example3" rows="4"></textarea>
      <label class="form-label" for="form4Example3">Message</label>
    </div>
  
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
  </form></div>
</x-layoutIndex>