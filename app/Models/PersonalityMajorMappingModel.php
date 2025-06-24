<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonalityMajorMappingModel extends Model
{
    protected $table = 'personality_major_mapping';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['personality_type_id', 'major_id'];
    
    // Timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
} 