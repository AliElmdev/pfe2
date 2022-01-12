@extends('layouts.page')
@section('content')
    <header class="header-blue" style="margin-top: -63px;">
        <div class="container hero">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                    <h1><strong>AVEZ-VOUS&nbsp;UNE QUESTION ?</strong><br></h1>
                    <p>Notre équipe est sur votre disposition afin de vous aidez et répondre à vos questions.<br></p><button class="btn btn-light btn-lg action-button" type="button">Posez votre question</button>
                </div>
                <div class="col-md-5 col-lg-5 offset-lg-1 offset-xl-0 d-none d-lg-block phone-holder"><img src="assets/img/question-mark-1019820_1280-removebg-preview.png" style="width: 100%;margin-top: 19px;">
                    <div class="phone-mockup">
                        <div class="screen"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div>
        <section class="text-center" style="margin: 50px;">
            <h1 style="color: rgba(33,37,41,0.65);font-family: Adamina, serif;"><strong><em>Avez-vous rencontré un problème ?</em></strong><br></h1>
            <p style="font-family: Adamina, serif;font-style: italic;"><br>N'hésitez pas de nous connecter pour résoudre ce problème, nous sommes à votre disposition.<br><br></p><button class="btn btn-primary" type="button" style="font-weight: bold;font-style: italic;">Contactez-nous</button>
        </section>
    </div>
    <div>
        <section class="py-5 bg-light">
            <h1 class="text-center text-success" style="padding-top: 15px;padding-bottom: 15px;color: #1b6ce5!important;">Découvrir les questions les plus posées<br></h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div id="faqlist" class="accordion accordion-flush">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-1">Question 1 ?</button>
                                </h2>
                                <div id="content-accordion-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                         Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                                    </p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-2">Question 2 ?</button></h2>
                                <div id="content-accordion-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-3">Question 3 ?</button></h2>
                                <div id="content-accordion-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-4">Question 4 ?</button></h2>
                                <div id="content-accordion-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header"><button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#content-accordion-5">Question 5 ?<br></button></h2>
                                <div id="content-accordion-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                    <p class="accordion-body"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div>
        <section class="getintouch">
            <div class="container modern-form">
                <div class="text-center">
                    <h4 style="color: #212529;font-size: 45px;">Posez vos questions<br></h4>
                </div>
                <hr class="modern-form__hr">
                <div class="modern-form__form-container">
                    <form>
                        <div class="row">
                            <div class="col col-contact">
                                <div class="modern-form__form-group--padding-r form-group mb-3"><input class="form-control input input-tr" type="text" placeholder="First Name">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-contact">
                                <div class="modern-form__form-group--padding-l form-group mb-3"><input class="form-control input input-tr" type="text" placeholder="Email">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="modern-form__form-group--padding-t form-group mb-3"><textarea class="form-control input modern-form__form-control--textarea" placeholder="Message"></textarea>
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center"><button class="btn btn-primary submit-now" type="submit" style="background: #0683b0;border-radius: 15px;font-weight: bold;">Envoyer</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection