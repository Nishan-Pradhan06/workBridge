 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

 <header class="bg-white header">
     <link rel="stylesheet" href="{{ asset('css/components/navbar.css') }}">
     <nav class="navbar navbar-expand-lg navbar-light">
         <a class="navbar-brand" href="/">
             <img src="{{asset('logo.png')}}" alt="logo" class="logo">
         </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Jobs
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="/job-post">Post a Job</a>
                         <a class="dropdown-item" href="/client/dashboard">Your Dashboard</a>
                         <a class="dropdown-item" href="/all-jobs">All Jobs Post</a>
                         <a class="dropdown-item" href="/contracts">All Contracts</a>
                     </div>
                 </li>
             </ul>
             <div class="nab-btn">
                 <section>profile</section>
             </div>
         </div>
     </nav>

     <nav class="navbar navbar-expand-lg navbar-light d-lg-none">
         <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                 <li class="nav-item dropdown">
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                         <a class="dropdown-item" href="/job-post">Post a Job</a>
                         <a class="dropdown-item" href="/client/dashboard">Post a Job</a>
                         <a class="dropdown-item" href="/all-jobs">All Jobs Post</a>
                         <a class="dropdown-item" href="/contracts">All Contracts</a>
                     </div>
                 </li>
             </ul>
         </div>
     </nav>
 </header>
 <div class="dropdown-divider"></div>
 <a href="/job-post" class="btn btn-primary">Post a Job</a>





 <!-- js -->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>