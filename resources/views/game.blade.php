<!doctype html>
<html lang="pl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      *{
        margin:0;
        padding: 0;
      }
      area{
        cursor: auto;
      }
      map{
        display: inline;
      }
      .modal{
        display: none;
      }
      .navbar{
        justify-content: space-between;
      }
      .navbar-brand.time span{
        font-weight: 700;
      }
      span.error{
        opacity: 0;
      }

      .imgMap > area{
        background: red;
      }
      
      @media (max-width: 400px){
        
        .btn{
          margin: 0 auto;
        }
      }
      li.row{
        margin: 0 auto;
      }
      li.row p{
        float: left;
        margin: 0 30px;
      }
      li.row p span{
        font-weight: bolder;
      }

    </style>

    <title>Znajdź różnicę</title>
  </head>
  <body>

    @if (session('success'))
                        <div class="text-center alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <div class="text-center" role="alert">
           Musi być min 3 znaki - tylko duże/małe litery i cyfry
         </div>
    </div>
    @endif


    <h1 class="card-header text-center">
    Znajdź różnicę
     </h1>


    <div class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
      <a class="navbar-brand">Znaleziono <span id="currentDifferences">0</span> z <span id="allDifferences">5</span></a>
      <a class="navbar-brand time">Czas: <span id="minutes">00</span>:<span id="seconds">00</span></a>
      <!-- <a class="btn btn-success" href="#">START</a> -->
      </div>
    </div>


    <div class="row">
      <div class="divImg">
      <img usemap="#imgAMap" src="images/a.png" alt="" class="img-responsive">

       <map name="imgAMap">
        <area class="number1" shape="circle" coords="60, 60, 20" nohref>
        <area class="number2" shape="circle" coords="255, 90, 20" nohref>
        <area class="number3" shape="circle" coords="490, 210, 20" nohref>
        <area class="number4" shape="circle" coords="630, 260, 40" nohref>
        <area class="number5" shape="circle" coords="300, 370, 40" nohref>
      </map>

      </div>



      <div class="divImg">
      <img usemap="#imgBMap" src="images/b.jpg" alt="" class="img-responsive">

      <map name="imgBMap">
        <area class="number1-1" shape="circle" coords="60, 60, 20" nohref>
        <area class="number2-1" shape="circle" coords="255, 90, 20" nohref>
        <area class="number3-1" shape="circle" coords="490, 210, 20" nohref>
        <area class="number4-1" shape="circle" coords="630, 260, 40" nohref>
        <area class="number5-1" shape="circle" coords="300, 370, 40" nohref>
      </map>

      </div>
    </div>
   


    <div class="card" style="width: 100%;">
  <h2 class="card-header text-center">
    Wyniki
  </h2>

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Pozycja w rankingu</th>
      <th scope="col">Nick</th>
      <th scope="col">Czas</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <input value="{{ $index = 1 }}" type="hidden"> 
  @foreach ($gamers->sortBy('time') as $g) 
    <tr>
      <th scope="row">{{ $index++ }}</th>
      <td>{{ $g->nick }}</td>
      <td>{{ $g->time }}</td>
      <td></td>
    </tr>
  @endforeach
  </tbody>
</table>

</div>



<!-- modals -->
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Gotowe</h5>
        
      </div>
      <div class="modal-body">
        <p class="text-center">Wpisz swój nick.</p>
      <form action="{{ route('savedata') }}" method="POST">
        {{ csrf_field() }}
        <input value="" type="hidden" name="time" id="usersTime">
        <p><input placeholder="min 3 znaki - tylko duże/małe litery i cyfry" name="nick" type="text" id="nick" class="form-control"></p>
        <p><span class="text-center form-control error alert alert-danger"></span></p>
      </div>
      <div class="modal-footer">
        <button disabled id="submit" type="submit" class="btn btn-primary">Zapisz</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- modals -->
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<!-- script for search difference -->
<script src="js/script.js"></script>
<!-- script for search difference -->
  </body>
</html>