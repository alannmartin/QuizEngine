<?php
   
namespace Modules\Home\Model;
   
use CodeIgniter\Model;
use Config\Database;

class HitsModel extends Model
{
    public $builder;
   
    protected $table = 'hits';
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['counter'];

   
   //updates the visitors hits on the home page
   public function update_row()
   {

      $db      = Database::connect();
      $builder = $db->table('hits');
      $builder->set('counter', 'counter+1', false);
      $builder->where('id', 1);
      $builder->update();

   }
    

}//end of model class
