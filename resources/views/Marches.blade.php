@extends('layouts.page')
@section('content')
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="block-heading" style="background: linear-gradient(rgba(0,0,0,0.33) 0%, #000000), url(&quot;assets/img/mining-exploration-activities.jpg&quot;);height: 230px;width: 100%;">
                <h1 class="display-6" style="color: rgb(255,255,255);">Opportunités <br></h1>
            </div>
            <div class="container">
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3><strong>Domaines</strong></h3><select class="chosen" required="" style="color: #000000;width: 100%;">
                                            <option value="102"></option>
                                            <option value="12">Fuels</option>
                                            <option value="13">IT et telecommunications</option>
                                            <option value="14">Services RH</option>
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <h3><strong>Catégories</strong></h3><select class="chosen" required="" style="color: #000000;width: 100%;">
                                            <option value="159"></option>
                                            <option value="12">Matériel informatique</option>
                                            <option value="13">Carburants</option>
                                            <option value="14">Restauration</option>
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <h3><strong>Date limite</strong><br></h3><input type="date" style="width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse" id="filters">
                                    <div class="filters">
                                        <div class="filter-item">
                                            <h3><strong>Domaines</strong></h3><select class="chosen" required="" style="color: #000000;width: 100%;">
                                                <option value="102"></option>
                                                <option value="12">Fuels</option>
                                                <option value="13">IT et telecommunications</option>
                                                <option value="14">Services RH</option>
                                            </select>
                                        </div>
                                        <div class="filter-item">
                                            <h3><strong>Catégories</strong></h3><select class="chosen" required="" style="color: #000000;width: 100%;">
                                                <option value="159"></option>
                                                <option value="12">Matériel informatique</option>
                                                <option value="13">Carburants</option>
                                                <option value="14">Restauration</option>
                                            </select>
                                        </div>
                                        <div class="filter-item">
                                            <h3><strong>Date limite</strong><br></h3><input type="date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row g-0">
                                    <div class="col-12 col-md-6 col-lg-4" style="width: 100%;height: 260px;background: rgba(214,51,132,0);margin-bottom: 20px;margin-top: 20px;">
                                        <div class="clean-product-item" style="width: 100%;height: 230px;">
                                            <h5 style="font-weight: bold;">Matériel Informatique</h5>
                                            <p>Objet : Matériels informatique avec des prestations</p>
                                            <p style="font-size: 15px;">Dossier_49253: Prestation logistique de conduite des engins à la direction production minière<br></p>
                                            <div class="d-flex"><span style="font-size: 14px;">Date limite de réponse :&nbsp;<br></span><span style="color: rgb(14,101,0);font-weight: bold;font-size: 14px;">05/01/2022 18:00 GMT<br></span></div>
                                            <div style="height: 20%;margin-left: 70%;margin-top: 10px;"><a href="Marche.html" style="background: var(--bs-blue);color: rgb(255,255,255);padding-right: 20px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;border-radius: 6px;">Accéder<br></a></div>
                                            <hr style="height: 3px;background: var(--bs-blue);color: rgb(33, 37, 41);opacity: 1;margin-top: 18px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4" style="width: 100%;height: 260px;background: rgba(214,51,132,0);margin-bottom: 20px;margin-top: 20px;">
                                        <div class="clean-product-item" style="width: 100%;height: 230px;">
                                            <h5 style="font-weight: bold;">Matériel Informatique</h5>
                                            <p>Objet : Matériels informatique avec des prestations</p>
                                            <p style="font-size: 15px;">Dossier_49253: Prestation logistique de conduite des engins à la direction production minière<br></p>
                                            <div class="d-flex"><span style="font-size: 14px;">Date limite de réponse :&nbsp;<br></span><span style="color: rgb(14,101,0);font-weight: bold;font-size: 14px;">05/01/2022 18:00 GMT<br></span></div>
                                            <div style="height: 20%;margin-left: 70%;margin-top: 10px;"><a href="Marche.html" style="background: var(--bs-blue);color: rgb(255,255,255);padding-right: 20px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;border-radius: 6px;">Accéder<br></a></div>
                                            <hr style="height: 3px;background: var(--bs-blue);color: rgb(33, 37, 41);opacity: 1;margin-top: 18px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4" style="width: 100%;height: 260px;background: rgba(214,51,132,0);margin-bottom: 20px;margin-top: 20px;">
                                        <div class="clean-product-item" style="width: 100%;height: 230px;">
                                            <h5 style="font-weight: bold;">Matériel Informatique</h5>
                                            <p>Objet : Matériels informatique avec des prestations</p>
                                            <p style="font-size: 15px;">Dossier_49253: Prestation logistique de conduite des engins à la direction production minière<br></p>
                                            <div class="d-flex"><span style="font-size: 14px;">Date limite de réponse :&nbsp;<br></span><span style="color: rgb(14,101,0);font-weight: bold;font-size: 14px;">05/01/2022 18:00 GMT<br></span></div>
                                            <div style="height: 20%;margin-left: 70%;margin-top: 10px;"><a href="Marche.html" style="background: var(--bs-blue);color: rgb(255,255,255);padding-right: 20px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;border-radius: 6px;">Accéder<br></a></div>
                                            <hr style="height: 3px;background: var(--bs-blue);color: rgb(33, 37, 41);opacity: 1;margin-top: 18px;">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4" style="width: 100%;height: 260px;background: rgba(214,51,132,0);margin-bottom: 20px;margin-top: 20px;">
                                        <div class="clean-product-item" style="width: 100%;height: 230px;">
                                            <h5 style="font-weight: bold;">Matériel Informatique</h5>
                                            <p>Objet : Matériels informatique avec des prestations</p>
                                            <p style="font-size: 15px;">Dossier_49253: Prestation logistique de conduite des engins à la direction production minière<br></p>
                                            <div class="d-flex"><span style="font-size: 14px;">Date limite de réponse :&nbsp;<br></span><span style="color: rgb(14,101,0);font-weight: bold;font-size: 14px;">05/01/2022 18:00 GMT<br></span></div>
                                            <div style="height: 20%;margin-left: 70%;margin-top: 10px;"><a href="Marche.html" style="background: var(--bs-blue);color: rgb(255,255,255);padding-right: 20px;padding-left: 20px;padding-bottom: 10px;padding-top: 10px;border-radius: 6px;">Accéder<br></a></div>
                                            <hr style="height: 3px;background: var(--bs-blue);color: rgb(33, 37, 41);opacity: 1;margin-top: 18px;">
                                        </div>
                                    </div>
                                </div>
                                <nav style="margin-top: 100px;">
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection