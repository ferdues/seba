<?php 
function eng_num($arg1){
	$eng_nums = array(
		"১" => "1",
		"২" => "2",
		"৩" => "3",
		"৪" => "4",
		"৫" => "5",
		"৬" => "6",
		"৭" => "7",
		"৮" => "8",
		"৯" => "9",
		"০" => "0",
	);

   return strtr($arg1, $eng_nums);
}

function bang_num($arg){
	$bang_nums = array(
		"1" => "১",
		"2" => "২",
		"3" => "৩",
		"4" => "৪",
		"5" => "৫",
		"6" => "৬",
		"7" => "৭",
		"8" => "৮",
		"9" => "৯",
		"0" => "০",
	);

   return strtr($arg, $bang_nums);
}
?>