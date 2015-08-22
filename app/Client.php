<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';
	
	protected $primaryKey = 'id';
	
	protected $fillable = [
		'name',
		'version_id'
    ];
	
	public function version()
	{
		return $this->belongsTo('App\Version');
	}
}
