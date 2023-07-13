<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Herdlyfe Marketplace</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/viewproduct.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0">Herdlyfe</h1>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="product.html" class="nav-item nav-link">Marketplace</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="gallery.html" class="dropdown-item">Gallery</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <!--a href="team.html" class="dropdown-item">Our Team</a-->
                        <a href="testimonial.html" class="dropdown-item">Reviews</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <div class="border-start ps-4 d-none d-lg-block">
                <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="container">
        <div class="product-container">
            <div class="prod-img">
                <img src="img/cow8.jpg" alt="Cow 8">
            </div>
            @php
                $cattle = $market->cattle;
            @endphp
            <div class="prod-details">
                <p><span>Name:</span> {{ $cattle->name }}</p>
                <p><span>Age:</span> {{ $cattle->age }}</p>
                <p><span>Gender:</span> {{ $cattle->gender }}</p>
                <p><span>Breed:</span> {{ $age }}</p>
                <p><span>Milk Produced:</span> {{ $amount }}</p>
            </div>
        </div>

        <!-- milk records start -->
        <div class="prod-table">
            <h5>Milk Records</h5>
            <div class="prod-table-actions">
                <div class="input-icons">
                    <i class="fa fa-search icon"></i>
                    <input type="text" class="search-field">
                </div>
                <div class="action-buttons">
                    <button onclick="myActionFunction()" class="act-btn dropActionbtn"><i class="fa fa-angle-down"></i>
                        Actions</button>
                    <div id="myActionDropdown" class="btn-content action-content">
                        <a href="#home">action 1</a>
                        <a href="#about">action 2</a>
                        <a href="#contact">action 3</a>
                    </div>
                </div>
                <div class="filter-button">
                    <button onclick="myFilterFunction()" class="act-btn dropFilterbtn"><i class="fa fa-filter"></i> Filter <i
                            class="fa fa-angle-down"></i></button>
                    <div id="myFilterDropdown" class="btn-content filter-content">
                        <a href="#home">filter 1</a>
                        <a href="#about">filter 2</a>
                        <a href="#contact">filter 3</a>
                    </div>
                </div>
            </div>

            <table class="responstable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>cattle</th>
                        <th>date</th>
                        <th>shift</th>
                        <th>quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @if($market->cattle->gender == 'F' && $market->cattle->milk->count() > 0)
                    @php
                        $milk = $market->cattle->milk;
                    @endphp
                    <tr>
                        <td>{{ $milk->id }}</td>
                        <td>{{ $milk->cattle->cattle_name }}</td>
                        <td>{{ $milk->date }}</td>
                        <td>{{ $milk->shift }}</td>
                        <td>{{ $milk->quantity }}</td>

                    </tr>
                    @else
                    <td colspan="5" class="no-records">No milk records yet</td>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- milk records end -->


        <!-- health records start -->
        <div class="prod-table">
            <h5>Health Records</h5>
            <div class="prod-table-actions">
                <div class="input-icons">
                    <i class="fa fa-search icon"></i>
                    <input type="text" class="search-field">
                </div>
                <div class="action-buttons">
                    <button onclick="myActionFunction2()" class="act-btn dropActionbtn2"><i class="fa fa-angle-down"></i>
                        Actions</button>
                    <div id="myActionDropdown2" class="btn-content action-content2">
                        <a href="#home">action 1</a>
                        <a href="#about">action 2</a>
                        <a href="#contact">action 3</a>
                    </div>
                </div>
                <div class="filter-button">
                    <button onclick="myFilterFunction2()" class="act-btn dropFilterbtn2"><i class="fa fa-filter"></i> Filter <i
                            class="fa fa-angle-down"></i></button>
                    <div id="myFilterDropdown2" class="btn-content filter-content2">
                        <a href="#home">filter 1</a>
                        <a href="#about">filter 2</a>
                        <a href="#contact">filter 3</a>
                    </div>
                </div>
            </div>

            <table class="responstable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>cattle name</th>
                        <th>date</th>
                        <th>disease</th>
                        <th>treatment</th>
                        <th>type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7</td>
                        <td>sequi</td>
                        <td>1988-12-08 00:00:00</td>
                        <td>similique</td>
                        <td>quod</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- health records end -->



        <!-- Breeding records table start -->
        <div class="prod-table">
            <h5>Breeding Records</h5>
            <div class="prod-table-actions">
                <div class="input-icons">
                    <i class="fa fa-search icon"></i>
                    <input type="text" class="search-field">
                </div>
                <div class="action-buttons">
                    <button onclick="myActionFunction3()" class="act-btn dropActionbtn3"><i class="fa fa-angle-down"></i>
                        Actions</button>
                    <div id="myActionDropdown3" class="btn-content action-content3">
                        <a href="#home">action 1</a>
                        <a href="#about">action 2</a>
                        <a href="#contact">action 3</a>
                    </div>
                </div>
                <div class="filter-button">
                    <button onclick="myFilterFunction3()" class="act-btn dropFilterbtn3"><i class="fa fa-filter"></i> Filter <i
                            class="fa fa-angle-down"></i></button>
                    <div id="myFilterDropdown3" class="btn-content filter-content3">
                        <a href="#home">filter 1</a>
                        <a href="#about">filter 2</a>
                        <a href="#contact">filter 3</a>
                    </div>
                </div>
            </div>

            <table class="responstable">
                <thead>
                    <tr>
                        <th></th>
                        <th>id</th>
                        <th>cow</th>
                        <th>sire</th>
                        <th>breeding date</th>
                        <th>expected date of delivery</th>
                        <th>actual date of delivery</th>
                    </tr>
                </thead>
                <tbody>
                    <td colspan="7" class="no-records">                    No breeding records yet
                    </td>
                </tbody>
            </table>
        </div>

        <!-- breeding recors table end -->
    </div>


    <script>
        // action btn1
        function myActionFunction() {
            document.getElementById("myActionDropdown").classList.toggle("show-action");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropActionbtn')) {
                var dropdowns = document.getElementsByClassName("action-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show-action')) {
                        openDropdown.classList.remove('show-action');
                    }
                }
            }
        }

        // filter btn 1
        function myFilterFunction() {
            document.getElementById("myFilterDropdown").classList.toggle("show-filter");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropFilterbtn')) {
                var dropdowns = document.getElementsByClassName("filter-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show-filter')) {
                        openDropdown.classList.remove('show-filter');
                    }
                }
            }
        }

        // btns 1 end

        // btns 2
        function myActionFunction2() {
            document.getElementById("myActionDropdown2").classList.toggle("show-action");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropActionbtn2')) {
                var dropdowns = document.getElementsByClassName("action-content2");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show-action')) {
                        openDropdown.classList.remove('show-action');
                    }
                }
            }
        }

        function myFilterFunction2() {
            document.getElementById("myFilterDropdown2").classList.toggle("show-filter");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropFilterbtn2')) {
                var dropdowns = document.getElementsByClassName("filter-content2");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show-filter')) {
                        openDropdown.classList.remove('show-filter');
                    }
                }
            }
        }

        // btns 2 end

        // btns 3
        function myActionFunction3() {
            document.getElementById("myActionDropdown3").classList.toggle("show-action");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropActionbtn3')) {
                var dropdowns = document.getElementsByClassName("action-content3");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show-action')) {
                        openDropdown.classList.remove('show-action');
                    }
                }
            }
        }

        function myFilterFunction3() {
            document.getElementById("myFilterDropdown3").classList.toggle("show-filter");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.dropFilterbtn3')) {
                var dropdowns = document.getElementsByClassName("filter-content3");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show-filter')) {
                        openDropdown.classList.remove('show-filter');
                    }
                }
            }
        }
        //end
    </script>
</body>

</html>
<!-- 
<h1>Responstable <span>2.0</span> by <span>jordyvanraaij</span></h1>

    <table class="responstable">
      
      <tr>
        <th>Main driver</th>
        <th data-th="Driver details"><span>First name</span></th>
        <th>Surname</th>
        <th>Date of birth</th>
        <th>Relationship</th>
      </tr>
      
      <tr>
        <td><input type="radio"/></td>
        <td>Steve</td>
        <td>Foo</td>
        <td>01/01/1978</td>
        <td>Policyholder</td>
      </tr>
      
      <tr>
        <td><input type="radio"/></td>
        <td>Steffie</td>
        <td>Foo</td>
        <td>01/01/1978</td>
        <td>Spouse</td>
      </tr>
      
      <tr>
        <td><input type="radio"/></td>
        <td>Stan</td>
        <td>Foo</td>
        <td>01/01/1994</td>
        <td>Son</td>
      </tr>
      
      <tr>
        <td><input type="radio"/></td>
        <td>Stella</td>
        <td>Foo</td>
        <td>01/01/1992</td>
        <td>Daughter</td>
      </tr>
      
    </table> -->