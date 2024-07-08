<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <title>Your Page Title</title>
    @yield('styles') <!-- Include your stylesheets here -->
    <style>
        #sidebar {
            background: linear-gradient(to right, #4e54c8, #8f94fb);
            color: #fff;
            padding: 20px;
        }

        .w3-sidebar {
            width: 100%;
        }

        .w3-bar-item {
            padding: 8px;
            text-align: center;
        }

        .w3-button {
            width: 100%;
            padding: 10px;
            text-align: left;
            border: none;
            background: none;
            cursor: pointer;
            color: #fff;
        }
    </style>
</head>
<body>

    <div id="app">

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-10 col-lg-2 d-md-block bg-light sidebar">
                    <!-- You can customize your sidebar content here -->
                    <div class="sidebar-sticky">
                        <!-- Sidebar content goes here -->
                        <ul class="nav flex-column">
                            <!-- Example sidebar item -->
                            <li class="nav-item">
                                <div class="w3-sidebar w3-bar-block w3-card" style="width:25%;right:30;">
                                    <h3 class="w3-bar-item">Welcome</h3>
                                    <div class="w3-bar-item">Dashboard</div>

                                    <button onclick="window.location.href='{{ route('employees.index') }}';"
                                        class="w3-bar-item w3-button">Employee</button>
                                    <button onclick="window.location.href='{{ route('booking') }}';"
                                        class="w3-bar-item w3-button">Booking</button>
                                </div>
                    </div>
                    </li>
                    <!-- Add more sidebar items as needed -->
                    </ul>
            </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-md-4">
                @yield('content') <!-- Include your main content here -->
            </main>
        </div>
    </div>

    </div>

    @yield('scripts') <!-- Include your scripts here -->

    @section('content')
    <h2>Employee List</h2>
    <!-- Display the list of employees here -->
@endsection

</body>

</html>
