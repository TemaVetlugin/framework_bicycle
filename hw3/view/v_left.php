<div class="d-flex flex-column flex-shrink-0 p-3 bg-light " style="width: 280px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Categories</span>
    </a>
   
    <hr>
    <ul class="nav nav-pills flex-column mb-auto dark-green">
      <?php foreach ($cats as $cat){?>
      <li>
        <a href="<?=HOME_PATH?>cat/<?=$cat['cat_id']?>" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          <?=$cat['category']?>
        </a>
      </li>
        <?php }?>


    </ul>
    <hr>
    <div class="dropdown m-auto">
       <a href="<?=HOME_PATH?>cat_add">Add category</a>
    </div>
  </div>