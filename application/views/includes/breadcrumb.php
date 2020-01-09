
    <!-- Page-header start -->
    <?php 
    if(!empty($breadcrumb) && is_array($breadcrumb)){ ?>
    <div class="page-header card ">
        <div class="card-block info-breadcrumb">
            <h5 class="m-b-10 text-white"> <?php echo $title; ?> </h5>
            <!--<p class="text-muted m-b-10">lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
            <ul class="breadcrumb-title b-t-default p-t-10 text-white">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('dashboard')?>"> <i class="fa fa-home"></i> </a>
                </li>
                 <?php
                    if(!empty($breadcrumb) && is_array($breadcrumb)){
                        $breadcrumb=$breadcrumb;
                        if(!isset($breadcrumb['active'])){ $breadcrumb['active']=$title; }
                        foreach($breadcrumb as $link=>$crumb){
                            if($link=='active'){
                                echo '<li class="breadcrumb-item active" aria-current="page">'.$crumb.'</li>';
                            }
                            elseif($link==''){
                                echo '<li class="breadcrumb-item" >'.$crumb.'</li>';
                            }
                            else{
                                echo '<li class="breadcrumb-item"><a href="'.base_url($link).'">'.$crumb.'</a></li>';
                            }
                        }	
                    }
                ?>
            </ul>
        </div>
    </div>
    <?php } ?>
    <!-- Page-header end -->
   <!-- Notification Message -->
    <?php 
        $msg= $type  = $icon = $title = '';
        //$this->session->set_flashdata('msg','adsfd');
        if($this->session->flashdata('msg')!==NULL){
            $msg = $this->session->flashdata('msg');
            $type = "success";
            $icon = "check";					
        }
        if($this->session->flashdata('err_msg')!==NULL){
            $msg = $this->session->flashdata('err_msg');
            $type = "danger";
            $icon = "exclamation";					
        }
    ?>
  <button class="btn btn-<?php echo $type ?> waves-effect popup-msg hidden" data-type="<?php echo $type ?>" data-from="top" data-align="center" data-icon="fa fa-<?php echo $icon?>"><?php echo $msg ?></button>