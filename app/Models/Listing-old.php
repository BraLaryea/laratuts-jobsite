<?php

namespace App\Models;

class ListingOld
{
    public static function all()
    {
        return [

            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Loremsdlkfaoieoi ldsjdflkfjds lkflskfj asklf
                sdlfkjsdlkj 
                fdlkafjsk'
            ],
            [
                'id' => 2,
                'title' => 'Listing One',
                'description' => 'Loremsdlkfaoieoi ldsjdflkfjds lkflskfj asklf
                sdlfkjsdlkj 
                fdlkafjsk'
            ],
            [
                'id' => 3,
                'title' => 'Listing One',
                'description' => 'Loremsdlkfaoieoi ldsjdflkfjds lkflskfj asklf
                sdlfkjsdlkj 
                fdlkafjsk'
            ]

        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }
    }
}
