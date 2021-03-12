<?php 

	// Input (data string) 
	function keyword_density($wordString){
	
	$result = "";

	// Filter words array 
	// You can add more words you like to filter
	$filterwordsArray = array(
	" a ", " about ", " above ", " above ", " across ", " the ", " of ", " and " ); 

	// Remove filter words form input and count the number of removed words
	$wordStringFiltered = str_replace($filterwordsArray, ' ',  $wordString, $replaceCount);
	
	// Count the number of words found within the filtered words string (input), returns an array
	$keywordsArray = str_word_count($wordStringFiltered, 1);
	
	// Count the number of words found within the filtered words string (input), returns a string
	$wordCount = str_word_count($wordStringFiltered, 0);
	
	
	// Funtion to extract the single keywords and keyword combinations.
	// This function outputs an array
	function keywordSorting($keywordsArray, $wordCount){
	
		$keywordsSorted0 = ''; // 1 word match 
		$keywordsSorted1 = ''; // 2 word phrase match 
		$keywordsSorted2 = ''; // 3 word phrase match 
		$keywordsSorted3 = ''; // 4 word phrase match 
			
		for ($i = 0; $i < count($keywordsArray); $i++){
			// 1 word phrase match 
			if ($i+0 < $wordCount){
				$keywordsSorted0 .= $keywordsArray[$i].',';			
			} 
			// 2 word phrase match 
			if ($i+1 < $wordCount){
				$keywordsSorted1 .= $keywordsArray[$i].' '.$keywordsArray[$i+1].',';
			} 
			// 3 word phrase match 
			if ($i+2 < $wordCount){
				$keywordsSorted2 .= $keywordsArray[$i].' '.$keywordsArray[$i+1].' '.$keywordsArray[$i+2].',';			
			} 
			// 4 word phrase match 
			if ($i+3 < $wordCount){
				$keywordsSorted3 .= $keywordsArray[$i].' '.$keywordsArray[$i+1].' '.$keywordsArray[$i+2].' '.$keywordsArray[$i+3].',';
			} 
		}
		
		for ($i = 0; $i <= 3; $i++){
		
			// Build array form string. 
			${'keywordsSorted'.$i} = array_filter(explode(',', ${'keywordsSorted'.$i}));			
			${'keywordsSorted'.$i} = array_count_values(${'keywordsSorted'.$i});
			asort(${'keywordsSorted'.$i});
			arsort(${'keywordsSorted'.$i});	
			
			foreach (${'keywordsSorted'.$i} as $key => $value){
				${'keywordsSorted'.$i}[$key] = array($value, number_format((100 / $wordCount * $value),2));		
			}
		}	
		// return array
		return array($keywordsSorted0, $keywordsSorted1, $keywordsSorted2, $keywordsSorted3);
	}
	
	// Store funtion output in variable (keywordsSortedArray)
	$keywordsSortedArray = keywordSorting($keywordsArray, $wordCount);
	
	// echo one word table
	$result .= '<table class="table table-bordered table-sm">
		 	<tr>
				<th width="50%">Keyword</th>
				<th width="25%">Count</th>
				<th width="25%">Keyword density</th>
			</tr>
		 <tbody>';

	$i = 1;
	foreach ($keywordsSortedArray[0] as $keyword => $keywordData){		
		$result .= '<tr>
			 <td>'.$keyword.'</td>
			 <td>'.$keywordData[0].'</td>
			 <td>'.$keywordData[1].' %</td>
			 </tr>';
		$i = $i + 1;
		if($i > 10){
			break;
		}
	}
	$result .= '</table>';
	
	// echo two word table
	$result .= '<table class="table table-bordered table-sm">
		 	<tr>
				<th width="50%">Keyword</th>
				<th width="25%">Count</th>
				<th width="25%">Keyword density</th>
			</tr>
		 <tbody>';
		 			
	$i = 1;
	foreach ($keywordsSortedArray[1] as $keyword => $keywordData){		
		$result .= '<tr>
			 <td>'.$keyword.'</td>
			 <td>'.$keywordData[0].'</td>
			 <td>'.$keywordData[1].' %</td>
			 </tr>';
		$i = $i + 1;
		if($i > 10){
			break;
		}
	}
	$result .= '</table>';

	// echo three word table
	$result .= '<table class="table table-bordered table-sm">
		 	<tr>
				<th width="50%">Keyword</th>
				<th width="25%">Count</th>
				<th width="25%">Keyword density</th>
			</tr>
		 <tbody>';
		 			
	$i = 1;
	foreach ($keywordsSortedArray[2] as $keyword => $keywordData){		
		$result .= '<tr>
			 <td>'.$keyword.'</td>
			 <td>'.$keywordData[0].'</td>
			 <td>'.$keywordData[1].' %</td>
			 </tr>';
		$i = $i + 1;
		if($i > 10){
			break;
		}
	}
	$result .= '</table>';

	// echo three word table
	$result .= '<table class="table table-bordered table-sm">
		 	<tr>
				<th width="50%">Keyword</th>
				<th width="25%">Count</th>
				<th width="25%">Keyword density</th>
			</tr>
		 <tbody>';
		 			
	$i = 1;
	foreach ($keywordsSortedArray[3] as $keyword => $keywordData){		
		$result .= '<tr>
			 <td>'.$keyword.'</td>
			 <td>'.$keywordData[0].'</td>
			 <td>'.$keywordData[1].' %</td>
			 </tr>';
		$i = $i + 1;
		if($i > 10){
			break;
		}
	}
	$result .= '</table>';

	return $result;

}

?>
