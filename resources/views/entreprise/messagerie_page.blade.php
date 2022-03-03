@extends('layouts.page')
@section('content')
<main class="page contact-us-page " style="font-style: roboto">
    <section class="clean-block clean-form dark">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">
                    Postulation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('chats',[$id_marche])}}
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">
                    Messagerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Pieces
                    Joins</a>
            </li>
        </ul>

        <div class="card card-bordered" style="background-color: rgb(163, 206, 206) ;margin:  0.1%;">
            <div class="container py-5 px-4">
                <!-- For demo purpose-->
                <header class="text-center">
                    <h1 class="display-4"> Messagerie</h1>
                </header>

                <!-- Chat Box-->

                <div class="col-12 px-0" id="some_div">
                    <div class="px-4 py-5 chat-box bg-white" " style=" border-radius: 10px; ">
                        <div style=" height:500px;overflow-x:hidden;-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
                        background-color: rgb(121, 208, 208);padding-top: 5%">
                        <!-- Sender Message-->
                        @foreach ($list as $item)
                        @if ($item->sender_id== $id_envoie )
                        <div class="media w-50 mb-3"><img
                                src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="user"
                                width="50" class="rounded-circle">
                            <div class="media-body">
                                @if($item->type=="txt")
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">{{$item->message}}</p>
                                </div>
                                @elseif($item->type=="file")
                                <div class="bg-light rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-muted">
                                        <a href={{URL::to('/') .'/'. $item->message}}
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
                        @elseif($item->sender_id== $id_receve or $item->entreprise_id==$entreprise_id)
                        <div class="media w-50 ml-auto mb-3 " style=" position: relative; left: 50%; width: 250px;">
                            <div class="media-body">
                                @if($item->type=="txt")
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">{{$item->message}}
                                    </p>
                                </div>
                                @elseif($item->type=="file")
                                <div class="bg-primary rounded py-2 px-3 mb-2">
                                    <p class="text-small mb-0 text-white">
                                        <a href={{URL::to('/') . "/" . $item->message}}
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
                    <form action={{route('chats',[$id_marche])}} enctype="multipart/form-data" method="POST"
                        style="max-width:100%  ;border : none;background-color:  rgb(209, 220, 220) ; margin-top: 3%">
                        @csrf
                        @method('GET')
                        <div class="input-group">
                            <div style="width: 70%">
                                <input type="text" placeholder="Veillez taper votre message"
                                    aria-describedby="button-addon2"
                                    class="form-control rounded-0 border-0 py-4 bg-light" name="text_input" type="text"
                                    autofocus="autofocus" size='50' />
                            </div>
                            <div class="input-group-append" style="padding-left: 5%;padding-top: 2%">
                                <label for="file_input">
                                    <span class="publisher-btn file-group">
                                        <i class="fa fa-paperclip file-browser">
                                            <input id="file_input" name="file_input" type="file" size='50'
                                                style="display: none;" /> </i>
                                    </span>
                                </label>
                            </div>

                            <div class="input-group-append " style="padding-left: 15% ; padding-top: 2%">
                                <button type="submit" name="submit" value=" Submit" class="btn btn-link"> <i
                                        class="fa fa-paper-plane"></i>
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>
</main>
{{-- don't sendding data when refreshing page --}}
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

{{-- update data without refreshing window --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection