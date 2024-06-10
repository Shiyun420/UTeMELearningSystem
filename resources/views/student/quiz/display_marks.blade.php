<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
      <link rel="stylesheet" href="{{url('css/student/quiz_displaymarks.css')}}">
      <title>Document</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid custom-navbar">
            <a class="navbar-brand" href="#">
            <img src="/images/webdesign/utemelearninglogo.png" alt="Your Logo" style="width: 200px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
               <div class="navbar-nav">
                  <a class="nav-link{{ Request::route()->named('search_course') ? ' active' : '' }}" aria-current="page" href="{{ route('student.search_course') }}"><i class="fas fa-search"></i> Search Course</a>
                  <a class="nav-link{{ Request::route()->named('list_course') ? ' active' : '' }}" href="{{ route('student.list_course') }}">My Course</a>
               </div>
            </div>
            <div class="dropdown ms-auto">
               <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
               {{ Auth::user()->name }}
               </a>
               <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
                  <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <button class="dropdown-item" type="submit">Log Out</button>
                  </form>
               </ul>
            </div>
         </div>
         </div>
      </nav>
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse p-2">
         <div class="position-sticky">
          
         </div>
      </nav>
      <main>
        <h3 class="fw-bold text-center mt-4">{{$quizName}}</h3>
        <div class="d-flex justify-content-center">
            <img src="/images/webdesign/correct_logo.png" style="max-width:200px;" alt="">
        </div>
        <div class="d-flex justify-content-center mt-2">
            <p class="fw-bold me-2">STATUS: </p> <p>Completed</p>
        </div>
        <div class="d-flex justify-content-center">
            <p class="fw-bold me-2">MARKS: </p><p>Marks: {{ number_format($marks, 2) }}</p>
        </div>
        
        
        <div class="mx-auto navigation-buttons">
                <a href="{{ route('student.preview_quiz', ['id' => $quizID]) }}"><button>Preview</button></a>
               <button id="action-btn">Back</button>
            </div>
      </main>
   </body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>