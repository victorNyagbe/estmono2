<nav id="navbar" class="navbar">
    <ul class="nav-menu">
        <li><a class="nav-link scrollto {{ $page == 'welcome' ? 'active' : '' }}" href="{{ route('guests.welcome') }}">ACCUEIL</a></li>
        <li class="dropdown drop-commune"><a href="#" class="{{ $page == 'about' ? 'active' : '' }}"><span class="drop-link">A PROPOS</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ route('guests.decentralisation') }}">A propos de la décentralisation</a></li>
                <li><a href="{{ route('guests.about') }}">A Propos de la commune Est-Mono2</a></li>
                <li><a href="{{ route('guests.vision') }}">Notre vision</a></li>
            </ul>
        </li>
        <li class="dropdown drop-commune"><a href="#" class="{{ $page == 'commune' ? 'active' : '' }}"><span class="drop-link">COMMUNE</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ route('guests.mairie.lois') }}">Organisation de la commune</a></li>
                <li><a href="{{ route('guests.mairie.municipal') }}">Conseil Municipal</a></li>
                <li><a href="{{ route('guests.mairie.programme') }}">Programme des activités</a></li>
                <li><a href="{{ route('guests.mairie.opportuniteAff') }}">Opportunités d'affaires</a></li>
                <li><a href="{{ route('guests.mairie.organigramme') }}">Organigramme</a></li>
                <li><a href="{{ route('guests.mairie.cantonQuartier') }}">Cantons et quartiers</a></li>
                <li><a href="{{ route('guests.mairie.cantonQuartier') }}">CDQ</a></li>
                <li><a href="{{ route('guests.mairie.decouverte.index') }}">A la découverte de la commmune Est-Mono2</a></li>
                <li><a href="{{ route('guests.services.jumelage-index') }}">Jumelages</a></li>
            </ul>
        </li>
        <li class="dropdown drop-mairie"><a href="#" class="{{ $page == 'mairie' ? 'active' : '' }}"><span class="drop-link">MAIRIE</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ route('guests.services.bureauExecutif') }}">Bureau exécutif</a></li>
                <li><a href="{{ route('guests.services.etatCivil') }}">Etat Civil</a></li>
                <li><a href="{{ route('guests.services.education') }}">Education</a></li>
                <li><a href="{{ route('guests.services.sante') }}">Santé</a></li>
                <li><a href="{{ route('guests.services.culture') }}">Culture</a></li>
                <li><a href="{{ route('guests.services.urbanisme') }}">Urbanisme</a></li>
                <li><a href="{{ route('guests.services.environnement') }}">Environnement</a></li>
                <li><a href="{{ route('guests.services.tourisme') }}">Tourisme</a></li>
                <li><a href="{{ route('guests.services.securite') }}">Sécurité</a></li>
                <li><a href="{{ route('guests.services.emplois') }}">Emplois</a></li>
                <li><a href="{{ route('guests.services.social') }}">Social</a></li>
                <li><a href="{{ route('guests.services.taxes') }}">Taxes</a></li>
                <li><a href="{{ route('guests.services.finances') }}">Finances</a></li>
                <li><a href="{{ route('guests.mairie.stats') }}">Statistiques</a></li>
                <li><a href="{{ route('guests.services.marchePublic') }}">Marchés publics</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#" class="{{ $page == 'project' ? 'active' : '' }}"><span class="drop-link">PROJETS</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ route('guests.projects.pdc') }}">PDC</a></li>
                <li><a href="{{ route('guests.projects.projetEnCour') }}">Projets en cours</a></li>
                <li><a href="{{ route('guests.projects.projetRealise') }}">Projets réalisés</a></li>
                <li><a href="{{ route('guests.projects.proposerProjet') }} ">Proposer un projet</a></li>
                <li><a href="{{ route('guests.projects.devenirPartenaire') }}">Devenir partenaire sur un projet</a></li>
                <li><a href="{{ route('guests.investor') }}">Investisseur</a></li>
            </ul>
        </li>
        <li class="dropdown"><a href="#" class="{{ $page == 'actualite' ? 'active' : '' }}"><span class="drop-link">ACTUALITES</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="{{ route('guests.actualites.index') }}">Actualité presse</a></li>
                <li><a href="{{ route('guests.actualites.actuVideo') }}">Actualité vidéo</a></li>
                <li><a href="{{ route('guests.annonces.index') }}">Annonces</a></li>
            </ul>
        </li>
        <li><a class="nav-link scrollto {{ $page == 'gallery' ? 'active' : '' }}" href="{{ route('guests.galerie') }}">GALERIE</a></li>
        <li><a class="nav-link scrollto {{ $page == 'contact' ? 'active' : '' }}" href="{{ route('guests.contact') }}">CONTACT</a></li>
        <li><a class="nav-link scrollto {{ $page == 'bureau' ? 'active' : '' }}" href="{{ route('guests.bureauDuCitoyen') }}">BUREAU DU CITOYEN</a></li>

        <div class="d-flex d-md-none sidebar-social">
            <span class="mail">
                <a class="nav-link custom-link" href=""><i class="bx bx-envelope"></i></a>
            </span>
            <span class="facebook">
                <a class="nav-link custom-link" href=""><i class="bx bxl-facebook"></i></a>
            </span>
            <span class="twitter">
                <a class="nav-link custom-link" href=""><i class="fab fa-x-twitter"></i></a>
            </span>
        </div>
        <div class="d-flex d-md-none sidebar-social">
            <span class="linkedin">
                <a class="nav-link custom-link" href=""><i class="bx bxl-linkedin"></i></a>
            </span>
            <span class="whatsapp">
                <a class="nav-link custom-link" href="https://wa.me/22890xxxxxx"><i class="bx bxl-whatsapp"></i></a>
            </span>
            <span class="instagram">
                <a class="nav-link custom-link" href=""><i class="bx bxl-instagram"></i></a>
            </span>
        </div>
    </ul>
    <span class="mobile-text-menu">MENU</span>
    <i class="bi bi-list mobile-nav-toggle"></i>
  </nav><!-- .navbar -->

<nav id="navMob"></nav>
