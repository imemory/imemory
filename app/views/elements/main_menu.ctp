<ul>
    <li class="first-item"><?= $this->Html->link(
        __('Home', true),
        array('controller' => 'home', 'action' => 'index'),
        array('rel' => 'home', 'title' => __('Go to homepage', true))
    ) ?></li>
    
    <li class="first-item"><?= $this->Html->link(
        __('Study', true),
        array('controller' => 'flashcards_users', 'action' => 'study'),
        array('rel' => 'home', 'title' => __('Start study', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Flashcards', true),
        array('controller' => 'flashcards', 'action' => 'index'),
        array('title' => __('Look for new Flashcards', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Students', true),
        array('controller' => 'users', 'action' => 'index'),
        array('title' => __('Look for other students', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Groups', true),
        array('controller' => 'groups', 'action' => 'index'),
        array('title' => __('Look for study groups', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Tags', true),
        array('controller' => 'tags', 'action' => 'index'),
        array('title' => __('Look for Flashcards by Tags', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Blog', true),
        '/blog',
        array('title' => __("Find out what's happening by visiting our blog.", true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('About', true),
        array('controller' => 'about', 'action' => 'index'),
        array('title' => __('Learn more about iMemory project', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Contact', true),
        array('controller' => 'contact', 'action' => 'index'),
        array('title' => __('Contact us', true))
    ) ?></li>
</ul>

