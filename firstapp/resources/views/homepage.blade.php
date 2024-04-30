@include('header')

    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-7 py-3 py-md-5">
          <h1 class="display-3">Remember Writing?</h1>
          <p class="lead text-muted">Are you sick of short tweets and impersonal &ldquo;shared&rdquo; posts that are reminiscent of the late 90&rsquo;s email forwards? We believe getting back to actually writing is the key to enjoying the internet again.</p>
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="#" method="POST" id="registration-form">
            <div class="form-group">
              <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
              <input name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
              <input name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
            </div>

            <div class="form-group">
              <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
              <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
            </div>

            <div class="form-group">
              <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
              <input name="password" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" />
            </div>

            <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for OurApp</button>
          </form>
        </div>
      </div>
    </div>

    <!-- footer begins -->
    <footer class="border-top text-center small text-muted py-3">
      <p class="m-0">Copyright &copy; 2022 <a href="/" class="text-muted">OurApp</a>. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
      $('[data-toggle="tooltip"]').tooltip()
    </script>
  </body>
</html>