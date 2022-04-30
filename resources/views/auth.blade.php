<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- DESCRIPTION -->
    <meta
      name="description"
      content="Machine Lungs - Vapeshop, we sell only premium juice, high nic / salt nic / Flavory / Mentol / etc..."
    />

    <!-- FAVICON -->
    <link rel="icon" href="#" />
    <link rel="apple-touch-icon" href="#" />
    <link rel="manifest" href="manifest.webmanifest" />

    <!-- ICON -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset("css/general.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/nav.css") }}" />
    <link rel="stylesheet" href="{{ asset("css/auth.css") }}" />

    <title>Machine Lungs - Vapeshop</title>
  </head>
  <body>
    <!-- <header class="header section" data-nav>
      <div class="nav-bar">
        <figure><span class="logo">MACHINE LUNGS</span></figure>

        <div class="mobile-nav">
          <i id="theme-btn" class="ri-moon-line"></i>
          <i class="ri-arrow-down-s-line" data-nav-btn></i>
        </div>
      </div>

      <div class="separator"></div>

      <nav class="nav">
        <ul class="nav-list">
          <li>
            <a href="#" class="nav-link active" data-nav-link>Home</a>
          </li>

          <li>
            <a href="#" class="nav-link" data-nav-link>New</a>
          </li>

          <li>
            <a href="#" class="nav-link" data-nav-link>Shop</a>
          </li>

          <li><a href="#" class="nav-link" data-nav-link>Contact</a></li>
        </ul>
      </nav>
    </header> -->

    <section class="auth">
      <div class="login-form">
        <h1>Admin</h1>

        <form action="#" class="form">
          <div class="input-wrapper">
            <input
              type="email"
              class="form-input"
              placeholder="Email"
              required
            />
            <input
              type="password"
              class="form-input"
              placeholder="Password"
              required
            />
          </div>

          <button type="submit" class="form-btn" disabled>Log In</button>
        </form>
      </div>
    </section>

    <!-- !MAIN SCRIPT -->
    <script src="{{ asset("js/main.js") }}"></script>
  </body>
</html>
