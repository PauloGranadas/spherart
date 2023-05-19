<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spherart</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body>

    <header>
        <style>
            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #intro {
                    margin-top: 0px;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }
        </style>


        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light" style=" background-color: rgb(22, 26, 82);">

            <!-- Container wrapper -->
            <div class="container">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="/">
                        <img src="images/spherartLogo_w.png" height="40" alt="Spherart Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="collaborators">Collaborators</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="about">About Us</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center ">

                    

                    <!-- Notifications -->
                    
                   
                    
                    {{-- <div class="dropdown" style="color: rgb(255, 255, 255);">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                                               
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- Avatar -->
                    
                    @auth
                    <div class="dropdown" style="color: rgb(255, 255, 255);">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                           <span class="mb-2 mb-lg-0"> Welcome {{auth()->user()->nikname}}</span><i class="fa-solid fa-gear"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <form method="POST" action="/logout">
                                @csrf
                            <li>
                                <a class="dropdown-item" href="logout">Logout</a>
                            </li>
                        </form>
                        </ul>
                    </div>
                    @else
                    <div class="dropdown" style="color: rgb(255, 255, 255);">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="mb-2 mb-lg-0"> Register/Log In</span> <i class="fa-solid fa-door-open"></i>
                        </a>
<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    <li class="nav-item">
                        <a class="dropdown-item" href="register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item" href="login">Log In</a>
                    </li>
                </ul>
                @endauth
                    </div>
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>

        <!-- Navbar -->

        <!-- Background image -->

        <!-- Background image -->
    </header>
    <!--Main Navigation-->
    <main>
        {{$slot}}

    </main>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js">
    </script>
</body>

</html>