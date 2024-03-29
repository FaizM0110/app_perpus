<aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu" aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark">
            <a href=".">
              <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="collapse navbar-collapse" id="sidebar-menu">
            <ul class="navbar-nav pt-lg-3">
              <li class="nav-item">
                <a class="nav-link" href="./" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                  </span>
                  <span class="nav-link-title">
                    Home
                  </span>
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('author.index') }}">
                      <span
                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        </span>
                        <span class="nav-link-title">
                            Author
                        </span>
                    </a>
                </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('publisher.index') }}">
                      <span
                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        </span>
                        <span class="nav-link-title">
                            Publisher
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('book.index') }}">
                      <span
                        class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        </span>
                        <span class="nav-link-title">
                            Book
                        </span>
                    </a>
                </li>
            </ul>
          </div>
        </div>
      </aside>