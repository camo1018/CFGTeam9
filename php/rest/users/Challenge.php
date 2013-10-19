<?php //challenge Controller

class Challenge
{
   private $_params;
    
   public function __construct($params)
   {
      $this->_params = $params;
   }
    
   public function getRequest()
   {
      $q = "SELECT id, entity FROM users_activity WHERE userId = '{$userId}' AND action= '{$actionChallenge}' LIMIT 4 ORDER BY id DESC";
      mysqli::query($q);
   }
    
   public function postRequest()
   {
     
   }
}

?>