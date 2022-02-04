@extends('layouts.page')
@section('content')

<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        {{-- <div style="background: url('/assets/img/mining-exploration-activities.jpg') top; height: 100px;"></div>
        --}}
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">
                    Postulation
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('chats',[$id_marche, $id_envoie,$id_receve])}}
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">
                    Messagerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #3c8447; color: #ffffff; box-shadow: 0px 0px; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Pieces
                    Joins</a>
            </li>
        </ul>


        <div class="container py-5 px-4">
            <!-- For demo purpose-->
            <header class="text-center">
                <h1 class="display-4 text-white"> Chat</h1>
            </header>

            <!-- Chat Box-->
            <div class="col-12 px-0">
                <div class="px-4 py-5 chat-box bg-white">
                    <!-- Sender Message-->
                    @foreach ($list as $item)
                    {{-- recever --}}
                    @if ($item->sender_id== $id_envoie)
                    <div class="media w-50 mb-3"><img
                            src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="user" width="50"
                            class="rounded-circle">
                        <div class="media-body">
                            @if($item->typ=="txt")
                            <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted">{{$item->message}}</p>
                            </div>
                            @elseif($item->typ=="file")
                            <div class="bg-light rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-muted">
                                    <a href="{{$item->message}}" download="{{$item->message}}">
                                        {{$item->message}}
                                    </a>
                                </p>
                            </div>
                            @endif
                            <p class="small text-muted">{{$item->created_at}}</p>
                        </div>
                    </div>


                    <!-- Reciever Message-->
                    @elseif($item->sender_id== $id_receve)

                    <div class="media w-50 ml-auto mb-3 " style=" position: relative; left: 50%; width: 250px;">
                        <div class="media-body">
                            @if($item->typ=="txt")
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">{{$item->message}}
                                </p>
                            </div>
                            @elseif($item->typ=="file")
                            <div class="bg-primary rounded py-2 px-3 mb-2">
                                <p class="text-small mb-0 text-white">
                                    <a href={{$item->message}}
                                        download="{{$item->message}}"
                                        title={{$item->message}}>
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
                    <form action={{route('chats',[$id_marche, $id_envoie,$id_receve])}} enctype="multipart/form-data"
                        method="POST" style="max-width:100%  ;border : none">
                        @csrf
                        <div class="input-group">
                            <input type="text" placeholder="veillez tapper votre message"
                                aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light"
                                name="text_input" type="text">
                            <div class="input-group-append">

                                <input id="file_input" name="file_input" type="file" size='50' />
                            </div>


                            <div class="input-group-append">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection