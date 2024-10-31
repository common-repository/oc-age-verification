<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCAVP_admin_settings')) {

  class OCAVP_admin_settings {

    protected static $OCAVP_instance;
    /**
     * Registers ADL Post Slider post type.
     */

    function OCAVP_newmenu_page() {
        add_menu_page('Age Verify', 'Age Verify', 'manage_options', 'oc-age-verification', array($this, 'OCAVP_callback'), ' dashicons-lock');
    }

    function OCAVP_callback() {
    ?>    
        <div class="OCAVP-container">
            <div class="wrap">
                <h2><?php echo __( 'Age Verification', OCAVP_DOMAIN );?></h2>
                <?php if($_REQUEST['message'] == 'success'){ ?>
                    <div class="notice notice-success is-dismissible"> 
                        <p><strong>Record updated successfully.</strong></p>
                    </div>
                <?php } ?>
                <div class="ocavp-inner-block">
                    <form method="post" >
                        <?php wp_nonce_field( 'OCAVP_nonce_action', 'OCAVP_nonce_field' ); ?>
                        <ul class="tabs">
                            <li class="tab-link current" data-tab="ocavp-tab-general"><?php echo __( 'General Settings', OCAVP_DOMAIN );?></li>
                            <li class="tab-link" data-tab="ocavp-tab-layout"><?php echo __( 'Layout Settings', OCAVP_DOMAIN );?></li>
                            <li class="tab-link" data-tab="ocavp-tab-message"><?php echo __( 'Message Settings', OCAVP_DOMAIN );?></li>
                        </ul>
                        <div id="ocavp-tab-general" class="tab-content current">
                            <fieldset>
                                <p>
                                    <label>
                                        <?php
                                            $ocavp_enabled = empty(get_option( 'ocavp_enabled' )) ? 'no' : get_option( 'ocavp_enabled' );
                                        ?>
                                        <input type="checkbox" name="ocavp-enabled" value="yes" <?php if ($ocavp_enabled == "yes") {echo 'checked="checked"';} ?>><strong><?php echo __( 'Enable/Disable This Plugin', OCAVP_DOMAIN ); ?></strong>
                                    </label>
                                </p>
                                <div class="ocavp-top">
                                    <p class="ocavp-heading"><?php echo __( 'All Basic Settings', OCAVP_DOMAIN );?></p>
                                </div>
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Minimum age', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_minimumage = empty(get_option( 'ocavp_minimumage' )) ? 18 : get_option( 'ocavp_minimumage' );
                                                ?>
                                                <input type="number"  min="1" name="ocavp-minimumage" value="<?php echo $ocavp_minimumage; ?>" id="ocavp_minimumage" class="small-text ltr">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Restrict', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_restrict = empty(get_option( 'ocavp_restrict' )) ? 'all' : get_option( 'ocavp_restrict' );
                                                ?>
                                                <select name="ocavp-restrict" class="ocavp_restrict">
                                                    <option value="all" <?php if($ocavp_restrict == 'all'){ echo "selected";}?>>All content</option>
                                                    <option value="selectedcontent" <?php if($ocavp_restrict == 'selectedcontent'){ echo "selected";}?>>Selected Content</option>
                                                </select>
                                                <div class="ocavp_selecteddata" style="display: none;">
                                                    <?php
                                                        $ocavp_post_typess = empty(get_option( 'ocavp_post_type' )) ? array() : get_option( 'ocavp_post_type' );
                                                        $ocavp_args = array(
                                                                        'public'   => true
                                                                    );
                                                        $ocavp_output = 'names'; 
                                                        $ocavp_operator = 'and'; 
                                                        $ocavp_post_types = get_post_types( $ocavp_args, $ocavp_output, $ocavp_operator ); 
                                                        foreach ( $ocavp_post_types  as $ocavp_post_type ) { ?>
                                                            <label>
                                                                <input type="checkbox" name="ocavp_post_type[]" value="<?php echo $ocavp_post_type; ?>" <?php if(in_array($ocavp_post_type,$ocavp_post_typess)){echo "checked";} ?>><?php echo $ocavp_post_type; ?>
                                                            </label>
                                                        <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Remember Visitor ( in hours )', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_remember_visitor = empty(get_option( 'ocavp_remember_visitor' )) ? 725 : get_option( 'ocavp_remember_visitor' );
                                                ?>
                                                <input type="number"  min="1" name="ocavp-remember_visitor" value="<?php echo $ocavp_remember_visitor; ?>" id="ocavp_remember_visitor" class="small-text ltr">
                                                <p class="ocavp-tips"><?php echo __( "Note: Remember Visitor (set remember visitor time in hours)", OCAVP_DOMAIN );?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Redirect failures', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <input type="text" name="ocavp-redirectfailures" value="<?php echo get_option( 'ocavp_redirectfailures' ); ?>" id="ocavp_redirectfailures" class="regular-text">
                                                <p class="ocavp-tips"><?php echo __( "If someone fails the age test, redirect them to a page or external site.", OCAVP_DOMAIN );?></br><?php echo __( "Note: If This Field is empty then it not redirect page and showing errors.", OCAVP_DOMAIN );?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Age Verification Method', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_verification_method = empty(get_option( 'ocavp_verification_method' )) ? 'days' : get_option( 'ocavp_verification_method' );
                                                ?>
                                                <select name="ocavp_verification_method">
                                                    <option value="dd_mm_yy" <?php if($ocavp_verification_method == 'dd_mm_yy'){ echo "selected";}?>>Date of Birth Input(day / month / year)</option>
                                                    <option value="mm_dd_yy" <?php if($ocavp_verification_method == 'mm_dd_yy'){ echo "selected";}?>>Date of Birth Input(month / day / year)</option>
                                                    <option value="button_prompt" <?php if($ocavp_verification_method == 'button_prompt'){ echo "selected";}?>>Button Prompt(over age / under age)</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                        <div id="ocavp-tab-layout" class="tab-content">
                            <fieldset>
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Background Options', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php 
                                                    $ocavp_bgoption = empty(get_option( 'ocavp_bgoption' )) ? 'ocavp_bgimage' : get_option( 'ocavp_bgoption' );
                                                ?>
                                                <h2 class="ocavp-bgimage-title">
                                                    <input type="radio" name="ocavp_bgoption" value="ocavp_bgimage" <?php if($ocavp_bgoption == 'ocavp_bgimage'){ echo "checked";}?>>
                                                    <?php echo __( 'Background Images', OCAVP_DOMAIN );?>
                                                </h2>
                                                <div class="ocavp_imagebg_option">
                                                    <p class="ocavp-tips"><?php echo __( "Here you can select image for Background Cover Image", OCAVP_DOMAIN );?></p>
                                                    <?php
                                                        $ocavp_aveliable_background = empty(get_option( 'ocavp_aveliable_background' )) ? 'bg-1' : get_option( 'ocavp_aveliable_background' );
                                                    ?>
                                                    <div class="ocavp_all_images">
                                                        <ul>
                                                            <li <?php if($ocavp_aveliable_background == 'bg-1'){ echo "class='ocavp-active'";}?>>
                                                                <input type="radio" name="ocavp_aveliable_background" value="bg-1" <?php if($ocavp_aveliable_background == 'bg-1'){ echo "checked";}?>>
                                                                <img src="<?php echo OCWDD_PLUGIN_DIR .'/assets/images/bg-1.jpg';?>">
                                                            </li>
                                                            <li <?php if($ocavp_aveliable_background == 'bg-2'){ echo "class='ocavp-active'";}?>>
                                                                <input type="radio" name="ocavp_aveliable_background" value="bg-2" <?php if($ocavp_aveliable_background == 'bg-2'){ echo "checked";}?>>
                                                                <img src="<?php echo OCWDD_PLUGIN_DIR .'/assets/images/bg-2.jpg';?>">
                                                            </li>
                                                            <li <?php if($ocavp_aveliable_background == 'bg-3'){ echo "class='ocavp-active'";}?>>
                                                                <input type="radio" name="ocavp_aveliable_background" value="bg-3" <?php if($ocavp_aveliable_background == 'bg-3'){ echo "checked";}?>>
                                                                <img src="<?php echo OCWDD_PLUGIN_DIR .'/assets/images/bg-3.jpg';?>">
                                                            </li>
                                                            <li <?php if($ocavp_aveliable_background == 'bg-4'){ echo "class='ocavp-active'";}?>>
                                                                <input type="radio" name="ocavp_aveliable_background" value="bg-4" <?php if($ocavp_aveliable_background == 'bg-4'){ echo "checked";}?>>
                                                                <img src="<?php echo OCWDD_PLUGIN_DIR .'/assets/images/bg-4.jpg';?>">
                                                            </li>
                                                            <li <?php if($ocavp_aveliable_background == 'bg-5'){ echo "class='ocavp-active'";}?>>
                                                                <input type="radio" name="ocavp_aveliable_background" value="bg-5" <?php if($ocavp_aveliable_background == 'bg-5'){ echo "checked";}?>>
                                                                <img src="<?php echo OCWDD_PLUGIN_DIR .'/assets/images/bg-5.jpg';?>">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h2 class="ocavp-bgimage-title">
                                                    <input type="radio" name="ocavp_bgoption" value="ocavp_custombgimage" <?php if($ocavp_bgoption == 'ocavp_custombgimage'){ echo "checked";}?>>
                                                    <?php echo __( 'Background Custom Images', OCAVP_DOMAIN );?>
                                                </h2>
                                                <div class="ocavp_imagebg_option">
                                                    <p class="ocavp-tips"><?php echo __( "Upload your custom image", OCAVP_DOMAIN );?></p>
                                                    <?php  
                                                       echo $this->ocavp_image_uploader_field( 'ocavp_background',get_option( 'ocavp_backgroundimage1'));
                                                    ?>
                                                    </li><li>
                                                    <?php if(!empty(get_option( 'ocavp_backgroundimage' ))){ ?>
                                                    <img src="<?php echo get_option( 'ocavp_backgroundimage' ); ?>" width="50px" height="50px">
                                                    <a href="#" class="ocavp_remove_image_button">X</a>
                                                    <input type="hidden" name="ocavp_backgroundimage" class="ocavp_hidden_img" value="<?php echo get_option( 'ocavp_backgroundimage' ); ?>">
                                                    <?php } else {?>
                                                    <input type="hidden" name="ocavp_backgroundimage" class="ocavp_hidden_img" >
                                                    <?php } ?>
                                                    </li></ul></div>
                                                </div>
                                                <h2 class="ocavp-bgimage-title">
                                                    <input type="radio" name="ocavp_bgoption" value="ocavp_bgcolor" <?php if($ocavp_bgoption == 'ocavp_bgcolor'){ echo "checked";}?>>
                                                    <?php echo __( 'Background Color', OCAVP_DOMAIN );?>
                                                </h2>
                                                <div class="ocavp_imagebg_option">
                                                    <p class="ocavp-tips"><?php echo __( "Select Color for Background Here", OCAVP_DOMAIN );?></p>
                                                    <?php
                                                        $ocavp_backgroundcolor = empty(get_option( 'ocavp_backgroundcolor' )) ? '#a70b0d' : get_option( 'ocavp_backgroundcolor' );
                                                    ?>
                                                    <input type="color" name="ocavp-backgroundcolor" value="<?php echo $ocavp_backgroundcolor; ?>" id="ocavp_backgroundcolor">
                                                </div>
                                                <h2 class="ocavp-bgimage-title">
                                                    <input type="radio" name="ocavp_bgoption" value="ocavp_bgrgcolor" <?php if($ocavp_bgoption == 'ocavp_bgrgcolor'){ echo "checked";}?>>
                                                    <?php echo __( 'Gradient Color', OCAVP_DOMAIN );?>
                                                </h2>
                                                <div class="ocavp_imagebg_option">
                                                    <p class="ocavp-tips"><?php echo __( "Select Gradient Color for Background Here", OCAVP_DOMAIN );?></p>
                                                    <?php
                                                        $ocavp_gradientcolor = empty(get_option( 'ocavp_gradientcolor' )) ? '#a70b0d' : get_option( 'ocavp_gradientcolor' );
                                                        $ocavp_gradientcolor1 = empty(get_option( 'ocavp_gradientcolor1' )) ? '#000000' : get_option( 'ocavp_gradientcolor1' );
                                                    ?>
                                                    <input type="color" name="ocavp-gradientcolor" value="<?php echo $ocavp_gradientcolor; ?>" id="ocavp_gradientcolor">
                                                    <input type="color" name="ocavp-gradientcolor1" value="<?php echo $ocavp_gradientcolor1; ?>" id="ocavp_gradientcolor1">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Logo Image', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php  
                                                    echo $this->ocavp_logo_image_uploader_field('ocavp_logo1',get_option( 'ocavp_logoimage'));
                                                ?>
                                                </li><li>
                                                <?php if(!empty(get_option( 'ocavp_logoimage' ))){ ?>
                                                <img src="<?php echo get_option( 'ocavp_logoimage' ); ?>" width="50px" height="50px">
                                                <a href="#" class="ocavp_remove_limage_button">X</a>
                                                <input type="hidden" name="ocavp_logoimage" class="ocavp_hidden_logoimg" value="<?php echo get_option( 'ocavp_logoimage' ); ?>">
                                                <?php } else {?>
                                                <input type="hidden" name="ocavp_logoimage" class="ocavp_hidden_logoimg" >
                                                <?php } ?>
                                                </li></ul></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Title', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_title = empty(get_option( 'ocavp_title' )) ? 'Welcome!' : get_option( 'ocavp_title' );
                                            ?>
                                            <td>
                                                <input type="text" name="ocavp-title" value="<?php echo $ocavp_title; ?>" id="ocavp_title" class="regular-text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Title color', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_titlecolor = empty(get_option( 'ocavp_titlecolor' )) ? '#ffffff' : get_option( 'ocavp_titlecolor' );
                                            ?>
                                            <td>
                                                <input type="color" name="ocavp-titlecolor" value="<?php echo $ocavp_titlecolor; ?>" id="ocavp_titlecolor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Title Size', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_titlesize = empty(get_option( 'ocavp_titlesize' )) ? 30 : get_option( 'ocavp_titlesize' );
                                            ?>
                                            <td>
                                                <input type="number" name="ocavp-titlesize" value="<?php echo $ocavp_titlesize; ?>" id="ocavp_titlesize" min="1" class="small-text ltr">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Title Position', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_titleposition = empty(get_option( 'ocavp_titleposition' )) ? 'center' : get_option( 'ocavp_titleposition' );
                                                ?>
                                                <select name="ocavp-titleposition">
                                                    <option value="left" <?php if($ocavp_titleposition == 'left'){ echo "selected";}?>>Left</option>
                                                    <option value="right" <?php if($ocavp_titleposition == 'right'){ echo "selected";}?>>Right</option>
                                                    <option value="center" <?php if($ocavp_titleposition == 'center'){ echo "selected";}?>>Center</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Title Style', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_styleposition = empty(get_option( 'ocavp_styleposition' )) ? 'bold' : get_option( 'ocavp_styleposition' );
                                                ?>
                                                <select name="ocavp-styleposition">
                                                    <option value="bold" <?php if($ocavp_styleposition == 'bold'){ echo "selected";}?>>Bold</option>
                                                    <option value="normal" <?php if($ocavp_styleposition == 'normal'){ echo "selected";}?>>Normal</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Sub Title', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_subtitle = empty(get_option( 'ocavp_subtitle' )) ? 'Please submit your date of birth to enter.' : get_option( 'ocavp_subtitle' );
                                            ?>
                                            <td>
                                                <input type="text" name="ocavp-subtitle" value="<?php echo $ocavp_subtitle; ?>" id="ocavp_subtitle" class="regular-text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Sub Title color', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_subtitlecolor = empty(get_option( 'ocavp_subtitlecolor' )) ? '#ffffff' : get_option( 'ocavp_subtitlecolor' );
                                            ?>
                                            <td>
                                                <input type="color" name="ocavp-subtitlecolor" value="<?php echo $ocavp_subtitlecolor; ?>" id="ocavp_subtitlecolor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Sub Title Size', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_subtitlesize = empty(get_option( 'ocavp_subtitlesize' )) ? 15 : get_option( 'ocavp_subtitlesize' );
                                            ?>
                                            <td>
                                                <input type="number" name="ocavp-subtitlesize" value="<?php echo $ocavp_subtitlesize; ?>" id="ocavp_subtitlesize" min="1" class="small-text ltr">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Sub Title Position', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_subtitleposition = empty(get_option( 'ocavp_subtitleposition' )) ? 'center' : get_option( 'ocavp_subtitleposition' );
                                                ?>
                                                <select name="ocavp-subtitleposition">
                                                    <option value="left" <?php if($ocavp_subtitleposition == 'left'){ echo "selected";}?>>Left</option>
                                                    <option value="right" <?php if($ocavp_subtitleposition == 'right'){ echo "selected";}?>>Right</option>
                                                    <option value="center" <?php if($ocavp_subtitleposition == 'center'){ echo "selected";}?>>Center</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Sub Title Style', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <td>
                                                <?php
                                                    $ocavp_substyleposition = empty(get_option( 'ocavp_substyleposition' )) ? 'normal' : get_option( 'ocavp_substyleposition' );
                                                ?>
                                                <select name="ocavp-substyleposition">
                                                    <option value="bold" <?php if($ocavp_substyleposition == 'bold'){ echo "selected";}?>>Bold</option>
                                                    <option value="normal" <?php if($ocavp_substyleposition == 'normal'){ echo "selected";}?>>Normal</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Button Text', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_buttontext = empty(get_option( 'ocavp_buttontext' )) ? 'Submit' : get_option( 'ocavp_buttontext' );
                                            ?>
                                            <td>
                                                <input type="text" name="ocavp-buttontext" value="<?php echo $ocavp_buttontext; ?>" id="ocavp_buttontext" class="regular-text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Button Text Color', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_buttontextcolor = empty(get_option( 'ocavp_buttontextcolor' )) ? '#ffffff' : get_option( 'ocavp_buttontextcolor' );
                                            ?>
                                            <td>
                                                <input type="color" name="ocavp-buttontextcolor" value="<?php echo $ocavp_buttontextcolor; ?>" id="ocavp_buttontextcolor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Button Background Color', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_buttonbgcolor = empty(get_option( 'ocavp_buttonbgcolor' )) ? '#000000' : get_option( 'ocavp_buttonbgcolor' );
                                            ?>
                                            <td>
                                                <input type="color" name="ocavp-buttonbgcolor" value="<?php echo $ocavp_buttonbgcolor; ?>" id="ocavp_buttonbgcolor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Button Text Size', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_buttontextsize = empty(get_option( 'ocavp_buttontextsize' )) ? 15 : get_option( 'ocavp_buttontextsize' );
                                            ?>
                                            <td>
                                                <input type="number" name="ocavp-buttontextsize" value="<?php echo $ocavp_buttontextsize; ?>" id="ocavp_buttontextsize" min="1" class="small-text ltr">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                        <div id="ocavp-tab-message" class="tab-content">
                            <fieldset>
                                <table class="form-table">
                                    <tbody>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Error Message', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_errormessage = empty(get_option( 'ocavp_errormessage' )) ? 'You are not old enough to view this content' : get_option( 'ocavp_errormessage' );
                                            ?>
                                            <td>
                                                <input type="text" name="ocavp-errormessage" value="<?php echo $ocavp_errormessage; ?>" id="ocavp_errormessage" class="regular-text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Error Message color', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_errormessagecolor = empty(get_option( 'ocavp_errormessagecolor' )) ? '#FF0000' : get_option( 'ocavp_errormessagecolor' );
                                            ?>
                                            <td>
                                                <input type="color" name="ocavp-errormessagecolor" value="<?php echo $ocavp_errormessagecolor; ?>" id="ocavp_errormessagecolor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Error Message Size', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_errormessagesize = empty(get_option( 'ocavp_errormessagesize' )) ? 15 : get_option( 'ocavp_errormessagesize' );
                                            ?>
                                            <td>
                                                <input type="number" name="ocavp-errormessagesize" value="<?php echo $ocavp_errormessagesize; ?>" id="ocavp_errormessagesize" min="1" class="small-text ltr">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Success Message', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_successmessage = empty(get_option( 'ocavp_successmessage' )) ? 'You are successfully logged in' : get_option( 'ocavp_successmessage' );
                                            ?>
                                            <td>
                                                <input type="text" name="ocavp-successmessage" value="<?php echo $ocavp_successmessage; ?>" id="ocavp_successmessage" class="regular-text">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Success Message color', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_successmessagecolor = empty(get_option( 'ocavp_successmessagecolor' )) ? '#008000' : get_option( 'ocavp_successmessagecolor' );
                                            ?>
                                            <td>
                                                <input type="color" name="ocavp-successmessagecolor" value="<?php echo $ocavp_successmessagecolor; ?>" id="ocavp_successmessagecolor">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">
                                                <label><?php echo __( 'Success Message Size', OCAVP_DOMAIN );?></label>
                                            </th>
                                            <?php
                                                $ocavp_successmessagesize = empty(get_option( 'ocavp_successmessagesize' )) ? 15 : get_option( 'ocavp_successmessagesize' );
                                            ?>
                                            <td>
                                                <input type="number" name="ocavp-successmessagesize" value="<?php echo $ocavp_successmessagesize; ?>" id="ocavp_successmessagesize" min="1" class="small-text ltr">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                        <input type="hidden" name="OCAVP_action" value="OCAVP_save_option_data"/>
                        <input type="submit" value="Save changes" name="submit" class="button-primary" id="ocavp-btn-space">
                    </form> 
                </div>
            </div>
        </div>
    <?php
    }

    //Upload Background Image function
    function ocavp_image_uploader_field( $name, $value = '') {
        $image = ' button">Upload image';
        $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
        $display = 'none'; // display state ot the "Remove image" button
     
        if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
     
            $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;" />';
            $display = 'inline-block';    
        } 
        
        return '
            <div class="ocavp_image_upload"><ul><li><a href="#" class="ocavp_upload_image_button' . $image . '</a>
            <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
            </li>
            ';
    }

    //Upload Logo Image function
    function ocavp_logo_image_uploader_field( $name, $value = '') {
        $image = ' button">Upload image';
        $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
        $display = 'none'; // display state ot the "Remove image" button
     
        if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
     
            $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;" />';
            $display = 'inline-block';    
        } 

        return '
            <div class="ocavp_image_upload"><ul><li><a href="#" class="ocavp_upload_limage_button' . $image . '</a>
            <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" /></li>';
    }

    // For multiple value
    function recursive_sanitize_text_field($array) {
        foreach ( $array as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = $this->recursive_sanitize_text_field($value);
            }else{
                $value = sanitize_text_field( $value );
            }
        }
            return $array;
    }

    // Save Setting Option
    function OCAVP_save_options(){
        if( current_user_can('administrator') ) { 
            if($_REQUEST['OCAVP_action'] == 'OCAVP_save_option_data'){
                if(!isset( $_POST['OCAVP_nonce_field'] ) || !wp_verify_nonce( $_POST['OCAVP_nonce_field'], 'OCAVP_nonce_action' ) ){
                    print 'Sorry, your nonce did not verify.';
                    exit;
                }else{

                    $ocavp_enabled = (!empty(sanitize_text_field( $_REQUEST['ocavp-enabled'] )))? sanitize_text_field( $_REQUEST['ocavp-enabled'] ) : 'no';
                    update_option('ocavp_enabled',$ocavp_enabled, 'yes');

                    $ocavp_minimumage = (!empty(sanitize_text_field( $_REQUEST['ocavp-minimumage'] )))? sanitize_text_field( $_REQUEST['ocavp-minimumage'] ) : 18;
                    update_option('ocavp_minimumage',$ocavp_minimumage, 'yes');

                    $ocavp_restrict = (!empty(sanitize_text_field( $_REQUEST['ocavp-restrict'] )))? sanitize_text_field( $_REQUEST['ocavp-restrict'] ) : 'all';
                    update_option('ocavp_restrict',$ocavp_restrict, 'yes');
                    
                    update_option('ocavp_post_type',$this->recursive_sanitize_text_field($_REQUEST['ocavp_post_type']), 'yes');

                    $ocavp_remember_visitor = (!empty(sanitize_text_field( $_REQUEST['ocavp-remember_visitor'] )))? sanitize_text_field( $_REQUEST['ocavp-remember_visitor'] ) : 725;
                    update_option('ocavp_remember_visitor',$ocavp_remember_visitor, 'yes');

                    update_option('ocavp_redirectfailures',sanitize_text_field( $_REQUEST['ocavp-redirectfailures'] ), 'yes');

                    update_option('ocavp_verification_method',sanitize_text_field( $_REQUEST['ocavp_verification_method'] ), 'yes');

                    $ocavp_errormessage = (!empty(sanitize_text_field( $_REQUEST['ocavp-errormessage'] )))? sanitize_text_field( $_REQUEST['ocavp-errormessage'] ) : 'You are not old enough to view this content';
                    update_option('ocavp_errormessage',$ocavp_errormessage, 'yes');

                    $ocavp_errormessagecolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-errormessagecolor'] )))? sanitize_text_field( $_REQUEST['ocavp-errormessagecolor'] ) : '#FF0000';
                    update_option('ocavp_errormessagecolor',$ocavp_errormessagecolor, 'yes');

                    $ocavp_errormessagesize = (!empty(sanitize_text_field( $_REQUEST['ocavp-errormessagesize'] )))? sanitize_text_field( $_REQUEST['ocavp-errormessagesize'] ) : 15;
                    update_option('ocavp_errormessagesize',$ocavp_errormessagesize, 'yes');

                    $ocavp_successmessage = (!empty(sanitize_text_field( $_REQUEST['ocavp-successmessage'] )))? sanitize_text_field( $_REQUEST['ocavp-successmessage'] ) : 'You are successfully logged in';
                    update_option('ocavp_successmessage',$ocavp_successmessage, 'yes');

                    $ocavp_successmessagecolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-successmessagecolor'] )))? sanitize_text_field( $_REQUEST['ocavp-successmessagecolor'] ) : '#008000';
                    update_option('ocavp_successmessagecolor',$ocavp_successmessagecolor, 'yes');

                    $ocavp_successmessagesize = (!empty(sanitize_text_field( $_REQUEST['ocavp-successmessagesize'] )))? sanitize_text_field( $_REQUEST['ocavp-successmessagesize'] ) : 15;
                    update_option('ocavp_successmessagesize',$ocavp_successmessagesize, 'yes');

                    $ocavp_backgroundcolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-backgroundcolor'] )))? sanitize_text_field( $_REQUEST['ocavp-backgroundcolor'] ) : '#a70b0d';
                    update_option('ocavp_backgroundcolor',$ocavp_backgroundcolor, 'yes');

                    $ocavp_gradientcolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-gradientcolor'] )))? sanitize_text_field( $_REQUEST['ocavp-gradientcolor'] ) : '#a70b0d';
                    update_option('ocavp_gradientcolor',$ocavp_gradientcolor, 'yes');

                    $ocavp_gradientcolor1 = (!empty(sanitize_text_field( $_REQUEST['ocavp-gradientcolor1'] )))? sanitize_text_field( $_REQUEST['ocavp-gradientcolor1'] ) : '#000000';
                    update_option('ocavp_gradientcolor1',$ocavp_gradientcolor1, 'yes');

                    $ocavp_bgoption = (!empty(sanitize_text_field( $_REQUEST['ocavp_bgoption'] )))? sanitize_text_field( $_REQUEST['ocavp_bgoption'] ) : 'ocavp_bgimage';
                    update_option('ocavp_bgoption',$ocavp_bgoption, 'yes');

                    $ocavp_aveliable_background = (!empty(sanitize_text_field( $_REQUEST['ocavp_aveliable_background'] )))? sanitize_text_field( $_REQUEST['ocavp_aveliable_background'] ) : 'bg-1';
                    update_option('ocavp_aveliable_background',$ocavp_aveliable_background, 'yes');

                    $ocavp_title = (!empty(sanitize_text_field( $_REQUEST['ocavp-title'] )))? sanitize_text_field( $_REQUEST['ocavp-title'] ) : 'Welcome!';
                    update_option('ocavp_title',$ocavp_title, 'yes');

                    $ocavp_titlecolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-titlecolor'] )))? sanitize_text_field( $_REQUEST['ocavp-titlecolor'] ) : '#ffffff';
                    update_option('ocavp_titlecolor',$ocavp_titlecolor, 'yes');

                    $ocavp_titlesize = (!empty(sanitize_text_field( $_REQUEST['ocavp-titlesize'] )))? sanitize_text_field( $_REQUEST['ocavp-titlesize'] ) : 30;
                    update_option('ocavp_titlesize',$ocavp_titlesize, 'yes');

                    $ocavp_titleposition = (!empty(sanitize_text_field( $_REQUEST['ocavp-titleposition'] )))? sanitize_text_field( $_REQUEST['ocavp-titleposition'] ) : 'center';
                    update_option('ocavp_titleposition',$ocavp_titleposition, 'yes');

                    $ocavp_styleposition = (!empty(sanitize_text_field( $_REQUEST['ocavp-styleposition'] )))? sanitize_text_field( $_REQUEST['ocavp-styleposition'] ) : 'bold';
                    update_option('ocavp_styleposition',$ocavp_styleposition, 'yes');

                    $ocavp_subtitle = (!empty(sanitize_text_field( $_REQUEST['ocavp-subtitle'] )))? sanitize_text_field( $_REQUEST['ocavp-subtitle'] ) : 'Please submit your date of birth to enter.';
                    update_option('ocavp_subtitle',$ocavp_subtitle, 'yes');

                    $ocavp_subtitlecolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-subtitlecolor'] )))? sanitize_text_field( $_REQUEST['ocavp-subtitlecolor'] ) : '#ffffff';
                    update_option('ocavp_subtitlecolor',$ocavp_subtitlecolor, 'yes');

                    $ocavp_subtitlesize = (!empty(sanitize_text_field( $_REQUEST['ocavp-subtitlesize'] )))? sanitize_text_field( $_REQUEST['ocavp-subtitlesize'] ) : 15;
                    update_option('ocavp_subtitlesize',$ocavp_subtitlesize, 'yes');

                    $ocavp_subtitleposition = (!empty(sanitize_text_field( $_REQUEST['ocavp-subtitleposition'] )))? sanitize_text_field( $_REQUEST['ocavp-subtitleposition'] ) : 'center';
                    update_option('ocavp_subtitleposition',$ocavp_subtitleposition, 'yes');

                    $ocavp_substyleposition = (!empty(sanitize_text_field( $_REQUEST['ocavp-substyleposition'] )))? sanitize_text_field( $_REQUEST['ocavp-substyleposition'] ) : 'normal';
                    update_option('ocavp_substyleposition',$ocavp_substyleposition, 'yes');

                    $ocavp_buttontext = (!empty(sanitize_text_field( $_REQUEST['ocavp-buttontext'] )))? sanitize_text_field( $_REQUEST['ocavp-buttontext'] ) : 'Submit';
                    update_option('ocavp_buttontext',$ocavp_buttontext, 'yes');

                    $ocavp_buttontextcolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-buttontextcolor'] )))? sanitize_text_field( $_REQUEST['ocavp-buttontextcolor'] ) : '#ffffff';
                    update_option('ocavp_buttontextcolor',$ocavp_buttontextcolor, 'yes');

                    $ocavp_buttonbgcolor = (!empty(sanitize_text_field( $_REQUEST['ocavp-buttonbgcolor'] )))? sanitize_text_field( $_REQUEST['ocavp-buttonbgcolor'] ) : '#000';
                    update_option('ocavp_buttonbgcolor',$ocavp_buttonbgcolor, 'yes');

                    $ocavp_buttontextsize = (!empty(sanitize_text_field( $_REQUEST['ocavp-buttontextsize'] )))? sanitize_text_field( $_REQUEST['ocavp-buttontextsize'] ) : 15;
                    update_option('ocavp_buttontextsize',$ocavp_buttontextsize, 'yes');

                    //if(!empty($_REQUEST['ocavp_backgroundimage'])){
                       update_option('ocavp_backgroundimage',sanitize_text_field( $_REQUEST['ocavp_backgroundimage'] ), 'yes');
                    //}

                    //if(!empty($_REQUEST['ocavp_logoimage'])){
                       update_option('ocavp_logoimage',sanitize_text_field( $_REQUEST['ocavp_logoimage'] ), 'yes');
                    //}

                    wp_redirect( admin_url( 'admin.php?page=oc-age-verification&message=success') ); exit;

                }
            }
        }
    }

    function init() {
        add_action( 'admin_menu',  array($this, 'OCAVP_newmenu_page'));
        add_action( 'admin_init',  array($this, 'OCAVP_save_options'));
    }

    public static function OCAVP_instance() {
      if (!isset(self::$OCAVP_instance)) {
        self::$OCAVP_instance = new self();
        self::$OCAVP_instance->init();
      }
      return self::$OCAVP_instance;
    }

  }

  OCAVP_admin_settings::OCAVP_instance();
}

