<?php
session_start();
if ( $_SESSION['user'] == "") {
	 header("location: index.php");
}

 include_once "../config.php";
 include_once "includes/heder.php";


?>
<!-- *************************************************************************************************************************************** -->

			<div class="main-content">
					
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Slider
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									
								</small>
								<?php
                                  if (isset($_GET['uploaded'])) {
                                  	   switch ($_GET['uploaded']) {
                                  	   	case 'success':
                                  	     echo "<h2 style='color:blue;margin-left:300px;'>Uspesno ste uradili upload slike</h2>";
                                  	   		break;
                                  	   	
                                  	   	default:
                                  	   		
                                  	   	
                                  	   }
                                  }

								?>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-7">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<ul class="ace-thumbnails clearfix slider">
										
                                       <?php
                                        // IZLISTAVAM IZ BAZE SVE SLIKE SLAJDERA
                                           $slajderAll = Slider::get();
                                          
                                           foreach($slajderAll as $key => $item){
                                       ?>
										<!--****************************ovo je slika*******************************  -->
										<li>
											
                                                 <a href="#"><img src="../<?=$item->slika_slajder; ?>" alt="autobusi" style="width:100%;"></a>
												<div class="text">

												</div>
											</a>

											<div class="tools tools-bottom">
							
                                              
												<a href="sliderForma.php?chng_img=<?=$item->id;?>">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="?delete_slider=<?=$item->id;?>">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>
										</li>
                                          <!--****************************ovo je slika*******************************  -->
									
                                         <?php }?> 
								</ul>
							</div><!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->

							<?php
							      if (isset($_GET['delete_slider'])) {
							          $delet_slider = Slider::delete("id = ". $_GET['delete_slider']);
							        
							      }

							?>
            
							<!-- FORMA -->
							<div class="col-md-5" id="main">
							<div class="naslovForme">
							<h2>Dodaj novi slajder </h2>
							</div>
								<form method="post" action="action.php" enctype="multipart/form-data" class="form-horizontal">
									  
									  <div class="form-group">
									    <label for="slider_img" class="col-sm-2 foto_drzava">Fotografija</label>
									    <div class="col-sm-4">
									      <input type="file" class="foto_drzava" name="slider_img" placeholder="Dodaj sliku" value="">
									      
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="slider_url" class="col-sm-2 control-label">lilnk</label>
									    <div class="col-sm-8">
									      <input type="text" class="form-control" name="slider_url" placeholder="http://www." value="">
									    </div>
									  </div>
									  
									  <div class="form-group">
									    <div class="col-sm-offset-2 col-sm-10">
									   
									      <button type="submit" class="btn btn-default" name="insr_slider" >Dodaj</button>&nbsp;&nbsp;
									      <button type="reset" class="btn btn-default" name="upd_slider" >Reset</button>
									    </div>
									  </div>
									</form>

							</div><!-- col md 5 -->
							<?php 
				
						?>
                          

				
 
<!-- ****************************************************************************************************************************************** -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<?php
		
                    
			include_once "includes/footer.php";