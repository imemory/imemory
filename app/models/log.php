<?php

class Log extends AppModel
{
    public function getLog($user_id)
    {
        $sql = "select *
                from       logs as l
                inner join friendships as f
                on         (l.user_id = f.friend_id)
                where      f.user_id = {$user_id}
                limit      10";
        return $this->query($sql);
    }
}

