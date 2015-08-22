<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';
	
	protected $primaryKey = 'id';
	
	protected $fillable = [
        'name'
    ];
	
	public function versions()
	{
		return $this->hasMany('App\Version');
	}
}
