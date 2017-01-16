<?php
/*
Template Name: Contact Form
*/
?>

<?php 
//If the form is submitted
if(isset($_POST['submitted'])) {

	//Check to see if the honeypot captcha field was filled in
	if(trim($_POST['checking']) !== '') {
		$captchaError = true;
	} else {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = '请输入您的昵称.';
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = '请输入您的邮箱.';
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = '邮箱格式不正确.';
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure that the name field is not empty
		if(trim($_POST['subject']) === '') {
			$subjectError = '请输入标题.';
			$hasError = true;
		} else {
			$subject = trim($_POST['subject']);
		}			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = '请输入内容.';
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {
      
      $info_email = get_option('devster_info_email');  
			$emailTo = $info_email;
			$subject = $subject;
			$sendCopy = trim($_POST['sendCopy']);
			$body = "Name: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From: My Site <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			if($sendCopy == true) {
				$subject = $subject;
				$headers = 'From: Your Site <noreply@yourdomain.com>';
				mail($emailTo, $subject, $body, $headers);
			}

			$emailSent = true;

		}
	}
} ?>

        
        <?php get_header();?>
          <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/contact-form.js"></script>
                       <div id="content-inner">
                        	<div id="head-top-inner">
                           		<div id="head-title-inner">
                                	<h2><?php the_title();?></h2><!-- Page title here -->
                            	</div>                            	
                      	  </div>                         
                          <div class="maincontent">
<?php if(isset($emailSent) && $emailSent == true) { ?>

                    	<div class="thanks">
                    		<h3>谢谢, <?=$name;?></h3>
                    		<p>您的邮件已被成功发送，我们会尽快回复。</p>
                    	</div>
                    
                    <?php } else { ?>
                    
                    	<?php if (have_posts()) : ?>
                    	
                    	<?php while (have_posts()) : the_post(); ?>
                    		<?php the_content(); ?>
                    		
                    		<?php if(isset($hasError) || isset($captchaError)) { ?>
                    			<p class="error">噢，出错了！<p>
                    		<?php } ?>
                    	
                    		<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
                    	
                    			<ol class="forms">
                    				<li><label for="contactName">昵称</label>
                    					<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="requiredField" />
                    					<?php if($nameError != '') { ?>
                    						<span class="error"><?=$nameError;?></span> 
                    					<?php } ?>
                    				</li>
                    				
                    			 <li><label for="email">邮箱</label>
                    					<input type="text" name="email" id="email-contact" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="requiredField email input" />
                    					<?php if($emailError != '') { ?>
                    						<span class="error"><?=$emailError;?></span>
                    					<?php } ?>
                    				</li>
                      			 <li><label for="subject">标题</label>
                    					<input type="text" name="subject" id="subject" value="<?php if(isset($_POST['subject']))  echo $_POST['subject'];?>" class="requiredField subject input" />
                    					<?php if($subjectError != '') { ?>
                    						<span class="error"><?=$subjectError;?></span>
                    					<?php } ?>
                    				</li>
                    				
                    				<li class="textarea"><label for="commentsText">内容</label>
                    					<textarea name="comments" id="commentsText" rows="20" cols="30" class="requiredField input"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                    					<?php if($commentError != '') { ?>
                    						<span class="error"><?=$commentError;?></span> 
                    					<?php } ?>
                    				</li>
                                    <!--				
                    				<li class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="<?php if(isset($_POST['checking']))  echo $_POST['checking'];?>" /></li>
                                    -->
                    				<li class="buttons"><input type="hidden" name="submitted" id="submitted" value="true" /><button type="submit" class="input-submit" ></button></li>                                    
                    			</ol>
                            </form>
                                        	
                          		<?php endwhile; ?>
                          	<?php endif; ?>
                          <?php } ?>
      
                       
                          </div>
                        </div>
<?php get_sidebar();?>
<?php get_footer();?>            