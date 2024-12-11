<footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Restez informés</h4>
            <p>Inscrivez-vous à la newsletter</p>
            <form action="{{ route('guests.subscribeToNewsletter') }}" method="post">
              @csrf
              <input type="email" name="email"placeholder="Entrer votre email">
              <input type="submit" value="S'inscrire">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
        <div class="footer-top-filter">
            <div class="container">
                <div class="row">

                  <div class="col-lg-3 col-md-6 footer-contact">
                     <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo.jpeg') }}" alt="" style="max-height: 180px;"></a>
                      <br>
                    <p><br> 225 BP 19 Elavagnon.<br>
                       <br><br>
                      <strong>Téléphone:</strong> +228 90 86 68 91<br>
                      <strong>Email:</strong> communestmo2@gmail.com<br>
                    </p>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-links">
                    <h4>liens vers:</h4>
                    <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.welcome') }}">Accueil</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.about') }}">A propos de la commune de Est-Mono 2</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.services.etatCivil') }}">Etat Civil</a></li>
                      {{-- <li><i class="bx bx-chevron-right"></i> <a href="#">Commune</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="#">Projets</a></li> --}}
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.actualites.index') }}">Actualités</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.galerie') }}">Galerie</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.contact') }}">Contacts</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.bureauDuCitoyen') }}">Bureau du citoyen</a></li>
                    </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Commune</h4>
                    <ul>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.lois') }}">Lois organisationnelles</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.municipal') }}">Conseil municipal</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.opportuniteAff') }}">Opportunités d'affaires</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.commissions') }}">Commissions permanentes</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.organigramme') }}">Organigramme</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.cantonQuartier') }}">Cantons et quartiers</a></li>
                      <li><i class="bx bx-chevron-right"></i> <a href="{{ route('guests.mairie.decouverte.index') }}">A la decouverte de la commune</a></li>
                    </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Nos réseaux</h4>
                    <p>Suivez-nous sur nos réseaux </p>
                    <div class="social-links mt-3">
                      <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                      <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                      <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                      <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                  </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright<strong><span>2022</span></strong>, tous droits reservés <br>
        Développé par Innovation & Digital Group
      </div>

    </div>
</footer>
