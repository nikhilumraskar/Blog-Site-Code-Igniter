<?php  
	class Articlesmodel extends CI_model
	{
		public function articles_list($limit, $offset)
		{
			$user_id = $this->session->userdata('user_id');
			$query = $this->db
								->select(['title','id'])
								->from('article')
								->where('user_id', $user_id)
								->limit($limit, $offset)
								->get();

			return $query->result();
		}

		public function add_article($postedarr)
		{
			return $this->db->insert('article', $postedarr);
		}

		public function find_article($article_id)
		{
			$q = $this->db->select(['id', 'title', 'body'])
							->where('id', $article_id)
							->get('article');
			
			return $q->row();
		}

		public function num_rows()
		{
			$user_id = $this->session->userdata('user_id');

			$query = $this->db
								->select()
								->from('article')
								->where('user_id', $user_id)
								->get();

			return $query->num_rows();
		}

		public function update_article($article_id, Array $article)
		{
			return $this->db->where('id', $article_id)
							->update('article', $article);
		}

		public function delete_article($article_id)
		{
			return $this->db->delete('article', ['id'=>$article_id]);
		}

	}

?>