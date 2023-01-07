<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SEEVEE') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.16.0/css/all.css" integrity="sha256-KpDZ8W1ZiBvKjBtXgPO9QzW2Eoayvw3jKvg+n1Q0KZO4=" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('vendor/fortawesome/font-awesome/css/all.css') }}">


  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<style>
  .hero {
    background-size: 100% auto;
    background-repeat: no-repeat;
    object-fit: cover;
    background-blend-mode: normal, multiply;
  }

  .hero .container {
    transform: translateY(-50px);
  }

  .hero-title {
    transition: transform 0.5s, opacity 0.5s;
    transform: translateY(100%);
    opacity: 0;
  }

  .hero-description {
    transition: transform 0.5s, opacity 0.5s;
    transform: translateY(100%);
    opacity: 0;
  }

  .hero-visible {
    transform: translateY(0);
    opacity: 1;
  }


  .navbar {
    transition: transform 0.5s;
    transform: translateY(0);
  }

  .navbar-scrolled {
    transform: translateY(-100%);
  }

  .features {
    padding: 60px 0;
  }

  /* Add this to your stylesheet */

  .feature-card.show {
    opacity: 1;
  }


  .feature-card {
    position: relative;
    left: 0;
    padding: 25px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
  }

  .feature-card:hover {
    transform: translateY(-10px);
  }

  .feature-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .feature-card-title {
    font-size: 22px;
    font-weight: 700;
    color: #333;
    margin: 20px 0;
  }

  .feature-card-description {
    font-size: 16px;
    color: #666;
    line-height: 1.5;
  }

  .bg-color {
    background-color: lightblue;
  }

  .features {
    margin-top: -11.4rem;
    padding: 60px 0;
  }

  .feature-card:hover {
    transform: scale(1.1);
  }

  .feature-card.hidden {
    left: -100%;
  }

  /* Add Experience and Add Skill Buttons */
  #add-experience-button,
  #add-skill-button {
    margin-top: 1rem;
  }

  /* Add Experience Button */
  #add-experience-button {
    border: 1px solid #007bff;
    color: #007bff;
    background-color: transparent;
  }

  #add-experience-button:hover {
    background-color: #007bff;
    color: #fff;
  }

  /* Add Skill Button */
  #add-skill-button {
    border: 1px solid #6c757d;
    color: #6c757d;
    background-color: transparent;
  }

  #add-skill-button:hover {
    background-color: #6c757d;
    color: #fff;
  }
</style>

<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'SEEVEE') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
            <li class="nav-item"> <a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">About</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Create</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Contact</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">FAQ</a></li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="py-4">
      @yield('content')
    </main>
  </div>

  @include('footer')
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
<script>
  window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    if (window.scrollY > 0) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  window.addEventListener('scroll', function() {
    var sections = document.querySelectorAll('section');
    var navbar = document.querySelector('.navbar');
    for (var i = 0; i < sections.length; i++) {
      var section = sections[i];
      if (section.offsetTop <= window.scrollY + navbar.offsetHeight) {
        navbar.style.backgroundColor = section.dataset.color;
      }
    }
  });

  var lastScrollTop = 0;
  window.addEventListener('scroll', function() {
    var navbar = document.querySelector('.navbar');
    var currentScrollTop = window.scrollY;
    if (currentScrollTop > lastScrollTop) {
      navbar.classList.add('navbar-scrolled');
    } else {
      navbar.classList.remove('navbar-scrolled');
    }
    lastScrollTop = currentScrollTop;
  });

  document.addEventListener('DOMContentLoaded', function() {
    var heroTitle = document.querySelector('.hero-title');
    var heroDescription = document.querySelector('.hero-description');
    heroTitle.classList.add('hero-visible');
    heroDescription.classList.add('hero-visible');
  });

  var featureTabs = document.querySelectorAll('.feature-tab');
  var featurePanels = document.querySelectorAll('.feature-panel');

  for (var i = 0; i < featureTabs.length; i++) {
    featureTabs[i].addEventListener('click', function(e) {
      e.preventDefault();
      var tabId = this.getAttribute('href');
      for (var j = 0; j < featureTabs.length; j++) {
        featureTabs[j].classList.remove('active');
        featurePanels[j].classList.remove('active');
      }
      this.classList.add('active');
      document.querySelector(tabId).classList.add('active');
    });
  }

  document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll(".feature-card");

    // Animate the cards in when the page loads
    cards.forEach((card) => {
      setTimeout(() => {
        card.classList.add("show");
      }, 500); // Delay the animation by 500ms
    });
  });

  function addExperience(e) {
    e.preventDefault();

    const experienceContainer = document.getElementById('experience-container');
    const experienceTemplate = document.getElementById('experience-template').innerHTML;

    experienceContainer.insertAdjacentHTML('beforeend', experienceTemplate);
  }

  // Show "saved" instead of the input fields
  lastExperience.querySelectorAll('.form-control-plaintext').forEach(p => {
    p.innerHTML = 'Saved';
  });


  function addEducation(event) {
    event.preventDefault();
    const educationContainer = document.getElementById('education-container');
    const educationTemplate = document.getElementById('education-template').innerHTML;

    // Remove the input fields from the previous education
    const previousEducation = document.querySelector('.education-fields');
    if (previousEducation) {
      previousEducation.innerHTML = '<span class="saved-fields">Saved</span>';
    }

    // Add the new education field to the form
    educationContainer.insertAdjacentHTML('beforeend', educationTemplate);
  }

  // Show "saved" instead of the input fields
  lastEducation.querySelectorAll('.form-control-plaintext').forEach(p => {
    p.innerHTML = 'Saved';
  });

  function addSkill(e) {
    e.preventDefault();
    const skillContainer = document.getElementById('skill-container');
    const skillTemplate = document.getElementById('skill-template').innerHTML;

    // Remove the input fields from the previous skill
    const previousSkill = document.querySelector('.skill-fields');
    if (previousSkill) {
      previousSkill.innerHTML = '<span class="saved-fields">Saved</span>';
    }

    // Add the new skill field to the form
    skillContainer.insertAdjacentHTML('beforeend', skillTemplate);
  }

  // Show "saved" instead of the input fields
  lastSkill.querySelectorAll('.form-control-plaintext').forEach(p => {
    p.innerHTML = 'Saved';
  });
</script>

</html>