<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('assets/images/logo.jpeg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EST-MONO 2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (session()->get('image'))
                    <img src="{{ asset('storage/app/public/' . session()->get('image')) }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('assets/images/avatar.svg') }}" class="img-circle elevation-2" alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="{{ route('admin.user.editConnectedUser') }}" class="d-block">{{ session()->get('name') }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.banniere.index') }}" class="nav-link {{ $page == 'admin.banner' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-image"></i>
                    <p>Bannières</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.about.index') }}" class="nav-link {{ $page == 'admin.about' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-info"></i>
                    <p>A Propos</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.motDuMaire.index') }}" class="nav-link {{ $page == 'admin.maire' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-paperclip"></i>
                    <p>Mot du maire</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.carte.index') }}" class="nav-link {{ $page == 'admin.carte' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-map-marker-alt"></i>
                    <p>Carte géographique</p>
                </a>
            </li>

            <li class="nav-item {{ $page == 'admin.mairie' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $page == 'admin.mairie' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        Mairie
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.civil.index') }}" class="nav-link {{ $page == 'admin.civil' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Etat Civil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.municipal.index') }}" class="nav-link {{ $page_item == 'admin.municipal' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Membres</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.organigramme.index') }}" class="nav-link {{ $page_item == 'admin.organigramme' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Organigramme</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.education.index') }}" class="nav-link {{ $page_item == 'admin.education' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Eduation</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.marches.index') }}" class="nav-link {{ $page_item == 'admin.marche' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Marchés publics</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.culture.index') }}" class="nav-link {{ $page_item == 'admin.culture' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Culture</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.mairie.environnement.index') }}" class="nav-link {{ $page_item == 'admin.environnement' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Environnement</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $page == 'admin.projects' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $page == 'admin.projects' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-project-diagram"></i>
                    <p>
                        Projets
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.project-type.index') }}" class="nav-link {{ $page_item == 'admin.projects.type' ? 'active' : '' }}">
                            <i class="fas fa-wrench nav-icon"></i>
                            <p>Types de projet</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.projects.index') }}" class="nav-link {{ $page_item == 'admin.projects.list' ? 'active' : '' }}">
                            <i class="fas fa-th-list nav-icon"></i>
                            <p>Liste des projets</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ $page == 'admin.actualites' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ $page == 'admin.actualites' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-building"></i>
                    <p>
                        Actualités
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.actualites.index') }}" class="nav-link {{ $page_item == 'actualites.presse' ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Actualité presse</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.actualites.videos.actuVideo') }}" class="nav-link {{ $page_item == 'actualites.videos' ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>Actualité vidéo</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.annonces.index') }}" class="nav-link {{ $page == 'admin.annonces' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-bell"></i>
                    <p>Annonces</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.galleries') }}" class="nav-link {{ $page == 'admin.gallery' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-images"></i>
                    <p>Galerie</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.street.index') }}" class="nav-link {{ $page == 'admin.streets' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-road"></i>
                    <p>Dans ma Rue</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.newsletter.index') }}" class="nav-link {{ $page == 'admin.newsletter' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>NewsLetter</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.questions.index') }}" class="nav-link {{ $page == 'admin.questions' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-question"></i>
                    <p>Foire aux questions</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.discussions.list') }}" class="nav-link {{ $page == 'admin.discussions' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-comments"></i>
                    <p>Discussions</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.user.admins') }}" class="nav-link {{ $page == 'admin.users' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>Administrateurs</p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
{{-- <span class="badge badge-info" id="DiscussionCount">{{ \App\Helpers\AdminDiscussionPending::count() }}</span> --}}
