<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?=HOME_PATH?>view/css/style.css" rel="stylesheet" type="text/css">

    <title><?=$title?></title>
</head>
<body>

    <header class="d-flex justify-content-center py-3">
    <div class="container">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="<?=HOME_PATH?>" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="<?=HOME_PATH?>add" class="nav-link">Add</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Categories</a></li>
        <?php if(!$registrated){?>
        <li class="nav-item"><a href="<?=HOME_PATH?>login" class="nav-link">LogIn</a></li>
        <li class="nav-item"><a href="<?=HOME_PATH?>reg" class="nav-link">Registration</a></li>
        <?php }else{?>
          <li class="nav-item"><a href="<?=HOME_PATH?>logout" class="nav-link">LogOut</a></li>
        <?php }?>
        
      </ul>
      </div>
    </header>
  

    <div class="container content">
    <?=$content?>
    </div>
  <footer class="row row-cols-5 py-5  border-top">
    <div class="col">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <p class=""></p>
    </div>

    <div class="col">

    </div>

    <div class="col">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">About</a></li>
      </ul>
    </div>

    <div class="col">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">About</a></li>
      </ul>
    </div>

    <div class="col">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 ">About</a></li>
      </ul>
    </div>
  </footer>
</div>
</body>
</html>