<?phpclass Functions {	public static function error (string $text) {		?><div style="margin: 40px;">		<div style="border:1px solid #888888;background-color:#c1c1c1;padding:20px;font:bold 15px Arial;color:#393939;">ERROR</div>		<div style="border:1px solid #e6e6e6;background-color:#e6e6e6;padding:20px;font:normal 15px Tahoma;color:#393939;"><?=$text?></div>		</div><?		die();	}	public static function warning (string $text) {		?><div style="margin: 40px;">		<div style="border:1px solid #888888;background-color:#c1c1c1;padding:20px;font:bold 15px Arial;color:#393939;">WARNING</div>		<div style="border:1px solid #e6e6e6;background-color:#e6e6e6;padding:20px;font:normal 15px Tahoma;color:#393939;"><?=$text?></div>		</div><?	}}