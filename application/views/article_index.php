<?php require_once '_layouts/header.php'?>

<?php 
   
    $user = array(
      'name'          =>  $this->session->userdata('name'),
      'membership'    =>  $this->session->userdata('membership'), 
      'id'            =>  $this->session->userdata('id')
      );
  ?>


<nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="/CodeIgniter-3.1.5/index.php/article/index">留言板</a>
        </div>

      <?php
        if($user['name'] != FALSE)
        {
          ?>
            <div class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar">
              <li><p class="navbar-text"><?php echo $user['name'], " 你好<br>";?></p></li>
              <li><a href="create_view">發佈新留言</a></li>
              
              <li><a href="/CodeIgniter-3.1.5/index.php/users/manage_view_user">管理帳號</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li><a href="/CodeIgniter-3.1.5/index.php/users/logout">登出帳號</a></li>
              </ul>
            </div>
           
          <?php
        }
        else
        {
          ?><ul class="nav navbar-nav navbar-right">
            <li><a href="/CodeIgniter-3.1.5/index.php/users/index">登入帳號</a></li>
            </ul>
          <?php
        }
        ?>
      </div>
    </nav>

      
    <section class ="container">
      <div class="example">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>編號</th>
            <th>使用者</th>                   
            <!-- <th>留言標題</th> -->
            <th>留言內容</th>
            <th>功能</th>    
          </tr>
        </thead>
        <tbody>　                   
          <?php if(isset($record)) : foreach($record as $row) : ?>
          <tr>
            <td><?php echo $row->form_id ?></td>
            <td><?php echo $row->name ?></td>
           
            <td><?php echo $row->content; ?></td>

            <?php 
            if($row->user_id == $user['id'] || $user['membership'] == 'admin')
            {?>
              <td>
                <form style="margin:0px; display:inline" action="update_view" method="post" >
                <input type="hidden" name="form_id" value="<?php echo $row->form_id ?>">
                <button type="submit" class="btn btn-info " aria-label="Left Align">編輯
                  <!-- <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> -->
                  
                </button>
            
                </form>
                
                <form style="margin:0px; display:inline" action="<?php echo base_url('/index.php/article/delete');?>" method="post">
                <input type="hidden" name="form_id" value="<?php echo $row->form_id ?>">
                <button type="submit" class="btn btn-danger" aria-label="Left Align">刪除
                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  
                </button>
                </form>
              </td>
                <?php
               }
                else
                  {?>
                    <td></td>
                    <?php
                  }
                    ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
              </table>
              </div>
              </section>
        <?php endif ; ?>
          


 <?php require_once '_layouts/footer.php'?>