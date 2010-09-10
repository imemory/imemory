<?php

class FlashcardsUser extends AppModel
{
    //--------------------------------------------------------------------------
    /**
     * Retorna o próximo flashcard que o usuário passado pelo ID deve visualizar
     */
	public function getNextFlashcard($user_id)
	{
	    $sql = "
	    SELECT     fu.id,
	               f.id as flashcard_id,
	               f.front,
	               f.back,
	               f.created,
	               u.id as user_id,
	               u.username,
	               
	               fu.views as n_views,
	               fu.hits as n_hitis,
	               utv.total as total_views,
	               round((2.0 - fu.hits/fu.views - fu.views/utv.total) / 2.0, 2) as r
        
        FROM       flashcards_users as fu
        
        INNER JOIN flashcards as f
        ON         (fu.flashcard_id = f.id)
        
        INNER JOIN users u
        ON         (f.user_id = u.id)
        
        INNER JOIN users_total_views as utv
        ON         (fu.user_id = utv.user_id)
        
        WHERE      fu.user_id = {$user_id}
        AND        calc_max_r({$user_id}) = round((2.0 - fu.hits/fu.views - fu.views/utv.total) / 2.0, 2)
        ORDER BY   random()
        LIMIT      1";
        
        $f = $this->query($sql);
	    return current($f);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 * Atualiza a contagem de visualizações de um flashcard de um usuário
	 * Neste caso ele não acertou, portanto apenas incrementa o número total
	 * de visualizações.
	 */
	public function noHit($id)
	{
	    // Encontra o flashcard do usuário
        $data = $this->read(array('id', 'user_id', 'views'), $id);
        
        // Pega o id do usuário atual
        $user_id = $data['FlashcardsUser']['user_id'];
        
        // Incrementa a contagem de visualizações
        $data['FlashcardsUser']['views']++;
        
        // Salva a contagem
        $this->save($data);
        
        // Incrementa a quantidade de visualizações para todos os cartões (N)
        $this->query('UPDATE users_total_views set total = total + 1 where user_id = ' . $user_id);
	}
	
	
	//--------------------------------------------------------------------------
	/**
	 *
	 * Atualiza a contagem de visualizações e de acertos (hits) de um flashcard
	 * de um usuário.
	 * Neste caso ele acertou a resposta então a contagem de acertos também deve
	 * ser incrementada.
	 *
	 */
    public function hit($id = null)
    {
        // Encontra o flashcard do usuário
        $data = $this->read(array('id', 'user_id', 'views', 'hits'), $id);
        
        // Pega o id do usuário atual
        $user_id = $data['FlashcardsUser']['user_id'];
        
        // Incrementa a contagem de visualizações
        $data['FlashcardsUser']['views']++;
        $data['FlashcardsUser']['hits']++;
        
        // Salva os dados
        $this->save($data);
        
        // Incrementa a quantidade de visualizações para todos os cartões (N)
        $this->query('UPDATE users_total_views set total = total + 1 where user_id = ' . $user_id);
    }
}
