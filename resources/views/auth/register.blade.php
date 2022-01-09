@extends('layouts.page')
@section('content')
<main class="page">
    <section>
        <section style="margin-bottom: 65px;">
            <div id="multple-step-form-n" class="container overflow-hidden" style="margin-top: 0px; margin-bottom: 10px; padding-bottom: 300px; padding-top: 57px; height: 1642px;">
                <div id="progress-bar-button" class="multisteps-form">
                    <div class="row">
                        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4" style="width: 100%; padding-right: 5%; padding-left: 5%;">
                            <div class="multisteps-form__progress">
                                <a class="btn multisteps-form__progress-btn js-active" role="button" title="User Info" style="color: var(--bs-blue); border-color: var(--bs-blue);">User Info</a>
                                <a class="btn multisteps-form__progress-btn" role="button" title="User Info">About</a><a class="btn multisteps-form__progress-btn" role="button" title="User Info">Contact&nbsp;</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="multistep-start-row" class="row">
                    <div id="multistep-start-column" class="col-12 col-lg-8 m-auto" style="width: 100%;">
                        <form id="main-form" class="multisteps-form__form" method="POST" action="{{ route("registration") }}" enctype="multipart/form-data">
                            @csrf
                            <div id="single-form-next" class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn" style="background: linear-gradient(57deg, #e8e8e8, #bfbfbf), var(--bs-blue);">
                                <div id="form-content" class="multisteps-form__content">
                                    <div id="input-grp-double" class="form-row mt-4">
                                        <h3 class="text-center multisteps-form__title" style="color: var(--bs-red); margin-bottom: 30px;">Données entreprise<br /></h3>
                                        <div class="col-12 col-sm-6" style="width: 100%;">
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Pays :&nbsp;</span>
                                                <select class="form-select" style="width: 50%;" name="country">
                                                    <optgroup label="This is a group">
                                                        <option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Dénomination sociale :&nbsp;</span><input class="form-control" type="text" style="width: 50%;" name="social_name" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Nom Commercial :&nbsp;</span><input class="form-control" type="text" style="width: 50%;" name="commercial_name" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Forme juridique :&nbsp;<br /></span>
                                                <select class="form-select" style="width: 50%;" name="company_type">
                                                    <optgroup label="This is a group">
                                                        <option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Numéro ICE :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="ice_num" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Numéro SIRET :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="siret_num" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Adresse :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="adresse" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Code Postal :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="zip_code" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Ville :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="city" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Téléphone entreprise (standard) :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="phone" />
                                            </div>
                                        </div>
                                    </div>
                                    <div id="input-grp-single" class="form-row mt-4">
                                        <h3 class="text-center multisteps-form__title" style="color: var(--bs-red); margin-left: 0px; margin-bottom: 30px;">Données utilisateur</h3>
                                        <div class="col-12 col-sm-6" style="width: 100%;">
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Titre :&nbsp;</span>
                                                <select class="form-select" style="width: 10%;" name="title">
                                                    <optgroup label="This is a group"><option value="12" selected="">M</option><option value="13">Mr</option><option value="14">Mlle</option></optgroup>
                                                </select>
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Nom :&nbsp;</span><input class="form-control" type="text" style="width: 50%;" name="name" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Titre/Service :&nbsp;<br /></span>
                                                <select class="form-select" style="width: 30%;" name="title_service">
                                                    <optgroup label="This is a group">
                                                        <option value="12" selected="">Autre</option><option value="13">Propriétaire</option><option value="14">Chef de projet</option>
                                                        <option value="15">Service Commercial/Marketing</option><option value="16">Département Production</option><option value="17">Département Projet</option>
                                                        <option value="18">Département Achat</option><option value="19">Professionnel/Consultant</option><option value="20">Représentant légal</option>
                                                        <option value="21">Président</option><option value="22">Vice-président</option><option value="22">Dirigeant unique</option><option value="23">Directeur général</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">E-mail :&nbsp;<br /></span><input class="form-control @error('email') is-invalid @enderror"  autocomplete="email" type="text" style="width: 50%;" name="email" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Mot de passe :&nbsp;<br /></span><input class="form-control @error('password') is-invalid @enderror" type="password"  autocomplete="new-password" style="width: 50%;" name="password" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Cofimer Mot de passe :&nbsp;<br /></span><input class="form-control" type="password"  autocomplete="new-password" style="width: 50%;" name="password_confirmation" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Portable :&nbsp;<br /></span><input class="form-control" type="text" style="width: 50%;" name="phone_user" />
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Choix de la langue :&nbsp;<br /></span>
                                                <select class="form-select" style="width: 50%;" name="lang_user">
                                                    <optgroup label="This is a group"><option value="12" selected="">English</option><option value="13">Francais</option><option value="14">عربي</option></optgroup>
                                                </select>
                                            </div>
                                            <div class="d-flex" style="width: 100%; margin-bottom: 10px;">
                                                <span style="color: rgb(0, 0, 0); width: 50%;">Fuseau horaire :<br /></span>
                                                <select class="form-select" style="width: 50%;">
                                                    <optgroup label="This is a group">
                                                        <option value="12" selected="">This is item 1</option><option value="13">This is item 2</option><option value="14">This is item 3</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="next-button" class="button-row d-flex mt-4">
                                        <button
                                            class="btn btn btn-primary ml-auto js-btn-next"
                                            type="button"
                                            title="Next"
                                            style="background: rgb(0, 93, 99); width: 20%; min-width: 70px; max-width: 800px; margin-right: 40%; margin-left: 40%; border-width: 0px;"
                                            onclick="window.location.href=&#39;#progress-bar-button&#39;"
                                        >
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="single-form-next-prev" class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn" style="background: linear-gradient(57deg, #e8e8e8, #bfbfbf);">
                                <h3 class="text-center multisteps-form__title" style="color: var(--bs-red);">About</h3>
                                <div id="form-content-2" class="multisteps-form__content">
                                    <div id="input-grp-double-2" class="form-row mt-4">
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">Etes-vous une entreprise marocaine ?<br /></span>
                                            <select class="form-select" style="width: 10%; min-width: 90px;" name="ismoroccan">
                                                <option value="oui" selected="">Oui</option>
                                                <option value="non">Non</option>
                                            </select>
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">La date de création de votre entreprise ?<br /></span><input class="form-control" type="date" style="width: 20%;" name="iscreated" />
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">L'effectif total de l'entreprise pour la dernière année clôturée ?<br /></span>
                                            <input class="form-control" type="number" style="width: 20%;" name="effective_total" />
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">Merci de joindre le document «CAU» signé et cacheté par le représentant légal de l'entreprise.<br /></span>
                                            <input class="form-control multisteps-form__input" type="file" placeholder="First name " style="width: 50%; height: 37px;" name="doc_cau" />
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">Merci de joindre une copie des statuts de l'entreprise.<br /></span>
                                            <input class="form-control multisteps-form__input" type="file" placeholder="First name " style="width: 50%; height: 37px;" name="doc_status_entreprise" />
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">Merci de joindre une copie de l'attestation d'enregistrement au registre du commerce ou équivalent.<br /></span>
                                            <input class="form-control multisteps-form__input" type="file" placeholder="First name " style="width: 50%; height: 37px;" name="doc_registre" />
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">
                                                Merci de joindre une copie des bilans et CPC certifiés des 3 exercices précédents.<br />
                                                NB: Si votre entreprise a moins de 3 ans d'existence, merci de joindre une copie des bilans et CPC disponibles.<br />
                                            </span>
                                            <input class="form-control multisteps-form__input" type="file" placeholder="First name " style="width: 50%; height: 37px;" name="doc_cpc" />
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">Merci de sélectionner dans la liste votre activité principale.<br /></span>
                                            <select class="form-select" style="width: 50%;" autofocus="" name="activite_entreprise">
                                                <optgroup label="This is a group"><option value="12" selected="">informatique</option><option value="13">design</option><option value="14">construction</option></optgroup>
                                            </select>
                                        </div>
                                        <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                            <span style="width: 50%;">Merci de sélectionner dans la liste les certificats de votre entreprise.<br /></span>
                                            <div style="width: 50%;">
                                                <div class="form-check" style="width: 100%;">
                                                    <input class="form-check-input" type="checkbox" id="formCheck-2" name="certificats" value="1" /><label class="form-check-label" for="formCheck-2">Aucune</label>
                                                </div>
                                                <div class="form-check" style="width: 100%;">
                                                    <input class="form-check-input" type="checkbox" id="formCheck-5" name="certificats" value="1" /><label class="form-check-label" for="formCheck-5">ISO 9001</label>
                                                </div>
                                                <div class="form-check" style="width: 100%;">
                                                    <input class="form-check-input" type="checkbox" id="formCheck-4" name="certificats" value="1" /><label class="form-check-label" for="formCheck-4">ISO 14001</label>
                                                </div>
                                                <div class="form-check" style="width: 100%;">
                                                    <input class="form-check-input" type="checkbox" id="formCheck-3" name="certificats" value="1" /><label class="form-check-label" for="formCheck-3">ISO 50001</label>
                                                </div>
                                                <div class="form-check" style="width: 100%;">
                                                    <input class="form-check-input" type="checkbox" id="formCheck-6" name="certificats" value="1" /><label class="form-check-label" for="formCheck-6">ISO 45001</label>
                                                </div>
                                                <div class="form-check" style="width: 100%;">
                                                    <input class="form-check-input" type="checkbox" id="formCheck-1" name="certificats" value="1" /><label class="form-check-label" for="formCheck-1">Autres certifications</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="input-grp-single-2" class="form-row mt-4">
                                        <div class="col-12">
                                            <div class="d-flex col-12 col-sm-6" style="width: 100%; margin-bottom: 10px;">
                                                <span style="width: 50%;">Merci de joindre un document avec des références clients sur l'ensemble de vos activités.<br /></span>
                                                <input class="form-control multisteps-form__input" type="file" placeholder="First name " style="width: 50%; height: 37px;" name="ref_clients" />
                                            </div>
                                        </div>
                                    </div>
                                    <div id="next-prev-buttons-1" class="button-row d-flex mt-4">
                                        <button
                                            class="btn btn btn-primary js-btn-prev"
                                            type="button"
                                            title="Prev"
                                            style="background: rgb(0, 93, 99); width: 20%; min-width: 70px; max-width: 800px; margin-left: 30%; border-width: 0px;"
                                            onclick="window.location.href=&#39;#progress-bar-button&#39;"
                                        >
                                            Prev
                                        </button>
                                        <button
                                            class="btn btn btn-primary ml-auto js-btn-next"
                                            type="button"
                                            title="Next"
                                            style="background: rgb(0, 93, 99); width: 20%; min-width: 20px; max-width: 800px; margin-right: 30%; border-width: 0px;"
                                            onclick="window.location.href=&#39;#progress-bar-button&#39;"
                                        >
                                            Next
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="single-form-next-prev-1" class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn" style="background: linear-gradient(57deg, #e8e8e8, #bfbfbf);">
                                <h3 class="text-center multisteps-form__title" style="margin-bottom: 42px; color: var(--bs-red);">Conditions d'Accessibilité de Disponibilité et de Sécurité Portail Fournisseurs<br /></h3>
                                <p style="overflow-y: scroll; height: 277px;">
                                    Ces Conditions d'Accessibilité, de Disponibilité et de Sécurité du Portail («CADSP») décrivent les termes des services fournis par OCP SA («OCP») à travers le Portail suivant les Conditions
                                    d'Accès et d'Utilisation (CAU). Elles ne s'appliquent pas aux conditions relatives à certaines applications nécessitant des conditions d'utilisation spécifiques et qui seront décrites par la suite
                                    dans des documents respectifs.Les CADSP définissent et mesurent le niveau du service courant ainsi que le service standard minimal applicable. Elles décrivent également les procédures de la
                                    gestion des changements relatives à la publication d'un nouveau service ou Portail.Par ailleurs, les CADSP complètent les Conditions d'Accès et d'Utilisation du Portail («CAU») et en font partie
                                    intégrante.Les CADSP sont applicables à tous les services qui sont sous la responsabilité d'OCP, c'est-à-dire toutes lestransactions engagées derrière ses pare-feux1&nbsp;et ses relais
                                    garde-barrières2&nbsp;ou sur les connexions Internet en tenant compte du niveau de service assuré par ce moyen de communication.Tout usage d'une solution de Fournisseur d'application externe à
                                    travers le Portail conduira à la rédaction d'un appendice spécifique aux CADSP.Les engagements faits dans ce document sont applicables aux utilisateurs tels que définis dans les CAU, à l'exclusion
                                    de toutes activités intermédiaires, pilotes, de démo ou de formationLes services génériques couverts par les présentes CADSP sont les suivants :► Infrastructure et gestion de contenu :•
                                    Identification et gestion des inscriptions des Utilisateurs<br />
                                    • Authentification des Utilisateurs et sécurité<br />
                                    • Outils communs : moteur de recherche, rapport d'utilisation► Processus d'assurance qualité :• Processus de déploiement du Portail Fournisseurs et démarche d'implication des Fournisseurs dans la
                                    gestion du Portail<br />
                                    • Support en ligne des utilisateurs<br />
                                    • Disponibilité du système<br />
                                    1Ce paramètre empéche toutes les sources extérieures de se connecter au Portail.<br />
                                    2Processus d'authentification des Utilisateurs du Portail.<br />
                                    <br />
                                    <strong>1. Accessibilité du Portail</strong>Le Portail Fournisseurs est accessible à travers Internet https://esuppliers.ocpgroup.org Le Fournisseur reconnaìt que le caractère public de l'Internet
                                    empèche OCP de garantir :<br />
                                    • que chaque Fournisseur pourra accéder à tout moment au Portail ou à un des services pendant la période de disponibilité du Portail et la plage d'ouverture propre, le cas échéant, à chaque
                                    service ;<br />
                                    • que cet accès ne sera en aucun cas interrompu ;<br />
                                    • que cet accès sera exempt d'erreur;<br />
                                    • tout manquement non-autorisé à la sécurité.<br />
                                    Dans le cas de pannes matérielles qui ne sont pas bloquantes mais qui altèrent l'exercice de l'Utilisateur, OCP s'engageà faire ses meilleurs efforts pour prendre en compte et réparer ces pannes.
                                    <br />
                                    Les pannes matérielles bloquantes altérant des ressources critiques feront l'objet d'un délai de réparation estimé aumoment du sinistre.<strong>2. Disponibilité du Portail</strong>► Heures
                                    d'ouvertureLes services du Portail sont ouverts aux Utilisateurs 24h/24 et 7j/7.<br />
                                    Le service peut en particulier ètre interrompu pour des opérations de maintenance.► Règles OCP concernant le mot de passe<br />
                                    Un compte d'accès au Portail est créé par Fournisseur, le mot de passe est envoyé directement par le système de OCP eachat@ocpgroup.ma à l'adresse E-mail de l' «Utilisateur Autorisé».<br />
                                    Le changement du mot de passe est obligatoire à la première connexion au Portail. Toutefois, il est toujours possible, et à tout moment, de modifier le mot de passe du compte par son détenteur.
                                    <br />
                                    Les mots de passe doivent obligatoirement ètre:<br />
                                    • Personnel et ne doit ètre communiqué en aucun cas à un autre Utilisateur ;<br />
                                    • D'une longueur de 8 caractères au minimum ;<br />
                                    • Composé d'au moins un chiffre et d'au moins un caractère alphabétique ;<br />
                                    • Changé chaque trois mois.En cas de perte ou de blocage du mot de passe, le Fournisseur doit récupérer son mot de passe en cliquant sur le lien « Demander un nouveau mot de passe »► Services
                                    <br />
                                    OCP informera les Utilisateurs Fournisseurs via le Portail En cas de travaux de maintenance planifiés durant les heures entre 8h et l6h -heure marocaine- pour les jours ouvrables du Lundi au
                                    Vendredi.<br />
                                    Dans la mesure du possible, la maintenance sera exécutée durant une période de moindre gène.<br />
                                    Le Fournisseur reconnaìt qu'OCP n'est pas responsable et ne serait en aucun cas tenu de lui verser des dommages et Intérèts du fait de l'interruption, de la suspension, de la modification ou de
                                    l'abandon du Portail ou d'un des Services.3. Sécurité et confidentialitéOCP a défini et mis en reuvre une politique de sécurité concernant l'échange de données avec des partenaires externes, basée
                                    sur une évaluation suivant la disponibilité, l'intégrité, la confidentialité, la pérennité et le système d'audit.<br />
                                    Le niveau de sécurité fourni par le réseau d'accès au portail fournisseurs peut ètre suffisant ou nécessiter une mise à niveau qui sera définie et décidée par OCP.<strong>4. Compléments</strong>►
                                    Gestion des changements<br />
                                    OCP se réserve le droit de modifier et mettre à jour à tout moment les CADSP.<br />
                                    OCP s'efforcera, autant que possible, d'en informer les Utilisateurs. Ces modifications et mises à jour s'imposent à l'Utilisateur qui doit en conséquence se référer régulièrement à cette
                                    rubrique, au niveau du portail, pour vérifier lesCADSP en vigueur.<br />
                                    • Changements dans /es Services<br />
                                    OCP adopte un dialogue étroit avec les Fournisseurs et leurs représentants dans le cadre d'une démarche qualité. Tout nouveau service ou toute évolution de fonctionnalités du Portail ou de ces
                                    Services fera l'objet d'un plan de conduite du changement adapté.<br />
                                    La communication se fera par les canaux appropriés : Fournisseurs, publication au niveau du Portail, et rencontres institutionnelles.<br />
                                    • Changement dans /'infrastructure<br />
                                    Tout changement majeur dans l'infrastructure de production générant un impact important sur le fonctionnement des services du Portail, est communiqué aux Fournisseurs avant l'implémentation d'un
                                    tel changement.► Service d'Assistance en Ligne (Help Desk)<br />
                                    OCP met à la disposition du Fournisseur une assistance par voie de messagerie électronique et au travers les adresses e- mail spf@ocpgroup.ma pour le portail I Supplier et une assistance pour le
                                    portail Appels d'offres à travers l'adresses e-mail support-eAchats-ocp@bravosolution.fr ou via a la hotline en appelant le numéro ci-après :• Si le fournisseur est au Maroc : 0800003636<br />
                                    • Si le fournisseur est à l'étranger : +212522924545<br />
                                    Le Fournisseur peut faire appel à ces adresses pour résoudre les problèmes rencontrés dans l'utilisation du Portail ou d'un de ses services. Les langues utilisées sont le Français et l'Anglais.
                                    <br />
                                    Cette fonction d'Assistance sert à accompagner les fournisseurs dans l'utilisation directe du Portail et à résoudre les problèmes entravant à sa bonne exploitation.<br />
                                    <br />
                                    Cependant, cette assistance en ligne n'est pas destinée à former les Utilisateurs, ou à résoudre d'éventuels problèmes d'infrastructure, de matériel, d'exploitation, de système d'exploitation.etc.
                                    du Fournisseur.<br />
                                    L'Assistance OCP fera le maximum pour répondre aux demandes des différents utilisateurs.<br />
                                    La responsabilité de l'Assistance ne comprend pas la résolution ou la correction de pannes révélées dans des produits, services ou infrastructures non OCP.
                                    <strong>MENTIONS LEGALES1. IDENTIFICATION</strong>Le présent site accessible à l'adresse https://esuppliers.ocpgroup.org est édité par OCP SA, 2 rue Al Abtal-Hay Erraha, Casablanca,
                                    Maroc.L'hébergement du Portail est assuré par OCP SA.L'accès au Portail ainsi que l'utilisation de son contenu s'effectuent dans le cadre des mentions d'utilisation décrites dans les Conditions
                                    d'Accès et d'Utilisation (CAU).<strong>2. DONNEES A CARACTERE PERSONNEL</strong>OCP est le seul responsable du traitement des données à caractère personnel collectées sur le Portail.
                                    <strong>2.1 Nature des données à caractère personnel</strong>On entend par données à caractère personnel toute information personnelle (notamment : identifiant, mot de passe, non, prénom, date de
                                    naissance, adresses e-mail et postales, ville, Etat) que les Fournisseurs sont susceptibles de fournir à OCP SA dans le cadre de demande d'information. Ces données, quelle qu'en soit la nature,
                                    permettent -directement ou indirectement- àOCP SA d'identifier les Fournisseurs et de leur adresser des informations par voie électronique.Ces données sont collectées dans le but exclusif
                                    d'établir une relation commerciale avec les Fournisseurs et ne peuvent pas faire l'objet de droit de cession à des tiers<br />
                                    Les données à caractère personnel sont conservées par OCP SA pendant une période raisonnable.<strong>2.2 Consentement</strong>Aucune donnée à caractère personnel n'est collectée sans le
                                    consentement des Fournisseurs.<br />
                                    La nature facultative ou obligatoire des mentions à communiquer à OCP SA dans ce cadre serapréalablement indiquée aux Fournisseurs. Ces derniers ne sont aucunement contraints de transmettre à OCP
                                    SA des données à caractère personnel.<strong>2.3 Droits</strong>Conformément à la Loi 09-08 du l8 février 2009 les Fournisseurs disposent d'un :• Droit d'opposition, pour un motif légitime, sur
                                    les données personnelles - article 9 de la Loi 09-08 ;• Droit d'accès à leurs données personnelles - article 7 de la Loi 09-08 ;• Droit de rectification/suppression de leurs données
                                    personnelles.Ainsi, chaque utilisateur peut exiger auprès du service concerné d'OCP que soit rectifiées, clarifiées, mises à jour ou effacées les informations le concernant qui sont inexactes,
                                    incomplètes, équivoques ou périmées - article 8 de la loi 09-08.Pour faire valoir ces droits ou pour signaler un quelconque dysfonctionnement du Portail au regard des libertés individuelles, les
                                    Fournisseurs peuvent adresser un courrier à l'adresse suivante :OCP SA 2, rue A/ Abta/-Hay Erraha Casab/anca20200 MAROC<br />
                                    Ou<br />
                                    • Envoyer un courrier électronique à l'adresse mail spf@ocpgroup.ma en ce qui concerne le portail i Supplier• Pour le portail Appel d'offres, envoyer un courrier électronique à l'adresse e- mail
                                    support-eAchats-ocp@bravosolution.fr ou appeler la hotline au numéro ci- après :o Si le fournisseur est au Maroc : 0800003636<br />
                                    o Si le fournisseur est à l'étranger : +212522924545<strong>3. COPYRIGHT - PROPRIETE INTELLECTUELLE</strong>OCP SA est titulaire des noms de domaine https: //esuppliers.ocpgroup.orgLe Portail dans
                                    son ensemble, ainsi que les éléments qui le composent (notamment, textes, arborescence, logiciels, animations, photographies, illustrations, schémas, représentations graphiques, logos, etc.)
                                    constituent des reuvres de l'esprit protégées par la loi.Le Portail ainsi que les éléments qui le composent sont la propriété exclusive de OCP SA, seule habilitée à utiliser les droits de
                                    propriété intellectuelle et droits de la personnalité y afférents, notamment marques, modèles, droits d'auteur et droit à l'image, à titre originaire ou par l'effet d'une licence ou d'une
                                    autorisation expresse<strong>CONDITIONS D'ACCES ET D'UTILISATION DU PORTAIL FOURNISSEURS OCP SA</strong><br />
                                    <strong>OCP SA, le 21/10/20131. Objet</strong>Les présentes conditions d'accès et d'utilisation du Portail Fournisseurs OCP SA (ci- aprèsdésignées les «CAU») ont pour objet de définir les
                                    conditions générales juridiques et techniques régissant l'utilisation par tout Fournisseur d'OCP SA (ci après «OCP») de la partie sécurisée du portail des Fournisseurs d'OCP (ci-après désigné le
                                    «Portail »).On entend par OCP toutes ses filiales et toute société ou entité dont elle détient des participations.Par l'intermédiaire du Portail, OCP met à la disposition du Fournisseur, à titre
                                    gratuit, unenvironnement lui permettant d'accéder à l'outil collaboratif de OCP ci-après désigné l'«Outil»)ainsi qu'à des informations, données, bases de données, sites, systèmes d'information,
                                    applications,etc. de OCP (ci-après désignés les «Services») et destiné à assurer des échanges d'information avec OCP dans le cadre de la réalisation des travaux qui lui sont confiés par OCP, ou de
                                    sollicitation lors d'un Appel d'Offres dans l'objectif d'optimiser les relations entre le Fournisseur et OCP, et ce conformément aux dispositions des CAU.L'ensemble des informations, données,
                                    documents, formules, plans, savoir-faire, idées ou tout autreélément qui feront l'objet des échanges entre OCP et le Fournisseur via le Portail et l'Outil, (ci après respectivement dénommés le
                                    «Contenu OCP » et le «Contenu Fournisseur » et cumulativement le «Contenu ») ne pourront ètre utilisés respectivement par OCP et par le Fournisseur que dans le cadre de leurs relations
                                    contractuelles définies par la passation d'unecommande ou une consultation pour un Appel d'OffresUn «Fournisseur» est une entreprise qui s'est engagée à respecter les CAU, qui satisfait aux
                                    critères d'accès au Portail et dont l'accès au Portail est autorisé par OCP.Ci-après, OCP et le Fournisseur sont désignés conjointement par les «Parties » ou individuellement par la « Partie »
                                    <br />
                                    <br />
                                    L'accès au Portail et l'utilisation des Services par le Fournisseur sont soumis à l'acceptation expresse par ce dernier des présentes CAU («Annexe 1») ainsi que des documents définis ci- dessous
                                    lesquels sont mis en ligne sur le Portail et font partie intégrante des CAU :<br />
                                    ► Annexe 1 aux CAU : Formulaire d'adhésion aux CAU;► Annexe 2 aux CAU : Formulaire de nomination et d'engagement de l'AdministrateurFournisseur ;► Les Conditions d'Accessibilité, de Disponibilité
                                    et de Sécurité du Portail («CADSP») ;► Le Guide d'utilisation du Portail « Manuel Fournisseurs».<br />
                                    <strong>2. Accessibilité au Portail</strong>Le Fournisseur ne peut accéder au Portail et l'utiliser que dans le cadre de ses relations avec l'OCP et par l'intermédiaire de ses Utilisateurs
                                    Autorisés.Un « Utilisateur Autorisé » est une personne physique, membre du personnel du Fournisseur, autorisée par l'Administrateur Fournisseur à accéder au Portail et à l'utiliser au nom et pour
                                    le compte exclusif du Fournisseur en respectant les CAU et auquel l'Administrateur Fournisseur transmet un mot de passe personnel et un identifiant utilisateur (Mot de passe / Identifiant
                                    Utilisateur).Un Fournisseur peut avoir un ou plusieurs Utilisateurs Autorisés et il doit obligatoirement avoir un Administrateur Fournisseur.Un « Administrateur Fournisseur » est un Utilisateur
                                    Autorisé qui est habilité par le Fournisseur à autoriser les Utilisateurs Autorisés à accéder au Portail, et qui est responsable du contròle des nouveaux Utilisateurs Autorisés et des suppressions
                                    Utilisateurs Autorisés conformément aux dispositions des règles d'administration du Portail.L'Administrateur Fournisseur est, le plus souvent, une personne expérimentée, rompue aux animations
                                    transversales au sein de son entreprise, rigoureuse, et faisant preuve d'un bon relationnel. Il n'a pas besoin de connaissances informatiques approfondies, mais il utilise couramment
                                    l'informatique, en tant qu'outil de travail.Le nom et les coordonnées de l'Administrateur Fournisseur doivent ètre connus de tous les interlocuteurs d'OCP au sein de sa société, car c'est à
                                    l'Administrateur Fournisseurs qu'ils doivent adresser leurs demandes d'accès au Portail et aux différentes applications de ce Portail.<br />
                                    <br />
                                    La Société ne peut procéder à la nomination de plusieurs Administrateurs qu'après un accord expresse et écrit de la part de la direction d'OCP.L'Administrateur Fournisseur est nommé par le
                                    représentant légal du Fournisseur. Le Représentant légal doit avoir signé les CAU du Portail pour le compte du Fournisseur et avoir nommé un Administrateur Fournisseur via le formulaire annexé au
                                    CAU et à saisir en ligne. Ce formulaire sera signé, cacheté et transmis à la direction d'OCP par tous moyens.Le Fournisseur pourra désigner, en cas de besoin, un remplaçant en cas de congés ou
                                    d'absence de l'Administrateur Fournisseur.L'Administrateur Fournisseur autorisé à effectuer les mises à jour (déclaration d'un Utilisateur Autorisé, suspension d'un Utilisateur Autorisé,
                                    modifications des données concernant un Utilisateur Autorisé, demande d'accès à un Service) directement dans l'annuaire de contròle d'accès fournisseurs de OCP , devra s'équiper d'un mode
                                    d'authentification forte (« Mot de passe aléatoire ») et OCP lui fournira un code d'identification Administrateur Fournisseur (« Code d'Identification») permettant de gérer l'utilisation du
                                    Portail par le Fournisseur. Gràce à son Mot de passe aléatoire / Code d'Identification, l'Administrateur Fournisseur pourra attribuer à chacun des Utilisateurs Autorisés du Fournisseur Mot de
                                    passe / Identifiant Utilisateur leur permettant d'utiliser le Portail.Le représentant légal du Fournisseur doit communiquer et informer OCP sur le transfert ou la fin dela fonction de
                                    l'Administrateur et sur tous événements susceptibles de mettre en question la stabilitéde sa fonction. Le Fournisseur doit automatiquement faire une demande de désactivation de compte,à l'OCP, par
                                    courrier cacheté et signé et y précisant le nom du nouvel Administrateur.L'Administrateur Fournisseur devra procéder deux fois par an à un audit des comptes des Utilisateurs et des droits d'accès
                                    associés, pour vérifier leur validité et leur exactitude.Lorsque l'Administrateur Fournisseur constate des violations de la loi dans son périmètre d'activité, il en fait rapport à ses responsables
                                    hiérarchiques, qui prendront les mesures adéquates. La société fournisseur peut révoquer le compte et les droits d'accès au réseau et aux données d'un utilisateur qui aurait violé les règles
                                    régissant le Portail.L'administrateur sera responsable des conséquences de tous dommages causés à OCP dans le cadre de ses attributions. Il ne peut s'exonérer de sa responsabilité qu'en démontrant
                                    qu'il a usé des moyens les plus élevés au regard des règles de l'art et des meilleurs pratiques de l'industrie dans ce domaine et qu'il a eu la diligence nécessaire afin d'effectuer son ròle et sa
                                    mission.<br />
                                    <br />
                                    Aucun Fournisseur, aucun Administrateur Fournisseur, aucun Utilisateur Autorisé et aucune autre personne n'a le droit d'accéder au Portail en utilisant le Mot de passe / Identifiant Utilisateur
                                    d'un autre Fournisseur ou Utilisateur Autorisé.Le droit d'accès au Portail d'un Utilisateur Autorisé prend fin immédiatement en cas de résiliation des CAU ou dès qu'un Fournisseur, par
                                    l'intermédiaire de l'Administrateur Fournisseur, supprime le droit d'accès d'un Utilisateur Autorisé. Le Fournisseur, par l'intermédiaire de son Administrateur Fournisseur, prendra en conséquence
                                    toutes mesures nécessaires pour mettre fin à ce droit accès.Le Fournisseur s'engage à vérifier que chacun de ses Utilisateurs Autorisés (y compris l'Administrateur Fournisseur) (a) assume la
                                    responsabilité de la sécurité et/ou de l'utilisation de son Mot de passe / Identifiant Utilisateur, (b) ne révèle son Mot de passe / Identifiant Utilisateur à un tiers,<br />
                                    (c) n'autorise aucune autre personne physique ou morale à utiliser son Mot de passe / Identifiant Utilisateur, (d) utilise le Portail conformément aux CAU.Le Fournisseur s'engage également à
                                    informer chacun de ses Utilisateurs Autorisés des obligations qui leur incombent en vertu des CAU et des CADSP et du Guide d'Utilisation du Portail « Manuel Fournisseurs ».Le Fournisseur, son
                                    Administrateur des comptes et ses Utilisateurs Autorisés sont et demeurent responsables des Mots de passe / Identifiants Utilisateurs d'accès au Portail. Ils doivent prendre toutes les précautions
                                    nécessaires pour préserver la confidentialité des dits Mots de passe /Identifiants Utilisateurs ainsi que pour préserver l'utilisation du Portail par les autres Fournisseurs et la sécurité du
                                    Portail dans les conditions prévues par les présentes. Ils s'engagent également à informer immédiatement OCP en cas de perte ou utilisation frauduleuse d'un Mot de passe /Identifiant Utilisateurs
                                    (Code d'Identification pour l'Administrateur Fournisseur)Le Fournisseur est le seul et unique responsable de toute utilisation ou accès au Portail par une personne physique ou morale accédant au
                                    Portail, de quelque manière que ce soit, en utilisant les Mots de passe / Identifiants Utilisateurs dudit Fournisseur ou de ses Utilisateurs Autorisés.OCP ne sera en aucun cas responsable de la
                                    gestion, du contròle et/ou de la surveillance de l'utilisation du Portail et des services par un Fournisseur ou par ses Utilisateurs Autorisés.L'utilisation du Mot de passe / Identifiant
                                    Utilisateur attribué à un Utilisateur Autorisé est considérée comme étant effectuée par ledit Utilisateur Autorisé et sous sa responsabilité et OCP a le droit de se fier à ces indications et de
                                    donner son autorisation pour permettre l'accès au Portail et l'utilisation des services sans aucune autre obligation de vérifier l'identité d'une personne accédant au Portail via ledit Mot de
                                    passe / Identifiant Utilisateur.<br />
                                    <br />
                                    L'Utilisateur doit se procurer, à ses frais, le(s) équipement(s), logiciel(s) et services(s) de télécommunication nécessaires pour accéder au Portail et pour utiliser les Services. Les conditions
                                    techniques d'accès et d'utilisation sont disponibles sur demande auprès d'OCP.<strong>3. Confidentialité et droits de propriété intellectuelle</strong>Les Informations Confidentielles désignent
                                    toutes les informations et/ou toutes les données sous quelque forme et de quelque nature qu'elles soient, ainsi que les droits de propriété intellectuelle qui leurs sont attachés, divulguées par
                                    une Partie à l'autre Partie, ou dont cette dernière pourrait avoir connaissance directement ou indirectement, à l'occasion de l'accès au Portail Fournisseurs et/ou de l'utilisation dudit
                                    Portail.Ne seront pas considérer comme des Informations confidentielles toutes les informations portant sur les appels d'offre mis par OCP sur le Portail.<br />
                                    Chacune des Parties s'engage à considérer comme strictement confidentielle, et à ne pas divulguer à des tiers, de manière directe ou indirecte, à titre onéreux ou gratuit, sous quelque forme que
                                    ce soit, toute Information Confidentielle explicitement exprimée par l'autre Partie.Chaque Partie s'engage en outre à ce que les Informations Confidentielles qu'elles reçoivent de l'autre partie :
                                    <br />
                                    • ne soient utilisés que dans le cadre du Portail Fournisseur ;<br />
                                    • soient restitués sans délai sur simple demande, ou en cas de désactivation définitive du Portail ou de résiliation des CAU.L'obligation de confidentialité prévue au présent article s'appliquera
                                    pendant toute la durée del'utilisation par les Parties du Portail.Ne seront pas considérés comme des tiers, au sens du présent article :<br />
                                    • toute filiale, toute société ou toute entité actuelle ou future dans lequel OCP détient ou détiendra, directement ou indirectement, une participation dans le capital ;<br />
                                    • les membres du personnel et les collaborateurs des Parties amenés par leurs fonctions à avoir connaissance des Informations Confidentielles.Sous réserve des dispositions des présentes CAU, les
                                    Parties acceptent de ne pas, sauf accord préalable écrit, utiliser ou reproduire ou communiquer à un tiers, sous quelque forme que ce soit la propriété intellectuelle ainsi que tous droits de
                                    propriété intellectuelle et/ou industrielle relatifs aux Informations Confidentielles<br />
                                    <br />
                                    <strong>4. Protection des données personnelles</strong>Le Fournisseur s'engage à informer les Utilisateurs Autorisés si des données personnelles les concernant ont été communiquées au groupe OCP.
                                    <br />
                                    En application de la loi 09-08 du l8 février 2009 relatif à la protection des données personnelles, les règles applicables aux droits d'accès, de modification, et/ou de suppression desdites
                                    données personnelles sont répertoriées dans les mentions légales du Portail Fournisseurs.<strong>5. Echanges de données informatiques</strong>Le Fournisseur est entièrement responsable de
                                    l'ensemble des opérations effectuées à travers son compte et avec son identifiant et il est entièrement responsable des opérations effectuées par ses employés, agents et représentants.OCP et le
                                    Fournisseur conviennent qu'ils vont s'échanger des informations par voie d'échanges de données informatiques c'est-à-dire qu'ils vont procéder à des transferts électroniques de données et
                                    d'informations via tout réseau d'ordinateurs ou autre.<br />
                                    Les échanges de données informatisées entre OCP et le Fournisseur, concerneront, principalement :Les propositions d'articles, les propositions de prix, la création des factures, des avis
                                    d'expédition, les réponses (acceptation, rejet, demande de modifications,.) aux nouvelles commandes, la saisie des comptes bancaires, les contacts des commerciaux, des documents joints et les
                                    questions destinés aux acheteurs.<br />
                                    L'envoi d'informations par le Fournisseur vaut expression de sa volonté et constitue son engagement vis-à-vis d'OCP.<br />
                                    Le Fournisseurs accepte que les informations échangées sur la base de la présente clause et en conformité avec les dispositions de celle-ci aient une valeur probante équivalente à celle d'un
                                    document papier. A ce titre, OCP et le Fournisseur renoncent à contester l'authenticité des informations échangées ou à opposer ces informations du seul fait de leur échange par voie électronique.
                                    <br />
                                    En cas de différend, Le Fournisseurs accepte que l'enregistrement de ces informations échangées puisse ètre produit, devant les juridictions ou tribunaux saisis, à titre de preuve des faits
                                    qu'elles contiennent et jusqu'à production d'une preuve contraire apportée sur un support non contestable.
                                    <strong>6. Garanties, responsabilités et limitations de responsabilité• Le Fournisseur</strong><br />
                                    Le Fournisseur a le pouvoir d'accepter les CAU et d'assumer les obligations qui en découlent.<br />
                                    Pendant la durée de validité des présentes, le Fournisseur, l'Administrateur des comptes Utilisateurset ses Utilisateurs Autorisés s'engagent à respecter les dispositions des présentes, toutes les
                                    règlesrégissant les activités sur le Portail ainsi que toutes les lois et réglementations internes et internationales en vigueur applicables aux activités du Fournisseur sur le Portail.<br />
                                    <br />
                                    En aucun cas, le Contenu du Fournisseur ne doit (a) contenir de virus, etc., susceptible d'endommager le Portail ou de nuire à son bon fonctionnement, (b) ètre mensonger, inexact ou trompeur, (c)
                                    ètre mal acquis ou violer les droits d'un tiers, (d) enfreindre les lois et réglementations en vigueur, (e) contenir des éléments de harcèlement, des éléments préjudiciables, diffamatoires,
                                    violents, vulgaires, obscènes, haineux ou critiquables du point de vue racial ou ethnique, ou contraires aux bonnes mreurs, ou susceptibles de porter atteinte au respect de la personne humaine et
                                    de sa dignité, ainsi qu'à la protection des mineurs, (f) porter atteinte à l'image de marque interne et externe de OCP et du Groupe OCP, (g) enfreindre les dispositions des CAU.Dans ce cadre, le
                                    Fournisseur prendra toutes les mesures nécessaires parmi les plus élevées au regard des règles de l'art et des meilleures pratiques de l'industrie dans ce domaine afin d'éviter l'introduction de
                                    tout code malveillant connu dans le Contenu, et adoptera les mesures adéquates s'il constate l'existence d'un tel code malveillant ou assimilé.En cas d'utilisation frauduleuse, illégale, sans
                                    autorisation du Portail Fournisseurs par leFournisseur, son Administrateur des comptes Utilisateurs et les Utilisateurs Autorisés, leFournisseur doit indemniser et garantir OCP contre toutes
                                    actions, demandes d'indemnité ou dedommages et intérèts découlant ou se rapportant à une action ou à une omission d'un desUtilisateurs Autorisés ou découlant ou se rapportant à l'utilisation du
                                    Portail.<strong>• OCP</strong><br />
                                    OCP mettra en reuvre les moyens permettant au Fournisseur et aux Utilisateurs Autorisés l'accès au Portail conformément aux dispositions des CAU et des CADSP et l'utilisation des Services
                                    conformément aux conditions d'utilisation du service, et conformément aux lois et réglementations en vigueur.<br />
                                    Le Portail peut contenir des liens ou des renvois à d'autres sites internet. OCP n'est pas responsable du contenu de ces autres sites Internet et ne sera pas responsable en cas de dommages
                                    provoqués par le contenu affiché sur ces autres sites Internet ou accessible par leur intermédiaire.<br />
                                    OCP n'avalise pas le Contenu fourni par le Fournisseur ou les Utilisateurs Autorisés. OCP n'est pas obligé de contròler le Contenu du Fournisseur; ce dernier dégage expressément OCP et ses tiers
                                    contractants de toute responsabilité de contròle et de filtrage de ce Contenu.<br />
                                    Cependant; OCP peut, compte tenu des circonstances, prendre toutes les mesures qui lui semblent nécessaires ou appropriées quant au Contenu du Fournisseur. OCP fera ses meilleurs efforts pour que
                                    le Contenu OCP ne comporte pas d'inexactitudes techniques ou des coquilles typographiques ou des virus. Celui-ci peut ètre modifié à intervalles réguliers mais aussi quand OCP le souhaite.OCP
                                    s'efforcera, autant que possible, d'avertir l'Utilisateur des modifications apportées au Contenu OCP.<br />
                                    OCP pourra interrompre, suspendre ou interdire totalement ou en partie l'accès au Portail ou aux Services, sans préavis ni indemnité, si le Fournisseur ou ses Utilisateurs Autorisés ont un
                                    comportement ou se sont engagés dans des activités interdits par les lois et réglementations en vigueur, les CAU ou les conditions d'utilisation du service.<br />
                                    <br />
                                    Compte tenu du niveau de sécurité du Portail, OCP ne pourra ètre tenue responsable de l'accès frauduleux au Portail constituant un délit visé par L'alinéa 3 de l'article 607 du code pénal
                                    marocain.<br />
                                    Sous réserve des garanties définies ci-dessus, le Portail et les Services sont mis à disposition des Fournisseurs par OCP « en l'état ». OCP n'accorde aucune autre garantie concernant notamment
                                    l'adéquation des Services aux besoins du Fournisseur.<br />
                                    OCP et ses fournisseurs de services ne pourront ètre tenus responsables à l'égard du Fournisseur et le cas échéant de tiers des dommages de tous types, directs ou indirects, résultant de l'accès
                                    au Portail et de l'utilisation des Services et du Contenu par le Fournisseur, sauf faute de OCP.<br />
                                    Les dispositions du présent article resteront applicables après la résiliation ou l'expiration des CAU.<strong>7. Durée de validité et résiliation</strong>OCP pourra résilier les CAU ou suspendre
                                    ou limiter à tout moment et à son gré l'accès du Fournisseur au Portail : (a) pour toute raison dès lors que le Fournisseur n'appartient plus au panel des fournisseurs de OCP ou (b) en cas de
                                    problème technique ou (c) à tout moment et sans préavis,<br />
                                    si le Fournisseur, son Administrateur des comptes Utilisateurs ou ses Utilisateurs Autorisés ont manqué à leurs obligations au titre des présentes CAU ou ont eu un comportement ou se sont engagés
                                    dans des activités interdites par les lois et réglementations en vigueur ou par les CAU ou<br />
                                    par les conditions d'utilisation du service.<br />
                                    Chaque Partie pourra résilier les CAU en cas de manquement de l'autre Partie, sous quatre-vingt dix(90) jours ouvrés suivant mise en demeure adressée par lettre recommandée avec accusé de
                                    réception et demeurée sans effet.<br />
                                    En cas de résiliation des CAU, tous les droits accordés par les présentes au Fournisseur et à ses Utilisateurs Autorisés prennent fin et le Fournisseur et ses Utilisateurs Autorisés doivent
                                    immédiatement cesser d'utiliser le Portail, sans préjudice de dommages et intérèts pour OCP.<br />
                                    La résiliation est sans préjudice de toute disposition des présentes devant rester en vigueur malgré cette résiliation (ex. : Confidentialité et propriété intellectuelle).
                                    <strong>8. Généralités• Force Majeure</strong>De façon expresse, sont considérés comme cas de force majeure, outre ceux habituellement retenus par la loi et la jurisprudence des cours et tribunaux
                                    marocains, tels que notamment les grèves internes ou externes à l'entreprise, les intempéries, les restrictions et modifications gouvernementales et légales, les pannes d'ordinateur et blocage des
                                    télécommunications, la défaillance des serveurs de OCP, et tout autre cas indépendant de la volonté expresse de OCP ou du Fournisseur.<br />
                                    <br />
                                    La Partie qui fait face à cette situation de force majeure devra faire ses meilleurs efforts et essayer, dans la mesure du possible, d'en atténuer les effets, en tentant d'exécuter, mème
                                    partiellement, certaines de ses obligations.<strong>• Langue</strong>Les présentes CAU sont rédigées en français et en anglais.En cas de conflit entre la présente version française des CAU et la
                                    version anglaise, la version française fera foi entre les Parties.<strong>9. Droit applicable - Clause attributive de juridiction</strong>Les CAU, le Portail, les Services, le Contenu et tous les
                                    droits et obligations des parties générés parle Portail ou s'y rapportant sont soumis à la législation marocaine et sont interprétés et appliqués conformément à celle-ci.<br />
                                    Tout différend au sujet des CAU et de l'accès et utilisation du Portail et des Services doit d'abord faire l'objet d'une tentative de règlement à l'amiable entre les parties dans un délai maximum
                                    de trente (30) jours à compter de la date de survenance du différend avant d'ètre soumis à la juridiction exclusive des tribunaux de Casablanca (Maroc).<strong>10. Audit</strong>À condition de
                                    prévenir le Fournisseur en temps utile et pendant les heures de travail normales OCP a le droit de faire un audit périodique de l'utilisation du Portail faite par le Fournisseur, sous réserve du
                                    respect des clauses de confidentialité des présentes, afin de s'assurer que le Fournisseur respecte les présentes CAU<strong>11. Mises à jour des CAU</strong>OCP se réserve le droit de modifier et
                                    mettre à jour à tout moment l'accès au Portail ainsi que les conditions d'utilisation du Portail et des Services. OCP s'efforcera d'en informer les Utilisateurs, notamment par l'intermédiaire du
                                    Portail. Ces modifications et mises à jour s'imposent à l'Utilisateur qui doit en conséquence se référer régulièrement à cette rubrique pour vérifier les conditions d'utilisation du Portail et des
                                    Services en vigueur.Chaque modification des CAU fera l'objet d'une version datée et référencée.<br />
                                </p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="formCheck-1" style="border-width: 1px;" name="rules_accept" />
                                    <label class="form-check-label" for="formCheck-1">Le candidat déclare avoir lu avec attention et accepté les dispositions ci-dessus<br /></label>
                                </div>
                                <div id="form-content-1" class="multisteps-form__content" style="border-color: rgba(102, 16, 242, 0);">
                                    <div id="next-prev-buttons" class="button-row d-flex mt-4">
                                        <button
                                            class="btn btn btn-primary js-btn-prev"
                                            type="button"
                                            title="Prev"
                                            style="width: 20%; min-width: 70px; max-width: 800px; margin-left: 30%; background: rgb(0, 93, 99); border-width: 0px; border-color: var(--bs-pink); margin-right: 5px;"
                                            onclick="window.location.href=&#39;#progress-bar-button&#39;"
                                        >
                                            Prev
                                        </button>
                                        <button
                                            class="btn btn btn-primary ml-auto js-btn-next"
                                            type="submit"
                                            title="Next"
                                            style="width: 20%; min-width: 70px; max-width: 800px; margin-right: 30%; background: rgb(0, 93, 99); border-width: 0px;">
                                            Envoi
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</main>
@endsection