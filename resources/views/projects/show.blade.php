<x-layoutIndex>



    <nav>
         </nav>
<body>
   
  

<div>
<div class="row">
<center>
         
         <img class="rounded-4 shadow-4" src="https://mdbootstrap.com/img/Photos/Avatars/man2.jpg" alt="Avatar" style="width: 100px; height: 100px">
       
         </center>  
<div class="col-4">
    <div class="list-group list-group-light" id="list-tab" role="tablist">
  
 
      <a class="list-group-item list-group-item-action active px-3 border-0" id="list-home-list"
        data-mdb-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Home</a>
      <a class="list-group-item list-group-item-action px-3 border-0" id="list-profile-list"
        data-mdb-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">Profile</a>
      <a class="list-group-item list-group-item-action px-3 border-0" id="list-messages-list"
        data-mdb-toggle="list" href="#list-messages" role="tab" aria-controls="list-messages">Messages</a>
      <a class="list-group-item list-group-item-action px-3 border-0" id="list-settings-list"
        data-mdb-toggle="list" href="#list-settings" role="tab" aria-controls="list-settings">Settings</a>
    </div>
  </div>
  <div class="col-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel"
        aria-labelledby="list-home-list">
        Some placeholder content in a paragraph relating to "Home". And some more content, used here just to
        pad out and fill this tab panel. In production, you would obviously have more real content here. And
        not just text. It could be anything, really. Text, images, forms.
      </div>
      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
      Expert in painting 
      </div>
      <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
        Some placeholder content in a paragraph relating to "Messages". And some more content, used here
        just to pad out and fill this tab panel. In production, you would obviously have more real content
        here. And not just text. It could be anything, really. Text, images, forms.
      </div>
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
        Some placeholder content in a paragraph relating to "Settings". And some more content, used here
        just to pad out and fill this tab panel. In production, you would obviously have more real content
        here. And not just text. It could be anything, really. Text, images, forms.
      </div>
    </div>
  </div>
</div>
</div>
<div>
  <center><h1>TEAMMATES</h1></center>
</div>

<ul class="list-group list-group-light" style= style="width: 600px; height: 600px">
  <li class="list-group-item d-flex justify-content-lg-evenly align-items-center">
    <div class="d-flex align-items-center">
      <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px"
        class="rounded-circle" />
      <div class="ms-3">
        <p class="fw-bold mb-1">John Doe</p>
        <p class="text-muted mb-0">john.doe@gmail.com</p>
      </div>
           <!-- Default switch -->
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" />
  <label class="toggleButton" for="flexSwitchCheckDefault">Active/Unactive</label>
</div>

    </div>
   
  </li>
  <li class="list-group-item d-flex justify-content-lg-evenly  align-items-center">
    <div class="d-flex align-items-center">
      <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt=""
        style="width: 45px; height: 45px" />
      <div class="ms-3">
        <p class="fw-bold mb-1">Alex Ray</p>
        <p class="text-muted mb-0">alex.ray@gmail.com</p>
      </div>
           <!-- Default switch -->
           <button class="toggleButton">Active/ Unactive</button>



    </div>
   
  </li>
  <li class="list-group-item d-flex justify-content-lg-evenly  align-items-center">
    <div class="d-flex align-items-center">
      <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt=""
        style="width: 45px; height: 45px" />
      <div class="ms-3">
        <p class="fw-bold mb-1">Kate Hunington</p>
        <p class="text-muted mb-0">kate.hunington@gmail.com</p>
      </div>
     <!-- Default switch -->
     <button class="toggleButton">Active/ Unactive</button>




    </div>

   
  </li>
</ul>
<script>
  const toggleButtons = document.querySelectorAll('.toggleButton');

  toggleButtons.forEach(function(button) {
    let isActive = false;

    button.addEventListener('click', function() {
      isActive = !isActive;

      if (isActive) {
        button.textContent = 'Disactive';
        // Additional actions for active state
      } else {
        button.textContent = 'Active';
        // Additional actions for disactive state
      }

      // Make an AJAX request to update the database
      const buttonId = button.getAttribute('data-id');
      const url = '/update-status/' + buttonId; // Replace with your actual route URL
      const data = {
        isActive: isActive
      };

      // Send the AJAX request
      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
      })
      .then(response => {
        if (response.ok) {
          console.log('Status updated successfully');
        } else {
          console.log('Failed to update status');
        }
      })
      .catch(error => {
        console.log('Error:', error);
      });
    });
  });
</script>



<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp"
        class="card-img-top"
        alt="hollywood sign"
      />
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
      <img
        src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp"
        class="card-img-top"
        alt="hollywood sign"
      />
        <h5 class="card-title">Special title treatment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>


</body>

<footer class="bg-light text-center text-white">

    <!-- Grid container -->
  
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white" href="https://mdbootstrap.com/">Spherart.com</a>
    </div>
    <!-- Copyright -->
  </footer>

<script>
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
</script>


</x-layoutIndex>