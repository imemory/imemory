<?php

class FlashcardsGroup extends AppModel
{
    //--------------------------------------------------------------------------
    public $belongsTo = array(
        'Flashcard' => array(
            'className'  => 'Flashcard'
        ),
        'Group' => array(
            'className'  => 'Group'
        )
    );
    
    
}
