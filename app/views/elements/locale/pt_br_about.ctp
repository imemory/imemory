
<h2><strong><?= $this->Html->link('Sobre', array('action' => 'index')) ?></strong> o Projeto iMemory</h2>

<p>
    O projeto iMemory foi desenvolvido como um Trabalho de
    Conclusão de Curso por nós, alunos da FIAP (2010).
    O projeto visou criar uma ferramenta que desse suporte ao estudo
    colaborativo com base em memorização.
    <a href="#team-photo">Desça para saber mais sobre a equipe.</a>
</p>

<p>
    Uma das dificuldades que podem ser encontradas por grande parte dos
    estudantes é a de lembrarem o que aprenderam.
    No estudo de diversas áreas do conhecimento é necessário
    lidar com peculiaridades dos temas como nomes, datas, qualificações,
    características e etc.
    Diante da velocidade com a qual a tecnologia se desenvolve e das
    crescentes necessidades dos alunos é importante realizar
    a reavaliação e otimização de métodos e ferramentas de suporte
    à área de ensino & aprendizado.
    A questão principal é a participação do aluno na construção do
    conhecimento de maneira colaborativa. 
</p>

<p>
    O iMemory visa fornecer um auxílio de planejamento de estudo (memorização)
    do estudante, podendo este ser feito individualmente ou 
    em grupo,incentivando o interesse nos estudos e na interação aluno-aluno.
    A proposta do iMemory é a criação de uma solução auxiliar nos estudos que
    possibilite interatividade e cooperação, assim como a organização dos
    estudos, através de Flashcards.
    Os Flashcards são cartões com uma pergunta na frente e uma resposta atrás,
    e podem ser criados, estudados e compartilhados pelos estudantes usuários.
    Na seção "Estudar", é possivel que o usuário visualize os flashcards de sua
    pilha ordenados por prioridade. Essa prioridade é calculada baseada no
    número de visualizações de flashcards e nos acertos sobre os mesmos.
</p>

<p>
    O iMemory está em fase de testes com usuários, e esperamos obter resultados
    robustos para nossa monografia. 
    Nossa discussão procurará entender a aceitabilidade dos estudantes usuários
    para com a ferramenta e o ambiente iMemory, considerando
    aspéctos como eficiência, usabilidade, interatividade e etc.
</p>

<p>
    Desejamos que este trabalho possa ser útil a todos os tipos de estudantes,
    pois a educação é a base de uma sociedade sustentável.
</p>

<div id="team-photo">
    <h2>A equipe</h2>
    <div id="team-caio" class="team-member">
        <h3>Caio Cesar</h3>
        <?php echo $this->Html->image('team/caio.jpg'); ?>
        <p>Professor de artes marciais, atravessou o Atlântico a nado.
        Fundou uma instituição de caridade e vive em uma casinha de sapê.</p>
    </div>
    
    <div id="team-karine" class="team-member">
        <h3>Karine Miras</h3>
        <?php echo $this->Html->image('team/karine.jpg'); ?>
        <p>Vive de <a href="http://www.frootloops.com/healthymessage/index.html">Froot Loops</a> e
        wasabi, pessimista, teimosa e tecladista por natureza e "excelente" gosto musical.</p>
    </div>
    
    <div id="team-tarcisio" class="team-member">
        <h3>Tarcísio Sassara</h3>
        <?php echo $this->Html->image('team/tarcisio.png'); ?>
        <p>Já leu mais de 5.000 livros. Nasceu no mato e foi criado por lobos.
        Também costuma atravessar velhinhas para o lado errado da rua sem ser pedido.</p>
    </div>
    <div class="clear"></div>
</div>
