<?php
	//PHP Tips and Tricks
	class hw6{
		
		
		function func_num_args($arg1='',$arg2=''){
			echo "arg1: $arg1\n";
			echo "arg2: $arg2\n";
		}
		//no parameter
		function func_no_args(){
			//func_get_args takes parameter.
			$args = func_get_args();
		
			foreach ($args as $k => $v) {
				echo "arg". ($k +1). ": $v\n";
			}
		}
		
		function get_php_files() {
			$files = glob('../*.php');
			
			print_r($files);
		}
		
		
		function get_mem_usage() {
			echo "Initial Memory usage: ". memory_get_usage()." bytes.\n";
			echo "now raise some memory.\n";
			
			for($i = 0; $i<100000; $i++)
				$array [] = md5($i);
				echo "Final: ". memory_get_usage(). " bytes.\n";
				echo "now remove half of the array.\n";
			for ($i = 0; $i < 100000; $i++) 
				unset($array[$i]);
				echo "Peak: ". memory_get_peak_usage(). " bytes.\n";			
		}
		
		
		
		
		
	}
		$hw6_obj1 = new hw6();
		$hw6_obj2 = new hw6();
		$hw6_obj3 = new hw6();
		$hw6_obj4 = new hw6();
		
		echo "Exe: 1 Functions with Arbitrary Number of Arguments\n";
		$hw6_obj1->func_num_args('PHP','Tips and Tricks');	
		echo "\nExe: 2 Using Glob() to Find Files\n";
		//pass nothing
		$hw6_obj2->func_no_args();	
		$hw6_obj2->func_no_args('PHP','Tips','and','Tricks');	

		echo "\nExe: 3 Using Glob() to Find Files\n";
		
		$hw6_obj3->get_php_files();
		
		echo"\nExe: 4 Memory Usage Information\n";
		$hw6_obj4->get_mem_usage();
		
		
		echo "\nExe: 5 CPU Usage Information";
		print_r(getrusage());
		
		echo "Sleep for 5 seconds.\n";
		sleep(5);
		$data = getrusage();
		echo "User time: ".
			($data['ru_utime.tv_sec'] +
			$data['ru_utime.tv_usec'] / 1000000);
		echo "System time: ".
			($data['ru_stime.tv_sec'] +
			$data['ru_stime.tv_usec'] / 1000000);
?>