<?php

if (!defined('ABSPATH'))
  exit;

if (!class_exists('OCAVP_front_action')) {

  class OCAVP_front_action {

    /**
    * Constructor.
    *
    * @version 3.2.3
    */
    public $ocavp_enabled,$ocavp_restrict,$ocavp_post_type,$ocavp_bgoption,$ocavp_aveliable_background,$ocavp_gradientcolor,$ocavp_gradientcolor1,$ocavp_backgroundcolor,$ocavp_backgroundimage,$ocavp_title,$ocavp_titlecolor,$ocavp_titlesize,$ocavp_titleposition,$ocavp_styleposition,$ocavp_subtitle,$ocavp_subtitlecolor,$ocavp_subtitlesize,$ocavp_subtitleposition,$ocavp_substyleposition,$ocavp_logoimage,$ocavp_buttontext,$ocavp_buttontextcolor,$ocavp_buttonbgcolor,$ocavp_buttontextsize,$ocavp_verification_method,$ocavp_minimumage,$ocavp_errormessage,$ocavp_errormessagecolor,$ocavp_errormessagesize,$ocavp_successmessage,$ocavp_successmessagecolor,$ocavp_successmessagesize,$ocavp_redirectfailures,$ocavp_remember_visitor;

    function __construct() {
        //Enable Plugin
        if ( 'yes' === get_option( 'ocavp_enabled') ) {
            $this->ocavp_enabled = get_option('ocavp_enabled');

            //Get value restrict
            if ( !empty(get_option( 'ocavp_restrict')) ) {
               $this->ocavp_restrict = get_option('ocavp_restrict');
            }

            //Get value of post type
            if ( !empty(get_option( 'ocavp_post_type')) ) {
               $this->ocavp_post_type = get_option('ocavp_post_type');
            }
            //Get value background color
            if ( !empty(get_option( 'ocavp_backgroundcolor')) ) {
               $this->ocavp_backgroundcolor = get_option('ocavp_backgroundcolor');
            }

            //Get value background option
            if ( !empty(get_option( 'ocavp_bgoption')) ) {
               $this->ocavp_bgoption = get_option('ocavp_bgoption');
            }

            //Get value aveliable image background
            if ( !empty(get_option( 'ocavp_aveliable_background')) ) {
               $this->ocavp_aveliable_background = get_option('ocavp_aveliable_background');
            }

            //Get value background gradient color
            if ( !empty(get_option( 'ocavp_gradientcolor')) ) {
               $this->ocavp_gradientcolor = get_option('ocavp_gradientcolor');
            }

            //Get value background gradient color1
            if ( !empty(get_option( 'ocavp_gradientcolor1')) ) {
               $this->ocavp_gradientcolor1 = get_option('ocavp_gradientcolor1');
            }

            //Get value background image url
            if ( !empty(get_option( 'ocavp_backgroundimage')) ) {
               $this->ocavp_backgroundimage = get_option('ocavp_backgroundimage');
            }

            //Get value title
            if ( !empty(get_option( 'ocavp_title')) ) {
               $this->ocavp_title = get_option('ocavp_title');
            }

            //Get value title color
            if ( !empty(get_option( 'ocavp_titlecolor')) ) {
               $this->ocavp_titlecolor = get_option('ocavp_titlecolor');
            }

            //Get value title size
            if ( !empty(get_option( 'ocavp_titlesize')) ) {
               $this->ocavp_titlesize = get_option('ocavp_titlesize');
            }
 
            //Get value title position
            if ( !empty(get_option( 'ocavp_titleposition')) ) {
               $this->ocavp_titleposition = get_option('ocavp_titleposition');
            }

            //Get value title style position
            if ( !empty(get_option( 'ocavp_styleposition')) ) {
               $this->ocavp_styleposition = get_option('ocavp_styleposition');
            } 

            //Get value sub title
            if ( !empty(get_option( 'ocavp_subtitle')) ) {
               $this->ocavp_subtitle = get_option('ocavp_subtitle');
            }

            //Get value sub title color
            if ( !empty(get_option( 'ocavp_subtitlecolor')) ) {
               $this->ocavp_subtitlecolor = get_option('ocavp_subtitlecolor');
            }

            //Get value sub title size
            if ( !empty(get_option( 'ocavp_subtitlesize')) ) {
               $this->ocavp_subtitlesize = get_option('ocavp_subtitlesize');
            }
 
            //Get value sub title position
            if ( !empty(get_option( 'ocavp_subtitleposition')) ) {
               $this->ocavp_subtitleposition = get_option('ocavp_subtitleposition');
            }

            //Get value sub title style position
            if ( !empty(get_option( 'ocavp_substyleposition')) ) {
               $this->ocavp_substyleposition = get_option('ocavp_substyleposition');
            } 

            //Get value logo image
            if ( !empty(get_option( 'ocavp_logoimage')) ) {
               $this->ocavp_logoimage = get_option('ocavp_logoimage');
            } 

            //Get value Button Text
            if ( !empty(get_option( 'ocavp_buttontext')) ) {
               $this->ocavp_buttontext = get_option('ocavp_buttontext');
            }

            //Get value Button Text color
            if ( !empty(get_option( 'ocavp_buttontextcolor')) ) {
               $this->ocavp_buttontextcolor = get_option('ocavp_buttontextcolor');
            }

            //Get value Button Background color
            if ( !empty(get_option( 'ocavp_buttonbgcolor')) ) {
               $this->ocavp_buttonbgcolor = get_option('ocavp_buttonbgcolor');
            }
 
            //Get value Button Text size
            if ( !empty(get_option( 'ocavp_buttontextsize')) ) {
               $this->ocavp_buttontextsize = get_option('ocavp_buttontextsize');
            }

            //Get value verification method
            if ( !empty(get_option( 'ocavp_verification_method')) ) {
               $this->ocavp_verification_method = get_option('ocavp_verification_method');
            }

            //Get value age
            if ( !empty(get_option( 'ocavp_minimumage')) ) {
               $this->ocavp_minimumage = get_option('ocavp_minimumage');
            }

            //Get error message
            if ( !empty(get_option( 'ocavp_errormessage')) ) {
               $this->ocavp_errormessage = get_option('ocavp_errormessage');
            }

            //Get error message color
            if ( !empty(get_option( 'ocavp_errormessagecolor')) ) {
               $this->ocavp_errormessagecolor = get_option('ocavp_errormessagecolor');
            }

            //Get error message size
            if ( !empty(get_option( 'ocavp_errormessagesize')) ) {
               $this->ocavp_errormessagesize = get_option('ocavp_errormessagesize');
            }

            //Get success message
            if ( !empty(get_option( 'ocavp_successmessage')) ) {
               $this->ocavp_successmessage = get_option('ocavp_successmessage');
            }

            //Get success message color
            if ( !empty(get_option( 'ocavp_successmessagecolor')) ) {
               $this->ocavp_successmessagecolor = get_option('ocavp_successmessagecolor');
            }

            //Get success message size
            if ( !empty(get_option( 'ocavp_successmessagesize')) ) {
               $this->ocavp_successmessagesize = get_option('ocavp_successmessagesize');
            }

            //Get redirect failures
            if ( !empty(get_option( 'ocavp_redirectfailures')) ) {
               $this->ocavp_redirectfailures = get_option('ocavp_redirectfailures');
            }

            //Get value remember visitor
            if ( !empty(get_option( 'ocavp_remember_visitor')) ) {
               $this->ocavp_remember_visitor = get_option('ocavp_remember_visitor');
            }

        }

    }

    protected static $OCAVP_instance;


    function ocavp_footer_custom_script(){
    ?>
    <script type="text/javascript">

      var ocavp_enabled = "<?php echo $this->ocavp_enabled; ?>";
      var ocavp_posttype = "<?php echo get_post_type(); ?>";
      var ocavp_restrict = "<?php echo $this->ocavp_restrict; ?>";
      var ocavp_post_type = <?php echo json_encode($this->ocavp_post_type, true);?>;

      function ocavp_verfication_layout(){
            var ocavp_bgoption = "<?php echo $this->ocavp_bgoption; ?>";
            var ocavp_aveliable_background = "<?php echo $this->ocavp_aveliable_background; ?>";
            var ocavp_gradientcolor = "<?php echo $this->ocavp_gradientcolor; ?>";
            var ocavp_gradientcolor1 = "<?php echo $this->ocavp_gradientcolor1; ?>";
            var ocavp_backgroundcolor = "<?php echo $this->ocavp_backgroundcolor; ?>";
            var ocavp_backgroundimage = "<?php echo $this->ocavp_backgroundimage; ?>";
            var ocavp_title = "<?php echo $this->ocavp_title; ?>";
            var ocavp_titlecolor = "<?php echo $this->ocavp_titlecolor; ?>";
            var ocavp_titlesize = "<?php echo $this->ocavp_titlesize; ?>";
            var ocavp_titleposition = "<?php echo $this->ocavp_titleposition; ?>";
            var ocavp_styleposition = "<?php echo $this->ocavp_styleposition; ?>";
            var ocavp_subtitle = "<?php echo $this->ocavp_subtitle; ?>";
            var ocavp_subtitlecolor = "<?php echo $this->ocavp_subtitlecolor; ?>";
            var ocavp_subtitlesize = "<?php echo $this->ocavp_subtitlesize; ?>";
            var ocavp_subtitleposition = "<?php echo $this->ocavp_subtitleposition; ?>";
            var ocavp_substyleposition = "<?php echo $this->ocavp_substyleposition; ?>";
            var ocavp_logoimage = "<?php echo $this->ocavp_logoimage; ?>";
            var ocavp_buttontext = "<?php echo $this->ocavp_buttontext; ?>";
            var ocavp_buttontextcolor = "<?php echo $this->ocavp_buttontextcolor; ?>";
            var ocavp_buttonbgcolor = "<?php echo $this->ocavp_buttonbgcolor; ?>";
            var ocavp_buttontextsize = "<?php echo $this->ocavp_buttontextsize; ?>";
            var ocavp_verification_method = "<?php echo $this->ocavp_verification_method; ?>";
            var ocavp_minimumage = "<?php echo $this->ocavp_minimumage; ?>";
            var ocavp_errormessage = "<?php echo $this->ocavp_errormessage; ?>";
            var ocavp_errormessagecolor = "<?php echo $this->ocavp_errormessagecolor; ?>";
            var ocavp_errormessagesize = "<?php echo $this->ocavp_errormessagesize; ?>";
            var ocavp_successmessage = "<?php echo $this->ocavp_successmessage; ?>";
            var ocavp_successmessagecolor = "<?php echo $this->ocavp_successmessagecolor; ?>";
            var ocavp_successmessagesize = "<?php echo $this->ocavp_successmessagesize; ?>";
            var ocavp_redirectfailures = "<?php echo $this->ocavp_redirectfailures; ?>";
            var ocavp_remember_visitor = "<?php echo $this->ocavp_remember_visitor; ?>";
            var ocavplogoimage = '';
            jQuery(document).ready(function(){
              jQuery('body').addClass('ocavp_container');
              if(ocavp_bgoption == 'ocavp_bgimage'){
                 var ocavp_box_container = jQuery("<div />",{class: "ocavp_box_container", css: {"background-image":"url(<?php echo OCWDD_PLUGIN_DIR;?>/assets/images/"+ocavp_aveliable_background+".jpg)", "background-repeat": "no-repeat", "background-size": "cover"}});
              } else if(ocavp_bgoption == 'ocavp_custombgimage'){
                var ocavp_box_container = jQuery("<div />",{class: "ocavp_box_container", css: {"background-image":"url("+ocavp_backgroundimage+")", "background-repeat": "no-repeat", "background-size": "cover"}});
              } else if(ocavp_bgoption == 'ocavp_bgcolor'){
                  var ocavp_box_container = jQuery("<div />",{class: "ocavp_box_container", css: {"background-color":ocavp_backgroundcolor}});
              } else if(ocavp_bgoption == 'ocavp_bgrgcolor'){
                  var ocavp_box_container = jQuery("<div />",{class: "ocavp_box_container", css: {"background":'linear-gradient(-90deg,'+ ocavp_gradientcolor +','+ ocavp_gradientcolor1 +')'}});
              }
              jQuery('body').append(ocavp_box_container);
              ocavpageverificationmain = jQuery("<div />",{class: "ocavp-age-verification-main"});
              jQuery(".ocavp_box_container").append(ocavpageverificationmain);
              var ocavpagevtitle = jQuery("<div />",{class: "ocavp-agev-title", html : ocavp_title, css: {"color":ocavp_titlecolor, "font-size": ocavp_titlesize+"px", "text-align": ocavp_titleposition, "font-weight": ocavp_styleposition}});
              var ocavpagevsubtitle = jQuery("<div />",{class: "ocavp-agev-subtitle", html : ocavp_subtitle, css: {"color":ocavp_subtitlecolor, "font-size": ocavp_subtitlesize+"px", "text-align": ocavp_subtitleposition, "font-weight": ocavp_substyleposition}});
              if(ocavp_logoimage != ''){
                var logoimage = jQuery("<img />",{class: "logo-image", src: ocavp_logoimage});
                ocavplogoimage = jQuery("<div />",{class: "ocavp-logo-image"});
                ocavplogoimage.append(logoimage);
              }

              var logoimage = jQuery("<img />",{class: "logo-image", src: ocavp_logoimage});
              var agecheckerDate = jQuery("<div />",{class: "agechecker_Date"});

              var agecheckerDay = jQuery("<select />",{class: "agechecker_Day", name: "agechecker_Day"});
              jQuery('<option />', {value: "", text: "DD" }).appendTo(agecheckerDay); 
              for(var n = 1; n <= 31; n++) {
                jQuery('<option />', {value: n, text: n }).appendTo(agecheckerDay); 
              }
              var agecheckerMonth = jQuery("<select />",{class: "agechecker_Month", name: "agechecker_Month"});
              jQuery('<option />', {value: "", text:"MM" }).appendTo(agecheckerMonth); 
              for(var n = 1; n <= 12; n++) {
                jQuery('<option />', {value: n, text: n }).appendTo(agecheckerMonth); 
              }
              var d = new Date();
              var year = d.getFullYear();
              var agecheckerYear = jQuery("<select />",{class: "agechecker_Year", name: "agechecker_Year"});
              jQuery('<option />', {value: "", text:"YYYY" }).appendTo(agecheckerYear); 
              for(var n = 1960; n <= year; n++) {
                jQuery('<option />', {value: n, text: n }).appendTo(agecheckerYear); 
              }

              var ocavp_submit_btn = jQuery("<button />",{class: "ocavp_submit_btn", name:"ocavp_submit_btn", html:ocavp_buttontext, css:{"color":ocavp_buttontextcolor,"background-color":ocavp_buttonbgcolor,"font-size":ocavp_buttontextsize+"px"}});
              if(ocavp_verification_method === 'dd_mm_yy' ){
                agecheckerDate.append(agecheckerDay,agecheckerMonth,agecheckerYear,ocavp_submit_btn);
              } else if(ocavp_verification_method === 'mm_dd_yy' ){
                agecheckerDate.append(agecheckerMonth,agecheckerDay,agecheckerYear,ocavp_submit_btn);
              } else if(ocavp_verification_method === 'button_prompt'){
                var ocavp_submit_right = jQuery("<button />",{class: "ocavp_submit_right", name:"ocavp_submit_btn", html:"I am over "+ocavp_minimumage, css:{"color":ocavp_buttontextcolor,"background-color":ocavp_buttonbgcolor,"font-size":ocavp_buttontextsize+"px"}});
                var ocavp_submit_wrong = jQuery("<button />",{class: "ocavp_submit_wrong", name:"ocavp_submit_btn", html:'Exit', css:{"color":ocavp_buttontextcolor,"background-color":ocavp_buttonbgcolor,"font-size":ocavp_buttontextsize+"px"}});
                agecheckerDate.append(ocavp_submit_right,ocavp_submit_wrong);

              }
              jQuery(".ocavp-age-verification-main").append(ocavpagevtitle,ocavpagevsubtitle,ocavplogoimage,agecheckerDate);

              jQuery('body').on('click', '.ocavp_submit_wrong', function(e){
                window.history.back();
                  if(window.parent != null) { //has a parent opener
                        setTimeout(window.close, 150);
                  }
              });

              //valid age
              jQuery('body').on('click', '.ocavp_submit_right', function(e){
                  var date = new Date();
                  var hours = ocavp_remember_visitor;
                  date.setTime(date.getTime() + ( hours * 60 * 60 * 1000));
                  setCookie("ocavp_c_val", 'false', date);
                  window.setTimeout(function() {
                      jQuery("body").removeClass( "ocavp_container" );
                      jQuery(".ocavp_box_container").remove();
                  }, 1000);
              });

              //check age validation by date
              jQuery('body').on('click', '.ocavp_submit_btn', function(e){
                  var agechecker_Day = jQuery('.agechecker_Day').val();
                  var agechecker_Month = jQuery('.agechecker_Month').val();
                  var agechecker_Year = jQuery('.agechecker_Year').val();
                  if ( jQuery( ".ocavp_errorMessage" ).length ) {
                      jQuery( ".ocavp_errorMessage" ).hide();
                  }
                  if(agechecker_Day != '' && agechecker_Month != '' && agechecker_Year != '' ){
                      if ( jQuery( ".ocavp_errorMessage" ).length ) {
                            jQuery( ".ocavp_errorMessage" ).hide();
                      }
                      var date = new Date();
                      var currentyear = date.getFullYear();
                      var age = (currentyear - agechecker_Year);
                      if(ocavp_minimumage <= age){
                        var date = new Date();
                        var hours = ocavp_remember_visitor;
                        date.setTime(date.getTime() + ( hours * 60 * 60 * 1000));
                        setCookie("ocavp_c_val", 'false', date);
                        var errorMessage = jQuery("<div />",{class: "ocavp_errorMessage",html:ocavp_successmessage, css: {"color":ocavp_successmessagecolor, "font-size": ocavp_successmessagesize+"px"}});
                        window.setTimeout(function() {
                          jQuery("body").removeClass( "ocavp_container" );
                          jQuery(".ocavp_box_container").remove();
                        }, 1000);
                      } else {
                        var errorMessage = jQuery("<div />",{class: "ocavp_errorMessage",html:ocavp_errormessage, css: {"color":ocavp_errormessagecolor, "font-size": ocavp_errormessagesize+"px"}});
                          if(ocavp_redirectfailures != ''){
                            window.setTimeout(function() {
                                window.location.href = ocavp_redirectfailures;
                            }, 1000);
                          }
                      }
                  } else {
                     var errorMessage = jQuery("<div />",{class: "ocavp_errorMessage",html:"select Valid Date", css: {"color":ocavp_errormessagecolor, "font-size": ocavp_errormessagesize+"px"}});
                  }
                    ocavpageverificationmain.append(ocavpagevtitle,ocavpagevsubtitle,ocavplogoimage,errorMessage,agecheckerDate);

                  });

            })
      } 
      if(ocavp_enabled === 'yes' && getCookie("ocavp_c_val") == ''){
        if(ocavp_restrict == 'selectedcontent' && !!~jQuery.inArray(ocavp_posttype,ocavp_post_type)){
            ocavp_verfication_layout();
        } else if(ocavp_restrict == 'all'){
          ocavp_verfication_layout();
        } 
      }

      function setCookie(cname,cvalue,date) {
        var expires = "expires=" + date.toGMTString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }

      function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
            while (c.charAt(0) == ' ') {
              c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
            }
        }
        return "";
      }

    </script>
    <?php  
    }

    function init() {
        add_action( 'wp_footer',  array($this, 'ocavp_footer_custom_script'));
    }
         
    public static function OCAVP_instance() {
      if (!isset(self::$OCAVP_instance)) {
        self::$OCAVP_instance = new self();
        self::$OCAVP_instance->init();
      }
      return self::$OCAVP_instance;
    }

  }

  OCAVP_front_action::OCAVP_instance();
}

?>
