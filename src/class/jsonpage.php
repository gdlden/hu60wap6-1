<?php
class JsonPage {
	public static function start() {
		ob_start();
		header('Content-Type: application/json; charset=utf-8');
	}
	
	public static function output($data) {
		ob_end_clean();
		echo json_encode($data, (false === strpos($_GET['_json'], 'object') ? 0 : JSON_FORCE_OBJECT) | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | (false !== strpos($_GET['_json'], 'compact') ? 0 : JSON_PRETTY_PRINT));
	}

	public static function unset(&$arr, $key) {
		unset($arr[$key]);
	}

	public static function selUbbP(&$ubb) {
		$op = $_GET['_content'];

		switch ($op) {
			case 'ubb':
				$ubb = new UbbEdit();
				$ubb->skipUnknown(TRUE);
				break;
			case 'json':
				$ubb = new UbbJson();
				break;
		}
	}
}