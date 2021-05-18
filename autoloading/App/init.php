<?php 
	spl_autoload_register(function($class){
		$class=explode('\\', $class);
		$class=end($class);
		// $files = glob("D:/xampp/htdocs/project/latihan/autoloading/App/*");
		// foreach($files as $file) {
		//     if(filetype($file) == "dir"){
		//         $folder = explode("/", $file);
		//         $folder = end($folder);
		require_once __DIR__.'/Produk/'.$class.'.php';
		//         return;
		//     }
		// }
    });
  		
	spl_autoload_register(function($class){
		$class=explode('\\', $class);
		$class=end($class);
		require_once __DIR__.'/Service/'.$class.'.php';
	});