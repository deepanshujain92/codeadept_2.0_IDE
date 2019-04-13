<?php
session_start();

#
# && isset( $_POST['checkbox'] )
#
#ini_set('memory_limit', '1M');
$prefix = $_SESSION['username'];
$main = "Main.java";
$error_file  = 'error.txt';
$output_file = 'output.txt';
$input_file  = 'input.txt'; 
$exec_file  = 'Main.class'; 
function make_files_and_read_data(){
	 global $main,$output_file,$prefix,$input_file;
	 //exec("mkdir $prefix");
	 if (!is_dir($prefix)) {
        mkdir($prefix);         
     }	 
   exec("chmod -R 777 $prefix");
	 chdir($prefix);
	// echo getcwd();
   if( isset( $_POST['code'] ) ){

		$code = $_POST['code'];
		$f =fopen($main,"w+");
		fwrite($f,$code);
		fclose($f);
		shell_exec( "chmod 777 $main" );
		shell_exec("touch $output_file");
		shell_exec( "chmod 777 $output_file" );
		shell_exec("touch $input_file");
		shell_exec( "chmod 777 $input_file" );
		//echo getcwd();
}

}
function java_compile(){
	  global $main,$error_file,$exec_file,$prefix;
                make_files_and_read_data();
				$command = "javac Main.java  2> ".$error_file;
				shell_exec( $command );
				exec("chmod  777 *");
				if(filesize( $error_file)!=0 ){
					echo nl2br(file_get_contents( $error_file ));
				}
				//echo getcwd();
		}

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
           rrmdir($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } 
 }


function java_run(){
	global $input_file,$output_file,$prefix,$exec_file;
	    chdir($prefix);
	    // echo exec("ls -a");
        $run = "timeout 5s java Main";
		$input = fopen( $input_file, "w+" );
						if( isset($_POST['in']) ){
							fwrite( $input, $_POST['in']);
							$run = $run. "<"."$input_file";
						 }
						fclose( $input );

					    $run = $run.">"."$output_file";

                       //  echo $run;
                         // echo "<br>";
                         // echo getcwd();

						shell_exec( $run ); 
						//echo filesize($output_file)<=134217728;  
						if(filesize($output_file)<134217728){
                              $handle = @fopen($output_file, "r");
	                            $content = fread($handle, 20000);
	                            echo nl2br($content);
	                            fclose($handle);
                          }
						else{
							echo '<p style="color:red;text-align:center;font-size:20px;">Time limit exceeded ! </p>'.'<br><br>';
							    $handle = @fopen($output_file, "r");
	                            $content = fread($handle, 4096);
	                            echo nl2br($content);
	                            fclose($handle);
						}
					    $dir = realpath($prefix);
						//echo $dir;
						// exec('chmod 777 $prefix');
      //                   rrmdir($dir);
						 // $path = "./".$prefix;
						 // exec('chmod 777 $prefix');
       //                   exec('cd $prefix && rm  *');
       //                   exec('rmdir $prefix');
						 // echo $prefix;
						 // echo shell_exec("pwd");
						 // echo shell_exec("cd $prefix && pwd");
       //                   exec("rm $input_file"); 
}
?>
