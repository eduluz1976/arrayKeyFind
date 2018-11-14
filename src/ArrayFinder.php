<?php

namespace eduluz1976\ArrayUtils;

class ArrayFinder {

    const SEARCH_FOR_KEY = 'key';
    const SEARCH_FOR_VALUE = 'value';

    protected $lsItems = [];
    protected $keyToSearch = 'key';
    protected $itemToSearch = false;


    public function getItems() {
        return $this->lsItems;
    }

    public function resetItems($value=[]) {
        $this->lsItems = $value;
        return $this;
    }

    public function hasItems() {
        return (!empty($this->lsItems));
    }

    public function setKeyToSearch($key) {
        $this->keyToSearch = $key;
        return $this;
    }


    public function setItemToSearch($item) {
        $this->itemToSearch = $item;
        return $this;
    }



    protected function walk($value, $key) {

        $keyCompare = $this->keyToSearch;

        if ($$keyCompare === $this->itemToSearch) {
            $this->lsItems[] = $value;
        }

        if (is_array($value)) {
            $this->find($value);
        } 
    }

    

    public function find($arr) {
        array_walk($arr, [$this, 'walk'] );        
    }


    public function findByKey($key, array $arr) {
        $this->setKeyToSearch(self::SEARCH_FOR_KEY);
        $this->setItemToSearch($key);
        $this->resetItems();
        $this->find($arr);


        return $this->getItems();
    }


    public function findByValue($value, array $arr) {
        $this->setKeyToSearch(self::SEARCH_FOR_VALUE);
        $this->setItemToSearch($value);
        $this->resetItems();
        $this->find($arr);
        return $this->getItems();
    }

}

