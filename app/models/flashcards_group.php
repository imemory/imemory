<?php

class FlashcardsGroup extends AppModel
{
    //--------------------------------------------------------------------------
    public $belongsTo = array(
        'Flashcard' => array(
            'className'  => 'Flashcard'
        ),
        'Group' => array(
            'className'    => 'Group',
            'counterCache' => 'flashcard_count'
        )
    );
    
    
    public function afterSave($created = false)
    {
        if ( ! $created) {
            return;
        }
        
        $group_id     = $this->data['FlashcardsGroup']['group_id'];
        $flashcard_id = $this->data['FlashcardsGroup']['flashcard_id'];
        
        $sql = "
        insert into flashcards_users(flashcard_id, user_id, created, updated)
        select {$flashcard_id} as flashcard_id, user_id, now(), now()
        from   memberships
        where  group_id = {$group_id}
        and    user_id not in (
                 select user_id
                 from flashcards_users
                 where flashcard_id = {$flashcard_id}
               )
        ";
        $this->query($sql);
    }
}
