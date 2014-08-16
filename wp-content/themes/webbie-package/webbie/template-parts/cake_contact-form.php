<?php 
/**
 * Template part for the theme-specific contact form
 *
 * @package WordPress
 * @subpackage Cake
 * @since Cake 1.0
 */

if(isset($emailSent) && $emailSent == true) { ?>

    <div class="thanks">
        <p class="thanksDood"><?php _e( 'Thanks', 'cake' ); ?>, <?php echo $name;?>!</p>
        <p><?php _e( 'Your email was successfully sent', 'cake' ); ?></p>
    </div>

<?php } else { ?>

        
    <?php if(isset($hasError) || isset($captchaError)) { ?>
        <p class="error"><?php _e( 'There was an error submitting the form.', 'cake' ); ?><p>
    <?php } ?>

    	<form action="<?php the_permalink(); ?>" id="cake_form"  class="mail" method="post">
            
            <p>
            	<label for="contactName"><?php _e( 'Name', 'cake' ); ?> <span class="hiliteColor embiggen">*</span></label>
                <input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="input requiredField  <?php if(isset($nameError) != '') { ?> error<?php } ?>" />
                <?php if(isset($nameError)) { ?>
                    <span class="error"><?php echo $nameError;?></span> 
                <?php } ?>
            </p>
            
            <p>
            	<label for="email"><?php _e( 'Email', 'cake' ); ?> <span class="hiliteColor embiggen">*</span></label>
                <input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="input requiredField email <?php if(isset($emailError) != '') { ?> error<?php } ?>"  />
                <?php if(isset($emailError)) { ?>
                    <span class="error"><?php echo $emailError;?></span>
                <?php } ?>
            </p>
            
            <p>
            	<label for="commentsText"><?php _e( 'Message', 'cake' ); ?> <span class="hiliteColor embiggen">*</span></label>
                <textarea name="comments" id="commentsText" rows="3" cols="30" class="message requiredField  <?php if(isset($commentError) != '') { ?> error<?php } ?>"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
                <?php if(isset($commentError)) { ?>
                    <span class="error"><?php echo $commentError;?></span> 
                <?php } ?>
            </p>
            
            
            <p class="send_copy clearfix">
                <input class="floatLeft" type="checkbox" name="sendCopy" id="sendCopy" value="true"<?php if(isset($_POST['sendCopy']) && $_POST['sendCopy'] == true) echo ' checked="checked"'; ?> />
                <label for="sendCopy" class="floatLeft">&nbsp; <?php _e( 'Send a copy of this email to yourself', 'cake' ); ?></label>
            </p>
            
            <br class="clearfloat" />
            
			<p>
                <input type="hidden" name="submitted" id="submitted" value="true" />
				<input type="submit" class="button blackButton" value="<?php _e( 'Submit', 'cake' ); ?>" />
			</p>
            
    </form>

<?php } ?>