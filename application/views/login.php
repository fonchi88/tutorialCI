<?php echo validation_errors(); ?>
<?php $attributes = array('class' => 'login-form', 'id' => 'login-form'); ?>
<div class="login-page">
  <div class="form">
    <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <!--<form class="login-form" method="post" action="http://localhost/codeigniter/valida_usuario">--->
	  <?php echo form_open('valida_usuario',$attributes); ?>
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password"/>
      <input type="submit" value="<?=$btn_text?>">
      <p class="message"><?=$msg_text?> <a href="#"><?php echo $link_text ?></a></p>
    </form>
  </div>
</div>