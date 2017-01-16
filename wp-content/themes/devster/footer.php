                     </div>
                	 <!-- END OF CONTENT -->
                     
                </div>
                <!-- END OF FRAME -->
        </div>
        <!-- END OF MAIN_CONTAINER -->
        
        <!-- BEGIN FOOTER -->
		<div id="bottom_container">
			<div id="footer">
				<div id="foot">
						<div class="left-foot">
             <?php
              $contactaddress = get_option('devster_info_address');
              $contactphone = get_option('devster_info_phone');
              $contactfax = get_option('devster_info_fax');
              $contactemail = get_option('devster_info_email');
              $footer_text = get_option('devster_footer_text');
             ?>						
            <?php echo ($contactaddress) ? $contactaddress : "14th Place, M1234 Heavenway, HW 5468, USA.";?><br />
Phone: <?php echo ($contactphone) ? $contactphone : "+62 4872 2894";?>, Fax: <?php echo ($contactfax) ? $contactfax : "+62 4872 2895";?>, Email: <?php echo ($contactemail) ? $contactemail : "info@devster.com";?><br />
              <?php echo ($footer_text) ? $footer_text : "Copyright &copy;2009 Devster. All Rights Reserved.";?>
            </div>
            <div class="right-foot">
            	<div id="twitter-code">                   
                    <p>Please wait, Loading my twitter <img src="<?php bloginfo('template_directory');?>/images/loading-tweet.gif" alt="Loading" class="icons" /></p>                    
              	</div>
            </div>
				</div>
			</div>
		</div>
		<!-- END OF FOOTER -->
     <?php wp_footer();?>  
</body>
</html>
