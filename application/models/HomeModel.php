<?php
class HomeModel extends CI_Model{


    public function getGame()
    {
        // get all data from activerevies
         $query = $this->db->query("SELECT * FROM activereviews");
         return $query->result();
    }

    //Get the details for a game once it has been clicked on.
    public function getReview($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                //if slug does not exist then get all data from activerevies
                $query = $this->db->get('activereviews');
                return $query->result_array();
        }
        //otherwise get the row that corresponds with the slug
        $query = $this->db->get_where('activereviews', array('slug' => $slug));
        return $query->row_array();
    }

    public function getComments($ID)
    {
        //return comments that correspond with the review id
        $this->db->select('gamescomments.UID, UserID, ReviewID, UserName, UserComment');
        $this->db->from('gamescomments');
        $this->db->join('users', 'users.UID = gamescomments.UserID');
        $this->db->where('gamescomments.ReviewID =', $ID);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertComments($data)
    {
        //select the data from the page that needs to go into gamescomments, push data to array and insert into db
        $newArray = array(
            'UserID' => $data['UserID'],
            'ReviewID' => $data['ReviewID'],
            'UserComment' => $data['UserComment']
        );
        $this->db->insert('gamescomments', $newArray);
        
    }
}