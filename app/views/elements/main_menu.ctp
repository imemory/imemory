<ul>
    <li class="first-item"><?= $this->Html->link(
        'Home',
        array('controller' => 'home', 'action' => 'index'),
        array('rel' => 'home', 'title' => 'Ir para a homepage')
    ) ?></li>
    
    <li><?= $this->Html->link(
        'Pessoas',
        array('controller' => 'users', 'action' => 'index'),
        array('title' => 'ver as pessoas que estão participando')
    ) ?></li>
    
    <li><?= $this->Html->link(
        'Grupos',
        array('controller' => 'groups', 'action' => 'index'),
        array('title' => 'Procurar por grupos de estudo interessantes')
    ) ?></li>
    
    <li><?= $this->Html->link(
        'Tags',
        array('controller' => 'tags', 'action' => 'index'),
        array('title' => 'Pesquisar flashcards pelas tags')
    ) ?></li>
    
    <li><?= $this->Html->link(
        'Blog',
        '/blog',
        array('title' => 'Saiba o que anda acontecendo visitando o blog')
    ) ?></li>
    
    <li><?= $this->Html->link(
        'Sobre',
        array('controller' => 'about', 'action' => 'index'),
        array('title' => 'Conheça mais sobre o projeto')
    ) ?></li>
    
    <li><?= $this->Html->link(
        'Contato',
        array('controller' => 'contact', 'action' => 'index'),
        array('title' => 'Entre em contato conosco')
    ) ?></li>
</ul>

