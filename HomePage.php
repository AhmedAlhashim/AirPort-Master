<?php
  require_once './Part/header.php'
?>

<div class="">
  <div class="row">
    <?php
    require_once './Part/menu.php'
    ?>
    <div class="col-10 pe-5 rounded pt-5 mt-5" style="text-align: justify;">
      <div>
        <h3 class="rounded-top ps-1 pb-1" >Home Page</h3>
      </div>
      <div class="overflow-auto container-fluid">
        <h4>Hello <?php echo $user['Fname'];?></h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos distinctio neque impedit qui quaerat architecto repudiandae in voluptatem? Animi autem vero asperiores rerum aliquid numquam, quia expedita quo laboriosam culpa.</p>
      </div>
      <div class="overflow-auto container-fluid">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos distinctio neque impedit qui quaerat architecto repudiandae in voluptatem? Animi autem vero asperiores rerum aliquid numquam, quia expedita quo laboriosam culpa.</p>
      </div>
      <div class="overflow-auto container-fluid">
        <h4>Staff</h4>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos distinctio neque impedit qui quaerat architecto repudiandae in voluptatem? Animi autem vero asperiores rerum aliquid numquam, quia expedita quo laboriosam culpa.</p>
      </div>
    <div class="card-group">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Miqdad Aljilwah</h5>
          <p class="card-text">ID: 201827560<br>Sec: 03</p>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos distinctio neque impedit qui quaerat architecto repudiandae in voluptatem?</p>
          <button class="btn" style="background-color: rgb(11, 140, 67); color: white;">Contact</button>
        </div>
      </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Khalid Alabbas</h5>
        <p class="card-text">ID: 201867020<br>Sec: 01</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos distinctio neque impedit qui quaerat architecto repudiandae in voluptatem?</p>
        <button class="btn" style="background-color: rgb(11, 140, 67); color: white;">Contact</button>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Ahmed Alhashim</h5>
        <p class="card-text">ID: 201857700<br>Sec: 03</p>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dignissimos distinctio neque impedit qui quaerat architecto repudiandae in voluptatem?</p>
        <button class="btn" style="background-color: rgb(11, 140, 67); color: white;">Contact</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php
  require_once './Part/footer.php'
?>