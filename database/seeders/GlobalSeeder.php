<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Opinion;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GlobalSeeder extends Seeder
{

    public function run()
    {
        Tag::create( [
            'id'=>1,
            'name'=>'sidewalk',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>2,
            'name'=>'path',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>3,
            'name'=>'walking street',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>4,
            'name'=>'road',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>5,
            'name'=>'intersection',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>6,
            'name'=>'passage',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>7,
            'name'=>'gallery',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>8,
            'name'=>'bike lane',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>9,
            'name'=>'public transport',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>10,
            'name'=>'station',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>11,
            'name'=>'parking spaces',
            'category'=>'Street'
            ] );
                        
            Tag::create( [
            'id'=>12,
            'name'=>'facade',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>13,
            'name'=>'entrance',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>14,
            'name'=>'interior',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>15,
            'name'=>'school',
            'category'=>'Building'
            ] );
                         
            Tag::create( [
            'id'=>16,
            'name'=>'museum',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>17,
            'name'=>'church',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>18,
            'name'=>'university',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>19,
            'name'=>'library',
            'category'=>'Building'
            ] );
                        
            Tag::create( [
            'id'=>21,
            'name'=>'park',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>22,
            'name'=>'public square',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>23,
            'name'=>'path',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>24,
            'name'=>'recreation area',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>25,
            'name'=>'playground',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>26,
            'name'=>'dog park',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>27,
            'name'=>'empty lot',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>28,
            'name'=>'community',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>29,
            'name'=>'garden',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>30,
            'name'=>'construction',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>31,
            'name'=>'Rito',
            'category'=>'Openspace'
            ] );
                        
            Tag::create( [
            'id'=>32,
            'name'=>'fountain',
            'category'=>'Openspace'
            ] );
                        

            Opinion::create( [
                'id'=>1,
                'name'=>'dangerous'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>2,
                'name'=>'easy to walk'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>3,
                'name'=>'too loud'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>4,
                'name'=>'poorly designed'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>5,
                'name'=>'pleasant'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>6,
                'name'=>'good for spending time'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>7,
                'name'=>'uncomfortable'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>8,
                'name'=>'beautiful'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>9,
                'name'=>'unmemorable'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>10,
                'name'=>'difficult for disabled'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>11,
                'name'=>'unused'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>12,
                'name'=>'no activities'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>13,
                'name'=>'very calm'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>14,
                'name'=>'safe from traffic'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>15,
                'name'=>'difficult to move'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>16,
                'name'=>'safe during the night'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>17,
                'name'=>'protected from sun,rain & wind'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>18,
                'name'=>'very calm'
                ] );
                
                
                            
                Opinion::create( [
                'id'=>19,
                'name'=>'test'
                ] );
    }
}
