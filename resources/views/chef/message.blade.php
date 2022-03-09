@extends('layouts.dashboard')
@section('navbar')
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Tableau de bord</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<hr class="sidebar-divider">
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Mon compte</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('chats_chef')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Message</span></a>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
        aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Mes Projets</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Mes projets:</h6>
            <a class="collapse-item" href="{{route('create_project')}}">Créer un nouveau projet</a>
            <a class="collapse-item" href="utilities-color.html">En cours</a>
            <a class="collapse-item" href="utilities-border.html">Terminer</a>
            <a class="collapse-item" href="utilities-border.html">Tous les projets</a>
            <a class="collapse-item" href="{{route('chats_chef')}}">Message</a>
        </div>
    </div>
</li>


@endsection

@section('title')

@endsection

@section('content')

<div class="card card-bordered" style="background-color: rgb(163, 206, 206);margin-bottom : 5% ;">
    <div class="container py-5 px-4 ">
        <!-- For demo purpose-->
        <header class="text-center" style="padding-bottom: 2%">
            <h4>Nom entreprise : {{$nom_entreprise}}</h4>
        </header>

        <!-- Chat Box-->
        <div class="col-12 px-0" id="some_div">
            <div class="px-4 py-5 chat-box bg-white" " style=" border-radius: 10px; ">
                <div style=" height:500px;overflow-x:hidden;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                background-color: rgb(121, 208, 208);padding-top: 5%">
                <!-- Sender Message-->
                @foreach ($list as $item)
                @if ($item->entreprise_id==$entreprise_id)
                <div class="media w-50 mb-3"><img src="https://img.icons8.com/color/36/000000/administrator-male.png"
                        alt="user" width="50" class="rounded-circle">
                    <div class="media-body">
                        @if($item->type=="txt")
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">{{$item->message}}</p>
                        </div>
                        @elseif($item->type=="file")
                        <div class="bg-light rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-muted">
                                <a style="color: gray" href={{URL::to('/') .'/'. $item->message}}
                                    download={{$item->message}} >
                                    {{$item->message}}
                                </a>
                            </p>
                        </div>
                        @endif
                        <p class="small text-muted">{{$item->created_at}}</p>
                    </div>
                </div>
                <!-- Reciever Message-->
                @elseif($item->sender_id==auth()->user()->id or $item->entreprise_id==0 )
                <div class="d-flex flex-row justify-content-start" style="margin-left: 50% ;position: relative;">
                    <div class="media-body">
                        @if($item->type=="txt")
                        <div class="bg-primary rounded py-2 px-3 mb-2">
                            <p class="text-small mb-0 text-white">{{$item->message}}
                            </p>
                        </div>
                        @elseif($item->type=="file")
                        <div class="bg-primary rounded py-2 px-3 mb-2 ">
                            <p class="text-small mb-0 text-white">
                                <a style="color: azure;" href={{URL::to('/') . "/" . $item->message}}
                                    download={{$item->message}}
                                    title="{{$item->message}}">
                                    {{$item->message}}
                                </a>
                            </p>
                        </div>
                        @endif
                        <p class="small text-muted">{{$item->created_at}}</p>
                    </div>
                </div>
                @endif
                @endforeach
                <!-- Typing area -->
            </div>
            <form action="{{route('infosMarche')}}" enctype="multipart/form-data" type="POST"
                style="max-width:100% ;border: 2px">
                @csrf
                @method('GET')
                <div class="input-group">
                    <div style="width: 70%">
                        <input type="text" placeholder="Veillez taper votre message" aria-describedby="button-addon2"
                            class="form-control rounded-0 border-0 py-4 bg-light" name="text_input" type="text"
                            autofocus="autofocus" size='50' />
                    </div>
                    <div class="input-group-append" style="padding-left: 5%;padding-top: 2%">
                        <label for="file_input">
                            <span class="publisher-btn file-group">
                                <i class="fa fa-paperclip file-browser">
                                    <input id="file_input" name="file_input[]" type="file" size='50'
                                        style="display: none;" multiple /> </i>
                            </span>
                        </label>
                    </div>

                    <div class="input-group-append " style="padding-left: 15% ; padding-top: 2%">
                        <button type="submit" name="submit" value=" Submit" class="btn btn-link">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
</script>
@yield('contenu')
@endsection