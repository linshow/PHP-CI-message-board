<?php require_once '_layouts/header.php'?>

<?php 
    $user = array(
      'name'          =>  $this->session->userdata('name'),
      'membership'    =>  $this->session->userdata('membership'), 
      'id'            =>  $this->session->userdata('id')
      );
  ?>
  <?php
   foreach($record as $row){
      $id = $row->form_id;
      $name_1 = $row->name;
      $message_1 = $row->title;
      }
  ?>



    <section class="container">
        <form action="update" method="post">
        <div class="form-group">
                <label  for="">使用者</label>
                
                <h1 class="text-info" style="text-align:center"><?= $id->$form_id ?></h1>
            </div>
            <div class="form-group">
                <label for="">標題</label>
                <input type="text" class="form-control" name="title" value="<?= $message_1->title?>">
            </div>
            <!-- <div class="form-group">
                    <label for="">內容</label>
                    <input type="text" class="form-control" name="content" value="<?= $user->content?>">
                    <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                    
            </div> -->
            <div class="form-group">
               
                <input type="submit" class="btn btn-primary">
                
            </div>
        </form>
        <p><a href="<?= base_url('index.php/article/')?>"</a>返回</p>
    </section>



<?php require_once '_layouts/footer.php'?>