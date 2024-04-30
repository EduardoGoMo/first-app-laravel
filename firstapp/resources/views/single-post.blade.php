@include('header')

    <div class="container py-md-5 container--narrow">
      <div class="d-flex justify-content-between">
        <h2>Example Post Title Here</h2>
        <span class="pt-2">
          <a href="#" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="#" method="POST">
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </span>
      </div>

      <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="https://gravatar.com/avatar/f64fc44c03a8a7eb1d52502950879659?s=128" /></a>
        Posted by <a href="#">kittydoe</a> on 2/3/2019
      </p>

      <div class="body-content">
        <p>My roommate yells at me when I destroy things, but I do what I want.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam praesentium laboriosam unde fuga accusamus reiciendis laudantium quis consequatur, beatae temporibus nemo, tempora voluptatum, perspiciatis accusantium ullam molestiae cupiditate incidunt architecto.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam praesentium laboriosam unde fuga accusamus reiciendis laudantium quis consequatur, beatae temporibus nemo, tempora voluptatum, perspiciatis accusantium ullam molestiae cupiditate incidunt architecto.</p>
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
