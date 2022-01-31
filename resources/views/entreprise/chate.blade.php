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
                <a class="nav-link" href="#"
                    style="background: #296232; color: #ffffff; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Messagerie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"
                    style="background: #296232; color: #ffffff; border-radius: 10px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-width: 1px; border-color: #003b0d;">Pieces
                    Joins</a>
            </li>
        </ul>



        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card card-bordered">
                            <div class="card-header">
                                <h4 class="card-title"><strong>Chat</strong>
                            </div>

                            <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                                style="overflow-y: scroll !important; height:400px !important;">
                                @foreach ($list as $item)
                                @if ($item->sender_id== $id_envoie)
                                <div class="media media-chat"> <img class="avatar"
                                        src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                    <div class="media-body">
                                        <p>{{$item->message}}</p>
                                        <p class="meta"><time datetime="2018">{{$item->created_at}}</time></p>
                                    </div>
                                </div>
                                @elseif( $item->sender_id== $id_receve)
                                <div class="media media-chat media-chat-reverse">
                                    <div class="media-body">
                                        <p>{{$item->message}}</p>
                                        <p class="meta"><time datetime="2018">{{$item->created_at}}</time></p>
                                    </div>
                                </div>

                                @endif


                                @endforeach

                            </div>
                            <form action="action('ChateController@store')" method="post"
                                style="max-width:100% ;margin-top: 3%;border-top:none">
                                <div class="publisher bt-1 border-light"> <img class="avatar avatar-xs"
                                        src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">
                                    <input class="publisher-input" type="text" name="input_txt"
                                        placeholder="Veillez tapper votre message ici">
                                    <span class="publisher-btn file-group">
                                        <i class="fa fa-paperclip file-browser"> </i>
                                        <input type="file" name="input_file"
                                            accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                                    </span>
                                    <a class="publisher-btn" type="submit" data-abc="true">
                                        <i class="fa fa-smile"></i></a>
                                    <a class="publisher-btn text-info" href="action('ChateController@store')"
                                        data-abc="true"><i class="fa fa-paper-plane"></i>
                                    </a>
                                </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>


</main>



@endsection