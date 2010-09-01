<ul>
    <li class="first-item"><?= $this->Html->link(
        __('Home', true),
        array('controller' => 'home', 'action' => 'index'),
        array('rel' => 'home', 'title' => __('go to homepage', true))
    ) ?></li>
    
    <li class="first-item"><?= $this->Html->link(
        __('Study', true),
        array('controller' => 'users', 'action' => 'study'),
        array('rel' => 'home', 'title' => __('start study', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Flashcards', true),
        array('controller' => 'flashcards', 'action' => 'index'),
        array('title' => __('Find new flashcards', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('People', true),
        array('controller' => 'users', 'action' => 'index'),
        array('title' => __('meet other students', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Groups', true),
        array('controller' => 'groups', 'action' => 'index'),
        array('title' => __('search for interesting study groups', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Tags', true),
        array('controller' => 'tags', 'action' => 'index'),
        array('title' => __('search flashcards by tags', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Blog', true),
        '/blog',
        array('title' => __("know what's happening visiting the blog", true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('About', true),
        array('controller' => 'about', 'action' => 'index'),
        array('title' => __('learn more about the project', true))
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Contact', true),
        array('controller' => 'contact', 'action' => 'index'),
        array('title' => __('contact us', true))
    ) ?></li>
</ul>

