<ul>
    <li class="first-item"><?= $this->Html->link(
        __('Home', true),
        array('controller' => 'home', 'action' => 'index'),
        array('rel' => 'home', 'title' => 'Ir para a homepage')
    ) ?></li>
    
    <li class="first-item"><?= $this->Html->link(
        __('ESTUDAR', true),
        array('controller' => 'users', 'action' => 'study'),
        array('rel' => 'home', 'title' => 'Iniciar estudos')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Flashcards', true),
        array('controller' => 'flashcards', 'action' => 'index'),
        array('title' => 'Procurar novos flashcards para estudar')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('People', true),
        array('controller' => 'users', 'action' => 'index'),
        array('title' => 'ver as pessoas que estão participando')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Groups', true),
        array('controller' => 'groups', 'action' => 'index'),
        array('title' => 'Procurar por grupos de estudo interessantes')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Tags', true),
        array('controller' => 'tags', 'action' => 'index'),
        array('title' => 'Pesquisar flashcards pelas tags')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Blog', true),
        '/blog',
        array('title' => 'Saiba o que anda acontecendo visitando o blog')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('About', true),
        array('controller' => 'about', 'action' => 'index'),
        array('title' => 'Conheça mais sobre o projeto')
    ) ?></li>
    
    <li><?= $this->Html->link(
        __('Contact', true),
        array('controller' => 'contact', 'action' => 'index'),
        array('title' => 'Entre em contato conosco')
    ) ?></li>
</ul>

