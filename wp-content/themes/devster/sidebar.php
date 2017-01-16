                        <div id="content-right">
                        	<div class="side-box">
                            <?php 
                            if (is_page()) {
                            $pageslist = get_pages('parent=-1');
                            foreach ($pageslist as $pageitem) {
                              if (is_page($pageitem->ID)) {
                                $pagetitle = get_the_title($pageitem->ID);
                                if (function_exists('dynamic_sidebar') && dynamic_sidebar("$pagetitle")) :  endif; 
                              }
                            }
                            } else {
                              if (function_exists('dynamic_sidebar') && dynamic_sidebar('General Sidebar')) : endif;                     
                            }
                            ?>                                    
                          </div>                                                        
                        </div>