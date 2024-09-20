<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Student extends Model implements Auditable
{ 
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    protected $primaryKey = 'ssn'; 
    public $incrementing = false; 
    protected $keyType = 'string';

    protected $fillable = [
        'ssn', 'fname', 'lname', 'email', 'phone', 'dept_id','imgs'
      
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id', 'dept_num');
    }
}
