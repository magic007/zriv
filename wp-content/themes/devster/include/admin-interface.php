<?php

function mytheme_admin() {
	global $themename, $shortname, $options;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>

<div class="wrap" >
<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
<h2><?php echo $themename; ?> Options</h2>
<div id="poststuff" class="metabox-holder">
    <table class="widefat" >
    <?php foreach ($options as $value) {
      switch ( $value['type'] ) {
      case "text" :  ?>
        <tr>
        <th scope="row"><?php echo $value['name']; ?></th>
        <td>
          <input style="width:500px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
          <br /><small><?php echo $value['desc']; ?></small>
        </td>
        </tr>
      <?php 
      break;
      case "textarea" :  
      ?>
        <tr valign="top">
          <th scope="row"><?php echo $value['name']; ?>:</th>
          <td>
                <textarea style="width:500px;height:100px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" ><?php
                if( get_settings($value['id']) != "") {
                    echo stripslashes(get_settings($value['id']));
                  }else{
                    echo $value['std'];
                }?></textarea>
                <br /><?php echo $value['desc']; ?>
          </td>
        </tr>
        <?php 
        break;
        case "checkbox" : 
        ?>
        <tr valign="top">
          <th scope="row"><?php echo $value['name']; ?></th>
          <td>
              <?php if(get_settings($value['id'])){
                $checked = "checked=\"checked\"";
                  }else{
              $checked = "";
                }
            ?>
                <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                <?php echo $value['desc']; ?>
          </td>
        </tr>
        <?php 
        break;
        case  "select": 
        ?>
        <tr>
        <th scope="row"><?php echo $value['name']; ?></th>
        <td>
          <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
            <?php foreach ($value['options'] as $option) { ?>
              <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
            <?php } ?>
          </select>
          <br /><small><?php echo $value['desc']; ?></small>
        </td>
        </tr>        
        <?php 
        break;
        case "heading" :
        ?>
        <thead>
        <tr valign="top">
          <th colspan="2">
              <?php echo $value['name']; ?>
          </th>
        </tr>
        </thead>
        <?php
        break;
        }  
      }
  ?>
    </table>
<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>        
</div>
</form>
</div>

<?php
}

?>