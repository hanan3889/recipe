<footer>
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
                <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                </a>
                <img src="{{asset('front/img/logo.webp')}}" alt="logo Casserole en folie" width="auto" height="50">
            </div>

            <div class="col mb-3">
                <h5>Liens utiles</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary"  href="{{ url('/') }}" >Accueil</a></li>
                    <li><a class="link-secondary"  href="{{ url('/login') }}">Se connecter</a></li>
                    <li><a class="link-secondary"  href="{{ url('/register') }}">Créer un compte</a></li>
                </ul>
            </div>

            <div class="col mb-3">
                <h5>A propos de nous</h5>
                <p class="text-body-secondary">{{$settings->about}}</p>
            </div>

            <div class="col mb-3">
                <h5>Nous contacter</h5>
                <p>{{$settings->address}}</p>
                <p>{{$settings->phone}}</p>
                <p>{{$settings->email}}</p>
            </div>
        </div>
    </div>
</footer>


