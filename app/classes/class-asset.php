<?php


class Asset {
	public static function css( $file_name ) {
		echo get_template_directory_uri().DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'css'.DIRECTORY_SEPARATOR.$file_name;
	}

	public static function js( $file_name ) {
		echo get_template_directory_uri().DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'js'.DIRECTORY_SEPARATOR.$file_name;
	}

	public static function image( $file_name ) {
		echo get_template_directory_uri().DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$file_name;
	}
}