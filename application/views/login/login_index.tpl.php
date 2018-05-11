<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PSIAI 2018</title>

    <!-- Bootstrap core CSS -->
    <link href="application/views/_common/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="application/views/_common/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="POST" action="index.php?module=login&page=login_submit">
      <img class="mb-4" src="https://cdn.cm.com/cm/cm.png" alt="" width="140" height="140">
      <h1 class="h3 mb-3 font-weight-normal">Zaloguj się</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Hasło</label>
      <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Hasło" required>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Zaloguj się</button>
      <p class="mt-5 mb-3 text-muted">Company Manager &copy; 2018</p>
    </form>
  </body>
</html>
