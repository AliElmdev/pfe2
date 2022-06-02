@extends('layouts.page')
@section('content')
    <section id="hero" class="d-flex align-items-center">

        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <div class="row">
                <div class="col-xl-6">
                    <h1>Bienvenue sur votre Portail Fournisseurs</h1>
                    <h2>Une plateforme intuitive et ergonomique pour tous vos échanges transactionnels.</h2>
                    <h2>Gérer en toute transparence le cycle d'achat depuis la demande d'information jusqu'au suivi des factures.</h2>
                    <a href="" class="btn-get-started">Opportunités</a>
                </div>
            </div>
        </div>

    </section>
    <main id="main">

        <section id="clients" class="clients">
            <div class="container" data-aos="zoom-in">

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>

        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="row no-gutters">
                    <div class="content col-xl-5 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Accroîte vos opportunités</h3>
                            <p>
                                Cette approche traduit notre volonté de vous offrir la possibilité d'accroître vos opportunités de transactions avec ESO, et de découvrir la diversité de vos secteurs d'activités et des expertises dont vous pouvez nous faire bénéficier.
                            </p>
                            <a href="" class="about-btn"><span>Appels d'offres ouvertes</span> <i class="bx bx-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-7 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <img class="img-thumbnail" src="assets/img/digital-increasing-bar-graph-with-businessman-hand-overlay.jpg" style="background: rgba(255,255,255,0);border: rgba(255,255,255,0) 1px solid; border-radius: 15px;">
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="500" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Fournisseurs</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1200" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Marchés</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Heures d'assistance</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="3" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Gestionnaires</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <section id="tabs" class="tabs">
            <div class="section-title">
                <h2>Étapes d'accès à ce nouvel espace</h2>
            </div>
            <div class="container" data-aos="fade-up">

                <ul class="nav nav-tabs row d-flex">
                    <li class="nav-item col-3">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                            <i class="bi bi-pencil-square"></i>
                            <h4 class="d-none d-lg-block">Enregistrement</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                            <i class="bi bi-patch-check-fill"></i>
                            <h4 class="d-none d-lg-block">Analyse et vérification des données</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                            <i class="bi bi-person-bounding-box"></i>
                            <h4 class="d-none d-lg-block">Identification</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <h4 class="d-none d-lg-block">Accès à la plate-forme</h4>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
                                <h3>Inscription facile et rapide</h3>
                                <p class="fst-italic">
                                    <ul>
                                        <li><i class="ri-check-double-line"></i> Vous avez une entreprise ou une coopérative.</li>
                                        <li><i class="ri-check-double-line"></i> Vous souhaitez devenir un fournisseur de notre groupe ESO.</li>
                                        <li><i class="ri-check-double-line"></i> Vous avez les compétences nécessaires pour répondre à nos besoins.</li>
                                    </ul>
                                    Cette plateforme est pour vous. Vous pouvez faire cela en justement trois minutes, remplir le formulaire d'inscription et commencer une expérience professionnelle nouvelle.
                                </p>
                                <a href="" class="about-btn">Inscrivez-vous</a>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                                <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Réponse vite en moins de 48h</h3>
                                <p>
                                    Notre équipe est sur votre disposition pour analyser et vérifier vos données une fois inscrirez. Au cas ou l'un de vos informations est mal reçu ou incomplet. Un email sera envoyée, un email sera envoyée en moins de 48h. Sinon, un email de validation
                                    sera envoyée à vous par l'équipe technique est votre compte sera confirmée est lancé.
                                </p>
                                <p class="fst-italic">
                                    Avez vous une question ou un problème ?
                                </p>
                                <a href="#contact" class="about-btn scrollto">Contactez-nous</a>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Connectez vous en toute sécurité</h3>
                                <p>
                                    Se connecter à votre espace professionnelle en toute sécurité. Et découvrir la diversité de vos secteurs d'activités et des expertises dont vous pouvez nous faire bénéficier. Ainsi, consulter la liste des appels d'offres OCP en préparation de lancement.
                                </p>
                                <a href="" class="about-btn">Connectez-vous</a>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Acceder à la plateforme</h3>
                                <p>
                                    Retrouvez ici toutes les informations utiles pour répondre aux consultations et émettre vos factures.
                                </p>
                                <ul>
                                    <li><i class="ri-check-double-line"></i> Accédez aux opportunités ESO.</li>
                                    <li><i class="ri-check-double-line"></i> Accédez aux opportunités locales.</li>
                                    <li><i class="ri-check-double-line"></i> Accéder et répondre aux consultations.</li>
                                    <li><i class="ri-check-double-line"></i> Suivre les statuts de vos appels d’offres.</li>
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="assets/img/tabs-4.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="devenirFournisseur" class="devenirFournisseur section-bg ">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>DEVENIR FOURNISSEUR</h2>
                    <p>Le Groupe ESO est constamment à la recherche de nouveaux fournisseurs qui partagent ses valeurs et son modèle de croissance partagée.</p>
                    <p style="font-weight: bold; margin-top: 2%; font-size: 20px;">Vous souhaitez devenir fournisseur ESO ?</p>
                    <p>Il vous suffit de suivre <a href="#tabs" style="font-weight: bold;"> les étapes ci-dessus </a> et indiquer les informations requises sur votre entreprise et vos activités.</p>
                    <a href="" class="about-btn"><span>Appels d'offres ouvertes</span> <i class="bx bx-chevron-right"></i></a>
                </div>
            </div>
        </section>

        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Nos Fournisseurs</h2>
                </div>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <h3>Hamid Nejarri</h3>
                                    <h4>PDG &amp; Fondateur</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Un service très professionnelle. Une plateforme très flexible et rapide.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <h3>Sara Ayt Mohammadi</h3>
                                    <h4>PDG &amp; Fondateur</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Cette plateforme présente une révolution professionnel. Facilite la recherche des appels d'offres.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <h3>Janat Roumi</h3>
                                    <h4>PDG &amp; Fondateur</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Pour toutes les petites et les moyennes entreprises, vous êtes dans le bon endroit pour débuter votre prochaine projet.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <h3>Abejellil kerroumi</h3>
                                    <h4>PDG &amp; Fondateur</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Autant que fondateur d'une startup cette plateforme m'a trop aidé pour faire mes premiers pas dans le monde de travail.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <h3>Allal Bounekcha</h3>
                                    <h4>Entrepreneur</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Une très bonne plateforme. Qui doit être présente chez toute les grandes entreprises.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>

        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Questions fréquemment posées</h2>
                </div>

                <ul class="faq-list accordion" data-aos="fade-up">

                    <li>
                        <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">C'est quoi l'application E-Supply Online ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                L’Application est une plateforme en ligne destinée aux fournisseurs en compte avec notre société, toutes familles d’achat confondues (énergie, équipements et consommables, logistique, matière première et exploitation de carrières, moyens généraux/corporate
                                et facilities, packaging, prestation de service), permettant à l’utilisateur de consulter librement les informations notamment relatives à ses opérations commerciales avec notre société ainsi que : <br>                                - Son historique de commandes en temps réel. <br> - Ses factures. <br> - Les actualités des appels d'offres de notre société...
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">Conditions financières d’utilisation de l’application ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                L’application est proposée gratuitement à l’utilisateur hors coûts d’abonnement auprès de l’opérateur de connexion et d’accès au réseau internet, d’abonnement auprès de l’opérateur de téléphonie mobile et hors surcoût éventuel facturé pour le chargement
                                des données.
                            </p>
                        </div>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">Informations requises pour l’utilisation de l’application ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                        <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                La plateforme est publiquement ouverte à toute société souhaitant devenir fournisseur de notre société ainsi qu’à ceux déjà fournisseur. Dès sa première utilisation de l’application, l’utilisateur peut, s’il le souhaite, modifier ses codes d’accès. En
                                cas de perte ou d’oubli de ses codes d’accès, l’utilisateur peut demander la réinitialisation de ces derniers directement via l’application en cliquant sur mot de passe oublié. Dans le cadre de la création de son compte
                                utilisateur, l’utilisateur pourra donner accès à tout ou partie des modules de l’application à des personnes habilitées de son entreprise. En cas de changement, l’utilisateur pourra le désactiver et émettre de nouveaux
                                identifiants pour les nouvelles personnes à habiliter. L’utilisateur s’engage à fournir, pour la création de son compte utilisateur, des informations exactes et à jour, ne portant pas atteinte aux droits des tiers et non
                                contraires à l’ordre public et aux bonnes mœurs. Les informations personnelles transmises par l’utilisateur lors de l’ouverture de son compte personnel sur l’application sont confidentielles. L’utilisateur est seul responsable
                                de la conservation et du caractère confidentiel de ses codes d’accès et par conséquent de toute divulgation volontaire ou non de ses identifiant et mot de passe. Tout(e) perte, vol, détournement ou utilisation non autorisé(e)
                                de ses codes d’accès et leurs conséquences relèvent de la seule responsabilité de l’utilisateur. Toute connexion par l’Utilisateur est présumée être effectuée par lui-même. En cas d’utilisation frauduleuse du compte de
                                l’Utilisateur, ce dernier devra en informer notre société dans les plus brefs délais en contactant l’administrateur de l’Application directement via ladite Application ou en lui envoyant un courrier électronique à l’adresse
                                e-mail qui y sera indiquée. A défaut d’opposition, la responsabilité de notre société ne saurait être tenue responsable des conséquences de l’utilisation, par un tiers, des codes d’accès de l’Utilisateur.

                            </p>
                        </div>
                    </li>
                </ul>

            </div>
        </section>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Notre équipe est sur votre disposition afin de vous aidez et répondre à vos questions.</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bx bx-map"></i>
                                    <h3>Notre adresse</h3>
                                    <p>Km 5, Rue d'Agouray، N6, Meknes 50040</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4">
                                    <i class="bx bx-envelope"></i>
                                    <h3>Envoyez-nous un email</h3>
                                    <p>info@eso.com<br>contact@eso.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Appelez-nous</h3>
                                    <p>+212 5354 67085<br>+212 6000 00000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Formulaire de contact -->
                    <div class="col-lg-6">
                        <form action="" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Votre E-mail" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Chargement</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Votre message a été envoyé.</div>
                            </div>
                            <div class="text-center"><button type="submit">Envoyer Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section>

    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection