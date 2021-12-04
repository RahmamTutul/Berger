<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berger</title>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"href="{{ asset('assets/frontend/css/fronawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}" />

  </head>
  <body>
    <header class="custom-navbar">
      <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="logo">
          <a class="navbar-brand" href="#"
            ><img
              src="{{ asset('assets/frontend/uploads/cropped-bergerLogo.png') }}"
              alt=""
              srcset=""
          /></a>
        </div>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Home <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item dropdown active">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Service
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Service 1</a>
                <a class="dropdown-item" href="#">Service 2</a>
                <a class="dropdown-item" href="#">Service 2</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item dropdown active">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Corporate Speech
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">MD Speech</a>
                <a class="dropdown-item" href="#">Chairman Speech</a>
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0 mr-4">
            <input
              class="form-control mr-sm-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
          </form>
        </div>
      </nav>
    </header>
    <main>
      <!-- Carousel star  -->
      <section id="carousel">
        <div
          id="carouselExampleIndicators"
          class="carousel slide"
          data-ride="carousel"
        >
          <ol class="carousel-indicators">
            <li
              data-target="#carouselExampleIndicators"
              data-slide-to="0"
              class="active"
            ></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                class="d-block w-100"
                src="{{ asset('assets/frontend/uploads/Rin-Rex-Web-Banner-01.jpg') }}"
                alt="First slide"
              />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="{{ asset('assets/frontend/uploads/LSE-JA-Banner.jpg') }}"
                alt="Second slide"
              />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="{{ asset('assets/frontend/uploads/Artista_Poster-02.jpg') }}"
                alt="Third slide"
              />
            </div>
            <div class="carousel-item">
              <img
                class="d-block w-100"
                src="{{ asset('assets/frontend/uploads/FRC-Home-Page-Banner-scaled.jpg') }}"
                alt="Fourth slide"
              />
            </div>
          </div>
          <a
            class="carousel-control-prev"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a
            class="carousel-control-next"
            href="#carouselExampleIndicators"
            role="button"
            data-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </section>
      <!-- Carousel end  -->
      
      <section id="about">
        <h1>Paint your imagination</h1>
        <p>Choose from a wide variety of products made to fit all your needs</p>
      </section>
      
      <section class="no-touch">
        <div class="wrap">
          @foreach ($paints as $paint)
          <div class="box">
            <div class="boxInner">
              <img
                src="{{ asset("storage/images/paint/".$paint->image) }}"
              />
              <div class="titleBox"><a href="#">{{ $paint->title }}</a></div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
      <section id="submit">
        <div class="hero">
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-md-7 m-auto">
                <img src="{{ asset('assets/frontend/uploads/berger-express-title-1.png') }}" alt="">
              </div>
              <div class="col-md-7 m-auto">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4" class="form-label">Full Name</label>
                      <input type="email" class="form-control" id="inputEmail4" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4" class="form-label">Phone Number</label>
                      <input type="phone" class="form-control" id="inputPassword4" placeholder="Phone number">
                    </div>
                    
                  <div class="form-group col-md-6">
                    <label for="inputAddress" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="inputAddress" placeholder="example@gmail.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputAddress2" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Address">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="inputAddress2" class="form-label">Your Massage</label>
                    <textarea type="text" class="form-control" id="inputAddress2" placeholder="Address"></textarea>
                  </div>
                  <button type="submit" class="btn btn-outline-warning form-label">Submit your request</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </section>
      <section>
      <section id="about">
        <div class="col-md-8 m-auto">
        <h1>Berger Home Diaries</h1>
        <p>We believe that homes are a reflection of the people who live inside, where everything looks and works the way you want it to. That’s why we’ve gathered tons of different home ideas, from home decoration ideas to organizing tips, to help you build your ideal home.</p>
        </div>
      </section>
      <section id="card">
        <div>
          <div class="row mb-5">
            @foreach ($diaries as $diary)
            <div class="card-item mb-4" style="margin:auto ; width:30%">
              <div class="card">
                <img class="card-img-top" src="{{ asset('storage/images/diary/'.$diary->image) }}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><a href="#">{{ $diary->title }}</a></h5>
                  <p class="card-text">{{ $diary->details }}</p>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <div class="show-more">
        <div class="col-md-12 m-auto">
          {{ $diaries->links('vendor.pagination.custom')}}
        </div>
        </div>
      </section>
    </main>
    <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <a href="#" class="footer-site-logo"><img src="{{ asset('assets/frontend/uploads/cropped-bergerLogo.png') }}" alt="" srcset=""></a>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit officiis corporis optio natus. </p>
              <ul class="list-unstyled social nav-right">
                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest-square" aria-hidden="true"></i></a></li>
              </ul>
            </div>
            <div class="col-md-2 ml-auto">
              <h3>Shop</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Sell online</a></li>
                <li><a href="#">Features</a></li>
                <li><a href="#">Examples</a></li>
                <li><a href="#">Website editors</a></li>
                <li><a href="#">Online retail</a></li>
              </ul>
            </div>

            <div class="col-md-2 ml-auto">
              <h3>Press</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Events</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Awards</a></li>
                <li><a href="#">Testimonials</a></li>
                <li><a href="#">Online retail</a></li>
              </ul>
            </div>
            <div class="col-md-2 ml-auto">
              <h3>About</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Contact</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Career</a></li>
                <li><a href="#">Contacts</a></li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </footer>
    <script src="{{ asset('assets/frontend/js/jquery.min.css') }}"></script>
    <script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/fontawesome.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/script.js') }}"></script>
  </body>
</html>
