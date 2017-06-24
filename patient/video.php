<!DOCTYPE html>
<?php
include('../include/dbconnection.php');
include("head.php");
?>

<html>
<head>
	<script src="sliderengine/jquery.js">
	</script>
	<script src="sliderengine/amazingslider.js">
	</script>
	<link href="sliderengine/amazingslider-1.css" rel="stylesheet" type="text/css">
	<script src="sliderengine/initslider-1.js">
	</script>
</head>

<body>
	<div id="top">
	
			<div style="min-height:100%;">
				

				<div class="container-fluid mybanner">
					<div class="bg-color">
						<?php
				include("navig.php");
				?>

						<div class="container" style="padding: 2%;">
							
							<?php
							$name=$url=$url1=$url2='';
							    if(isset($_POST['vUpload']))
							    {
							        $name=$_POST['vName'];
							        $url=$_POST['vUrl'];
							        $url1= substr($url,-13);
							        $url2=substr($url,-11);
							    }
							    if (!empty($name)&&!empty($url))
							    {
							        $sql = "insert ignore into video values ('','$name','$url1')";
							        mysqli_query($connect,$sql);
							    } 
							    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
							    $offset_row = mysqli_fetch_object( $offset_result ); 
							    $offset = $offset_row->offset;
							    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
							    $row1=mysqli_fetch_assoc($result1); 
							?>

							<form action="" method="post">
								<div class="container">
									<div class="row">
										<div class="col-md-7">
											<input class="form-control" name="term" placeholder="Search for videos.." type="text">
										</div>

										<div class="col-md-5">
											<input class="btn btn-primary" type="submit" value="Search">
										</div>
									</div>
								</div>
							</form>
							<?php
							if (!empty($_REQUEST['term'])) {
							$term = mysqli_real_escape_string($connect,$_REQUEST['term']);     
							$sql = "SELECT * FROM video WHERE Name LIKE '%".$term."%'"; 
							$query=mysqli_query($connect,$sql); 
							while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){  
							echo '<embed  src="https://www.youtube.com/embed/'.substr($row['Url'],-11).'?'.$row['Url'].'" width="250" height="150"></embed>&nbsp';
							}  
							}
							?>

							<div class="container">
								<div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:1100px;padding-left:0px; padding-right:274px;margin:0px auto 0px;">
									<div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
										<ul class="amazingslider-slides" style="display:none;">
											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/Ns1DPvXVO6I?v=Ns1DPvXVO6I" target="_self"><img alt="first" src="images/Ns1DPvXVO6I.jpg" title="first"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/pwRCn_lkxeQ?v=pwRCn_lkxeQ&list=PLN-YyAER9Buu9TWgugBjqaQhJ8sceugAe" target="_self"><img alt="second" src="images/pwRCn_lkxeQ.jpg" title="second"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/WJ14hgHzES8?v=WJ14hgHzES8&index=3&list=PLN-YyAER9Buu9TWgugBjqaQhJ8sceugAe" target="_self"><img alt="third" src="images/WJ14hgHzES8.jpg" title="third"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/CJt7XySKqYI?v=CJt7XySKqYI&list=PLN-YyAER9Buu9TWgugBjqaQhJ8sceugAe&index=4" target="_self"><img alt="fourth" src="images/CJt7XySKqYI.jpg" title="fourth"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/45Ztpmkwqvg?v=45Ztpmkwqvg&index=6&list=PLN-YyAER9Buu9TWgugBjqaQhJ8sceugAe" target="_self"><img alt="fifth" src="images/45Ztpmkwqvg.jpg" title="fifth"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/Ovsw7tdneqE?v=Ovsw7tdneqE&list=PLvd0isBh6beQJ1YrlssqzKoXY_aw-qvoW" target="_self"><img alt="sixth" src="images/Ovsw7tdneqE.jpg" title="sixth"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/yQgih6KAwLU?v=yQgih6KAwLU&index=2&list=PLvd0isBh6beQJ1YrlssqzKoXY_aw-qvoW" target="_self"><img alt="seventh" src="images/yQgih6KAwLU.jpg" title="seventh"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/PhH9a0kIwmk?v=PhH9a0kIwmk&list=PLvd0isBh6beQJ1YrlssqzKoXY_aw-qvoW&index=3" target="_self"><img alt="eighth" src="images/PhH9a0kIwmk.jpg" title="eighth"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/L06DNMRcy98?v=L06DNMRcy98&index=4&list=PLvd0isBh6beQJ1YrlssqzKoXY_aw-qvoW" target="_self"><img alt="ninth" src="images/L06DNMRcy98.jpg" title="ninth"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/QrueP382UjY?v=QrueP382UjY&index=5&list=PLvd0isBh6beQJ1YrlssqzKoXY_aw-qvoW" target="_self"><img alt="tenth" src="images/QrueP382UjY.jpg" title="tenth"></a>
											</li>


											<li>
												<a class="html5lightbox" data-height="540" data-width="960" href="https://www.youtube.com/embed/jvGC_dQJUtE?v=jvGC_dQJUtE&list=PLvd0isBh6beQJ1YrlssqzKoXY_aw-qvoW&index=6" target="_self"><img alt="eleventh" src="images/jvGC_dQJUtE.jpg" title="eleventh"></a>
											</li>
										</ul>


										<ul class="amazingslider-thumbnails" style="display:none;">
											<li><img alt="first" src="images/Ns1DPvXVO6I-tn.jpg" title="first">
											</li>


											<li><img alt="second" src="images/pwRCn_lkxeQ-tn.jpg" title="second">
											</li>


											<li><img alt="third" src="images/WJ14hgHzES8-tn.jpg" title="third">
											</li>


											<li><img alt="fourth" src="images/CJt7XySKqYI-tn.jpg" title="fourth">
											</li>


											<li><img alt="fifth" src="images/45Ztpmkwqvg-tn.jpg" title="fifth">
											</li>


											<li><img alt="sixth" src="images/Ovsw7tdneqE-tn.jpg" title="sixth">
											</li>


											<li><img alt="seventh" src="images/yQgih6KAwLU-tn.jpg" title="seventh">
											</li>


											<li><img alt="eighth" src="images/PhH9a0kIwmk-tn.jpg" title="eighth">
											</li>


											<li><img alt="ninth" src="images/L06DNMRcy98-tn.jpg" title="ninth">
											</li>


											<li><img alt="tenth" src="images/QrueP382UjY-tn.jpg" title="tenth">
											</li>


											<li><img alt="eleventh" src="images/jvGC_dQJUtE-tn.jpg" title="eleventh">
											</li>
										</ul>
									</div>
								</div>
							</div>
							<br>


							<div class="row">
								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];echo 'sdf';?>" width='250'>
								</div>
								<?php
								    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
								    $offset_row = mysqli_fetch_object( $offset_result ); 
								    $offset = $offset_row->offset;
								    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
								    $row1=mysqli_fetch_assoc($result1);?>

								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
								<?php 
								    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
								    $offset_row = mysqli_fetch_object( $offset_result ); 
								    $offset = $offset_row->offset;
								    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
								    $row1=mysqli_fetch_assoc($result1);?>

								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
								<?php 
								    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
								    $offset_row = mysqli_fetch_object( $offset_result ); 
								    $offset = $offset_row->offset;
								    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
								    $row1=mysqli_fetch_assoc($result1);?>

								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
							</div>
							<br>


							<div class="row">
								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
								<?php
								    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
								    $offset_row = mysqli_fetch_object( $offset_result ); 
								    $offset = $offset_row->offset;
								    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
								    $row1=mysqli_fetch_assoc($result1);?>

								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
								<?php 
								    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
								    $offset_row = mysqli_fetch_object( $offset_result ); 
								    $offset = $offset_row->offset;
								    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
								    $row1=mysqli_fetch_assoc($result1);?>

								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
								<?php 
								    $offset_result = mysqli_query( $connect," SELECT FLOOR(RAND() * COUNT(*)) AS `offset` FROM `video`");
								    $offset_row = mysqli_fetch_object( $offset_result ); 
								    $offset = $offset_row->offset;
								    $result1 = mysqli_query($connect, " SELECT * FROM `video` LIMIT $offset, 1 " );
								    $row1=mysqli_fetch_assoc($result1);?>

								<div class="col-md-3">
									<embed height="150" src="https://www.youtube.com/embed/<?php echo substr($row1['Url'],-11).'?'.$row1['Url'];?>" width='250'>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				
			</div>
		
	</div>
	
</body>
</html>