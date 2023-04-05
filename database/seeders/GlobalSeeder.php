<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Tag_de;
use App\Models\Opinion;
use App\Models\Opinion_de;
use App\Models\Space_tag;
use App\Models\Space_tag_de;
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
                
                
                     Space_tag::create( [
                    'id'=>3,
                    'name'=>'residents'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>4,
                    'name'=>'workers'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>5,
                    'name'=>'tourists'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>6,
                    'name'=>'pet owners'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>7,
                    'name'=>'parent(s) with children'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>8,
                    'name'=>'children'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>9,
                    'name'=>'students'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>10,
                    'name'=>'LGBTQ+ group'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>11,
                    'name'=>'athletes'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>12,
                    'name'=>'teenagers'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>13,
                    'name'=>'elderly'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>14,
                    'name'=>'homeless'
                    ] );
                                
                    Space_tag::create( [
                    'id'=>15,
                    'name'=>'nobody'
                    ] );



                    Opinionsde::create( [
                        'id'=>1,
                        'name'=>'gefährlich'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>2,
                        'name'=>'leicht zu gehen'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>3,
                        'name'=>'zu laut'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>4,
                        'name'=>'schlecht konzipiert'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>5,
                        'name'=>'angenehm'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>6,
                        'name'=>'gut um Zeit zu verbringen'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>7,
                        'name'=>'unbequem'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>8,
                        'name'=>'schön'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>9,
                        'name'=>'Unvergesslich'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>10,
                        'name'=>'schwierig für Menschen mit Behinderungen'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>11,
                        'name'=>'unbenut'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>12,
                        'name'=>'keine Aktivitäten'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>13,
                        'name'=>'sehr ruhig'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>14,
                        'name'=>'Verkehrssicher'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>15,
                        'name'=>'schwer beweglich'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>16,
                        'name'=>'sicher in der Nacht'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>17,
                        'name'=>'vor Sonne, Regen und Wind geschützt'
                        ] );
                                    
                        Opinionsde::create( [
                        'id'=>18,
                        'name'=>'sehr ruhig'
                        ] );

                        Tagsde::create( [
                            'id'=>1,
                            'name'=>'Gehsteig',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>2,
                            'name'=>'Weg',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>3,
                            'name'=>'Straße',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>4,
                            'name'=>'Kreuzung',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>5,
                            'name'=>'Durchgang',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>6,
                            'name'=>'Gallerie',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>7,
                            'name'=>'Fahrradweg',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>8,
                            'name'=>'Haltestelle',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>9,
                            'name'=>'Parkplatz',
                            'category'=>'Street'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>12,
                            'name'=>'Fassade',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>13,
                            'name'=>'Eingang',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>14,
                            'name'=>'Innenbereich',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>15,
                            'name'=>'Schule',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>16,
                            'name'=>'Museum',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>17,
                            'name'=>'Kirche',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>18,
                            'name'=>'Universität',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>19,
                            'name'=>'Bibliothek',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>21,
                            'name'=>'Denkmal',
                            'category'=>'Building'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>22,
                            'name'=>'Park',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>23,
                            'name'=>'öffentlicher Platz',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>24,
                            'name'=>'Weg',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>25,
                            'name'=>'Erholungsraum',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>26,
                            'name'=>'Spielplatz',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>27,
                            'name'=>'Hundepark',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>28,
                            'name'=>'leere Fläche',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>29,
                            'name'=>'Gemeinschaftsgarten',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>30,
                            'name'=>'Baustelle',
                            'category'=>'Openspace'
                            ] );
                            
                            
                                        
                            Tagsde::create( [
                            'id'=>31,
                            'name'=>'Brunnen',
                            'category'=>'Openspace'
                            ] );


                            Spacetagsde::create( [
                                'id'=>3,
                                'name'=>'Einwohner/-in'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>4,
                                'name'=>'Arbeitnehmer/-in'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>5,
                                'name'=>'Tourist/-in'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>6,
                                'name'=>'Haustierbesitzer'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>7,
                                'name'=>'Elternteil(e) mit Kindern'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>8,
                                'name'=>'Kinder'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>9,
                                'name'=>'Student/-in'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>10,
                                'name'=>'LGBTQ+ group'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>11,
                                'name'=>'Sportler/-in'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>12,
                                'name'=>'Jugendliche'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>13,
                                'name'=>'Senioren'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>14,
                                'name'=>'Obdachlos'
                                ] );
                                
                                
                                            
                                Spacetagsde::create( [
                                'id'=>15,
                                'name'=>'niemand'
                                ] );
                                
                            
    }
}
