<?php 
function formatBytes($bytes,$precision){
	$units = "B,KB,MB";
	$units = explode(",",$units);
	if($bytes < 1024) {  return round($bytes, $precision) . ' ' . $units[0]; }
	elseif($bytes > 1024 && $bytes < 1048576) {  $bytes = $bytes/1024; return round($bytes, $precision) . ' ' . $units[1]; }
	elseif($bytes > 1048576) {  $bytes = $bytes/1048576; return round($bytes, $precision) . ' ' . $units[2]; }
}
?>