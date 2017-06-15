<?php
if (isset($_GET['loc'])) {
	$loc='../report/'.$_GET['loc'];
	 header("Content-Type: application/octet-stream");
      header('Content-Disposition: attachment; filename="'.basename($loc).'"');
      header("Content-Length:".filesize($loc));
      readfile($loc);
}?>