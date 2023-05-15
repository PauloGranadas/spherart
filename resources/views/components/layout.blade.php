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
                margin-top: -58.59px;
                height: 75vh !important;
            }
        }

        .navbar .nav-link {
            color: #fff !important;
        }
        </style>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand nav-link" target="_blank" href="https://mdbootstrap.com/docs/standard/">
                    <strong>SPHERART</strong>
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="#intro">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.youtube.com/channel/UC5CF7mLQZhvx8O5GODZAhdA"
                                rel="nofollow" target="_blank">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://mdbootstrap.com/docs/standard/"
                                target="_blank">Collaborators</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav d-flex flex-row">
                        <!-- Icons -->
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="/" rel="nofollow" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="nav-item me-3 me-lg-0">
                            <a class="nav-link" href="/" rel="nofollow" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Navbar -->


        <!-- Background image -->
        <div id="intro" class="bg-image vh-75 shadow-1-strong">
            <video style="min-width: 100%; min-height: 75%;" playsinline autoplay muted loop>
                <source class="h-75" src="videos/backvideo.mp4" type="video/mp4" />
            </video>
            <div class="mask" style="
        background: linear-gradient(
          45deg,
          rgba(29, 236, 197, 0.7),
          rgba(91, 14, 214, 0.7) 100%
        );
      ">
                <div class="container d-flex align-items-center justify-content-center text-center h-100">
                    <div class="text-white">
                        <h1 class="mb-3">Spherart</h1>
                        <h5 class="mb-4">Collaborate True Creativity</h5>
                        <a class="btn btn-outline-light btn-lg m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A"
                            role="button" rel="nofollow" target="_blank">Find Project</a>
                        <a class="btn btn-outline-light btn-lg m-2" href="https://mdbootstrap.com/docs/standard/"
                            target="_blank" role="button">Find Collaborations</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js">
    </script>
</body>

</html>