<?php

/**
 * Pagination: The simplest PHP pagination class
 */

namespace App;

class Pagination
{

	private $_currentPage,
			$_totalRecords,
			$_recordsPerPage;

	public function __construct($currentPage = 1, $totalRecords = 0, $recordsPerPage = 5)
	{
		$this->_currentPage = (int) $currentPage;
		$this->_totalRecords = (int) $totalRecords;
		$this->_recordsPerPage = (int) $recordsPerPage;
	}

	/**
	 * Calculate offset
	 * @return int
	 * Example: for 5 recores per page
	 * page 1 has offset 0
	 * page 2 has offset 5
	 */
	public function offset()
	{
		return ($this->_currentPage - 1) * $this->_recordsPerPage;
	}

	/**
	 * Get the records per page
	 * @return int
	 */
	public function getRecordsPerPage()
	{
		return $this->_recordsPerPage;
	}

	/**
	 * Calculate total pages
	 */
	private  function _totalPages()
	{
		return ceil($this->_totalRecords / $this->_recordsPerPage);
	}

	/**
	 * Calculate previous page
	 * @return int
	 */
	private  function _previousPage()
	{
		return $this->_currentPage - 1;
	}

	/**
	 * Calculate next page
	 * @return int
	 */
	private  function _nextPage()
	{
		return $this->_currentPage + 1;
	}

	/**
	 * Check if there is a previous page
	 * @return boolean
	 */
	private  function _hasPreviousPage()
	{
		return ($this->_previousPage() >= 1) ? true : false;
	}

	/**
	 * Check if there is a next page
	 * @return boolean
	 */
	private  function _hasNextPage()
	{
		return ($this->_nextPage() <= $this->_totalPages()) ? true : false;
	}



	public function nav($country_in_url)
	{
		$other_params = "" ;

		 if(isset($country_in_url)  && $country_in_url != "" )  {
		 	$other_params = $country_in_url ;
		 }



$nav="<ul class='pagination'  style='margin: 10px; float:right'  >" ;
if($this->_currentPage <= 1){
$prev_class ='disabled' ;
}else{
	$prev_class ='' ;
} 
$nav.="<li class='page-item  ".$prev_class."' >"  ;
$nav.="<a class='page-link' " ;
 if($this->_currentPage > 1){
$nav.="href='?page=".$this->_previousPage().$other_params."'";
}
$nav.=">Previous</a></li>" ;



if($this->_currentPage >= $this->_totalPages() ){
$next_class ='disabled' ;
} else{
 $next_class ='' ;
} 

$nav.="<li class='page-item ".$next_class ."' >";
$nav.="<a class='page-link' " ;
 if($this->_currentPage < $this->_totalPages() ){
$nav.="href='?page=".$this->_nextPage().$other_params."'";
}
$nav.=">Next</a></li>" ;

return $nav ;

















		// if ($this->_totalPages() > 1) {

		// 	$filename = htmlspecialchars(pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_BASENAME), ENT_QUOTES, "utf-8");


		// 	$links = '<nav>';
		// 	$links.= '<ul class="pagination">';

		// 	if ($this->_hasPreviousPage()) {
		// 		$links.= '<li><a href="' . $filename . '?page=1" >&laquo;</a></li>';
		// 		$links.= '<li><a href="' . $filename . '?page=' . $this->_previousPage() . '" >-</a></li>';
		// 	} else {
		// 		$links.= '<li class="disabled"><a href="#" >&laquo;</a></li>';
		// 		$links.= '<li class="disabled"><a href="#">-</a></li>';
		// 	}


		// 	// Create links in the middle
		// 	// Total links
		// 	$totalLinks = ($this->_totalPages() <= $maxLinks) ? $this->_totalPages() : $maxLinks;

		// 	// Middle link
		// 	$middleLink = floor($totalLinks / 2);

		// 	// Find first link and last link
		// 	if ($this->_currentPage <= $middleLink) {
		// 		$lastLink = $totalLinks;
		// 		$firstLink = 1;
		// 	} else {
		// 		if (($this->_currentPage + $middleLink) <= $this->_totalPages()) {
		// 			$lastLink = $this->_currentPage + $middleLink;
		// 		} else {
		// 			$lastLink = $this->_totalPages();
		// 		}

		// 		$firstLink = $lastLink - $totalLinks + 1;
		// 	}

		// 	for ($i = $firstLink; $i <= $lastLink; $i++) {
		// 		if ($this->_currentPage == $i) {
		// 			$links .= '<li class="active"><a href="#">' . $i . '</a></li>';
		// 		} else {
		// 			$links .= '<li><a href="' . $filename . '?page=' . $i . '">' . $i . '</a></li>';
		// 		}
		// 	}

		// 	if ($this->_hasNextPage()) {
		// 		$links.= '<li><a href="' . $filename . '?page=' . $this->_nextPage() . '" >+</a></li>';
		// 		$links.= '<li><a href="' . $filename . '?page=' . $this->_totalPages() . '">&raquo;</a></li>';
		// 	} else {
		// 		$links.= '<li class="disabled"><a href="#" >+</a></li>';
		// 		$links.= '<li class="disabled"><a href="#" >&raquo;</a></li>';
		// 	}
		// 	$links.='</ul>';
		// 	$links.='</nav>';

		// 	// Return all links of Pagination
		// 	return $links;
		// } else {
		// 	return false;
		// }
	}

}
