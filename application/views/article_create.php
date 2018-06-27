<?php require_once '_layouts/header.php'?>

<?php 
    $user = array(
      'name'          =>  $this->session->userdata('name'),
      'membership'    =>  $this->session->userdata('membership'), 
      'id'            =>  $this->session->userdata('id')
      );
  ?>
  


    <section class="container">
        <!-- <form action="create" method="post"> -->
        <?php echo form_open('article/create');?>
        <?php  echo validation_errors();  ?>
       
            <!-- <div class="form-group">
                <label for="">標題</label>
                <input type="text" class="form-control" name="title">
            </div> -->
            <!-- <div class="form-group"> -->
                    <!-- <label for="">內容</label>
                    <input type="text" class="form-control" name="content"> -->
        <div class="input-group">
            <span class="input-group-addon" >內容</span>
            <input type="text" class="form-control" name="content" placeholder="訊息"
            required oninvalid="setCustomValidity('請輸入訊息')" oninput="setCustomValidity('')">
        </div>      
            <!-- </div> -->
            <!-- <div class="form-group"> -->
                <div><input type="submit" class="btn btn-primary"></div>
                
            <!-- </div> -->
           
       
        <input type="hidden" name="username" value="<?php echo $user['name'];?>">  
        <p><a href="<?= base_url('index.php/article/')?>"</a>返回</p>
        <?php echo form_close(); ?>
    </section>


<?php require_once '_layouts/footer.php'?>