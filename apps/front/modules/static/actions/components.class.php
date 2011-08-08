<?php

class staticComponents extends sfComponents
{

  public function executeSearch(sfWebRequest $request)
  {
    $this->letters = array( '#', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'y', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
  }

}
