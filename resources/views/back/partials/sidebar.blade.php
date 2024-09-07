<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
        <ul>
            <li class="active">
                <a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="list-divider">
            </li>
            <li class="submenu">
                <a href="#"><i class="fas fa-edit"></i>
                <span> Articles</span>
                <span class="menu-arrow"></span>
                </a>
            <ul class="submenu_class" style="display: none">
                <li><a href="">Tous les articles </a></li>
                <li><a href="">Ajouter un article </a></li>
            </ul>
            <li><a href="all-comments.html"><i class="fe fe-table"></i> <span>Commentaires</span></a></li>
        </li>
        {{-- @can('admin-access') --}}
            <li class="submenu">
                <a href="#"><i class="fas fa-book"></i>
                    <span> Catégories</span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="submenu_class" style="display: none">
                    <li><a href="{{route('category.index')}}"> Toutes les catégories </a></li>
                    <li><a href="{{route('category.create')}}"> Ajouter une catégorie </a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="fas fa-user"></i> <span> Auteurs </span>
                <span class="menu-arrow"></span>
                </a>
                <ul class="submenu_class" style="display: none">
                    <li><a href="">Tous les auteurs </a></li>
                    <li><a href=""> Ajouter un auteur</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#"><i class="far fa-money-bill-alt"></i>
                    <span> Medias Sociaux </span> <span class="menu-arrow"></span>
                </a>
            <ul class="submenu_class" style="display: none">
                <li><a href="">Tous les medias </a></li>
                <li><a href="">Ajouter un media </a></li>
            </ul>
            </li>
        
            <li><a href="all-contacts.html"><i class="fe fe-table"></i> 
                <span>Contacts</span></a>
            </li>
            <li><a href=""><i class="fas fa-cog"></i>
                <span>Paramètres</span>
            </a>
            </li>
            <li class="submenu">
            <a href="#"><i class="fas fa-columns"></i> <span> Pages </span>
                <span class="menu-arrow"></span></a>
            <ul class="submenu_class" style="display: none">
                <li><a href="{{route('login')}}">Login </a></li>
                <li><a href="">Register </a></li>
                <li><a href="{{route('login')}}">Forgot Password </a></li>
                <li><a href="">Change Password </a></li>
                <li><a href="">Lockscreen </a></li>
                <li><a href="{{route('profile.edit')}}">Profile </a></li>
                <li><a href="gallery.html">Gallery </a></li>
                <li><a href="error-404.html">404 Error </a></li>
                <li><a href="error-500.html">500 Error </a></li>
                <li><a href="blank-page.html">Blank Page </a></li>
            </ul>
            </li>
        {{-- @endcan --}}
    </ul>
    </div>
</div>
</div>