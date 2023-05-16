<x-navbar>

</x-navbar>

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

    <x-bodylayout>
        <div class="container">
            <header>
                <h2 class="text-2xl font-bold uppercase mb-1">Register

                </h2>
                <p class="mb-4">Create an account to participate and create projects</p>
            </header>

            </header>
        </div>
        <div class="container">
            <form method="POST" action="/users">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="form3Example1" class="form-control" name="firstname" value="{{old('firstname')}}" />
                            <label class="form-label" for="form3Example1">First name</label>
                            @error('firstname')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="form3Example2" class="form-control" name="lastname" value="{{old('lastname')}}" />/>
                            <label class="form-label" for="form3Example2">Last name</label>
                            @error('lastname')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form3Example3" class="form-control" name="nickname" value="{{old('nickname')}}" />/> />
                        <label class="form-label" for="form3Example3">Nickname</label>
                        @error('nickname')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline">
                        <input type="text" id="form3Example4" class="form-control" name="country" value="{{old('country')}}" />/>/>
                        <label class="form-label" for="form3Example4">Country</label>
                        @error('country')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>


                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form3Example5" class="form-control" name="email" value="{{old('email')}}" />
                    <label class="form-label" for="form3Example5">Email address</label>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form3Example6" class="form-control" name="password" value="{{old('password')}}" />
                    <label class="form-label" for="form3Example6">Password</label>
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-outline mb-4">
                    <input type="password" id="form3Example7" class="form-control" name="password" value="{{old('confirmpassword')}}" />
                    <label class="form-label" for="form3Example7">Confirm Password</label>
                    @error('confirmpassword')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <!-- Checkbox -->
                <p>Choose your artist category:</p>
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" />
                    <label class="form-check-label" for="form2Example33">
                        Subscribe to our newsletter
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>


            </form>
        </div>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"></script>
</x-bodylayout>