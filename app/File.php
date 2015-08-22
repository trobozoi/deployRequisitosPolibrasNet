<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	 /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';
	
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
