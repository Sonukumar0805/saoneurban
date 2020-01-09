                                </div>
                            </div>
                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="<?php echo file_url('assets/js/jquery-ui/jquery-ui.min.js');?>"></script>
<script type="text/javascript" src="<?php echo file_url('assets/js/popper.js/popper.min.js');?>"></script>
<script type="text/javascript" src="<?php echo file_url('assets/js/bootstrap/js/bootstrap.min.js');?>"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="<?php echo file_url('assets/js/jquery-slimscroll/jquery.slimscroll.js');?>"></script>
<!-- modernizr js -->
<script type="text/javascript" src="<?php echo file_url('assets/js/modernizr/modernizr.js');?>"></script>
<script type="text/javascript" src="<?php echo file_url('assets/js/modernizr/css-scrollbars.js');?>"></script>

<!-- notification js -->
<script type="text/javascript" src="<?php echo file_url('assets/js/bootstrap-growl.min.js');?>"></script>
<script type="text/javascript" src="<?php echo file_url('assets/pages/notification/notification.js');?>"></script>
<!-- Custom js -->
<script type="text/javascript" src="<?php echo file_url('assets/js/script.js');?>"></script>
<script src="<?php echo file_url('assets/js/pcoded.min.js');?>"></script>
<script src="<?php echo file_url('assets/js/vartical-demo.js');?>"></script>
<script src="<?php echo file_url('assets/js/jquery.mCustomScrollbar.concat.min.js');?>"></script>
<?php
	if(!empty($bottom_script)){
	  foreach($bottom_script as $key=>$script){
		  if($key=="link"){
				if(is_array($script)){
					foreach($script as $single_script){
						echo "<script src='$single_script'></script>\n\t\t";
					}
				}
				else{
					echo "<script src='$script'></script>\n\t\t";
				}
		  }
		  elseif($key=="file"){
			if(is_array($script)){
				foreach($script as $single_script){
					echo "<script src='".file_url("$single_script")."'></script>\n\t\t";
				}
			}
			else{
				echo "<script src='".file_url("$script")."'></script>\n\t\t";
			}
		  }
	  }
	}
?>
</body>
</html>