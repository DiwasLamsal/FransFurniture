<?php

/*
* -------------------------------------------------
* The databasetable.php
* Contains the databasetable class provided in the
* course lecture.
* Contains different database operation member
* functions.
* -------------------------------------------------
*/


class DatabaseTable{
	//Member variable table
	public $table;

////////////////////////////////////////////////////////////////////////////////


	function __construct($table){
		$this->table = $table;
	}

////////////////////////////////////////////////////////////////////////////////

	function save($record, $pk = ''){
	    try{
	        $this->insert($record);
	    }
	    catch(Exception $e){
	        $this->update($record, $pk);
	    }
	}

////////////////////////////////////////////////////////////////////////////////

	function insert($record) {
	    global $pdo;
	    $keys = array_keys($record);
	    $values = implode(', ', $keys);
	    $valuesWithColon = implode(', :', $keys);
	    $query = 'INSERT INTO '.$this->table.'('.$values.') VALUE(:'.$valuesWithColon.')';
	    $stmt = $pdo->prepare($query);
	    $stmt->execute($record);
	}

////////////////////////////////////////////////////////////////////////////////

	function update($record, $pk) {
	    global $pdo;
	    $parameters = [];
	    foreach ($record as $key => $value) {
	        $parameters[] = $key . '= :'  . $key;
	    }
	    $parametersWithComma = implode(', ', $parameters);
	    $query = "UPDATE $this->table SET $parametersWithComma WHERE $pk = :pk";
	    $record['pk'] = $record[$pk];
	    $stmt = $pdo->prepare($query);
	    $stmt->execute($record);
	}

////////////////////////////////////////////////////////////////////////////////

	function find($field, $value) {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$field.'=:value');
	    $criteria = [
	            'value' => $value
	    ];
	    $stmt->execute($criteria);
	    return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////


	/** Function findSorted
	* Self modified function to find data in a sorted order
	* @param field - The field used to extract data
	* @param value - The value in the field to be used as the criteria to extract data
	* @param key - The field to be used to sort the data
	* @param order - The order could be ASC or left blank as DESC is the default
	* @return data - Return the selected rows
	*/
	function findSorted($field, $value, $key, $order = 'DESC') {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$field.'=:value ORDER BY '.$key.' '.$order);
	    $criteria = [
	            'value' => $value
	    ];
	    $stmt->execute($criteria);
	    return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////

	function findAll() {
	    global $pdo;
	    $stmt = $pdo->prepare('SELECT * FROM ' . $this->table);
	    $stmt->execute();
	    return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////

	/** Function findAllSorted
	* Self modified function to find all the data in a table in a sorted order
	* @param key - The field to be used to sort the data
	* @param order - The order could be ASC or left blank as DESC is the default
	* @return data - Return the selected rows
	*/
	function findAllSorted($key, $order = 'DESC'){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM ' . $this->table . ' ORDER BY '.$key.' '.$order);
		$stmt->execute();
		return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////

	/** Function searchSorted
	* Self modified function to find data in a sorted order
	* @param field - The field used to extract data
	* @param value - The value in the field to be used as the search criteria to extract data
	* @param key - The field to be used to sort the data
	* @param order - The order could be ASC or left blank as DESC is the default
	* @return data - Return the selected rows from search
	*/
	function searchSorted($field, $value, $key, $order = 'DESC'){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$field.' LIKE :value
													 ORDER BY '.$key.' '.$order);
		$criteria = [
						'value' => '%'.$value.'%'
		];
		$stmt->execute($criteria);
		return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////


	/** Function searchSortedWithValue
	* Self modified function to find data in a sorted order
	* @param field - The field used to extract data
	* @param value - The value in the field to be used as the search criteria to extract data
	* @param key - The field to be used to sort the data
	* @param order - The order could be ASC or left blank as DESC is the default
	* @return data - Return the selected rows from search
	*/
	function searchSortedWithValue($field, $value, $searchField, $searchValue, $sortKey, $sortOrder = 'DESC'){
		global $pdo;
		$stmt = $pdo->prepare('SELECT * FROM '.$this->table.' WHERE '.$field.'=:value
														AND '.$searchField.' LIKE :searchvalue
														ORDER BY '.$sortKey.' '.$sortOrder);
		$criteria = [
						'value' => $value,
						'searchvalue' => '%'.$searchValue.'%'
		];
		$stmt->execute($criteria);
		return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////

	function delete($field, $value){
	    global $pdo;
	    $stmt = $pdo->prepare("DELETE FROM $this->table WHERE $field = :pk");
	    $criteria = [
	        'pk' => $value
	    ];
	    $stmt->execute($criteria);
	    return $stmt;
	}

////////////////////////////////////////////////////////////////////////////////


function findLastRecord($field){
	global $pdo;
	$stmt = $pdo->prepare('SELECT * FROM '.$this->table.' ORDER BY '.$field.' DESC LIMIT 1');
	$stmt->execute();
	return $stmt;
}









}
