<?php 
    
if ( ! defined('BASEPATH')) 
exit('No direct script access allowed'); 

class Insta_User extends Base_Model 
{ 
    public function __construct() 
    { 	
        parent::__construct(); 
        $this->table = 'user';
    } 



    public function getUsers($where = null)
    {   

        $hashtags = array('restaurant','petcare','daycar','airline','airlines','travel','weddingphotography','makeupartist','makeup','hotels','brands','hairstylist','eventplanner','weddingplanner','fashiondesigner','fashionstylist','barber','grocery','photographer');

        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('user');
        if($where != NULL) 
            $this->db->where($where);
        else
            $this->db->where_in('hashtag',$hashtags);

        
        $this->db->order_by("followers", "desc");
        $this->db->limit(20);
        $query = $this->db->get();

        return ($query->result());
    }


    

     public function getHashtagUsers($hashtag)
    {

        // $hashtags = array('travel','weddingphotography','makeupartist','makeup','hotel','hairstylist','eventplanner','weddingplanner','fashionstylist','photographer','stylist');

        if($hashtag == 'hotel' || $hashtag == 'restaurant' || $hashtag == 'airline' )
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('hashtag',$hashtag);
            $this->db->order_by("id", "desc");
            $this->db->limit(20);
            $query = $this->db->get();
            return ($query->result());

        }
        // echo 'here';exit();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('hashtag',$hashtag);
        $this->db->where('(`username` LIKE \'%'.$hashtag.'%\' OR `biography` LIKE \'%'.$hashtag.'%\' OR `fullName` LIKE \'%'.$hashtag.'%\')', NULL, FALSE);
        // $this->db->where('externalUrl !=', '');
        // $this->db->where('location !=', '');
        // $this->db->not_like('email','na_');
        // $this->db->or_like(array('username' => $hashtag, 'biography' => $hashtag));
        // $this->db->like('username',$hashtag);
        // $this->db->like('biography',$hashtag);
        // $this->db->or_like('biography',$hashtag);

        
        $this->db->order_by("followers", "desc");
        $this->db->limit(20);

        
        $query = $this->db->get();

        // printme($this->db->last_query());
        // exit();
        return ($query->result());
    }

    public function getHomeUsers()
    {

        $hashtags = array('travel','weddingphotography','makeupartist','makeup','influencer','traveler','travelers','fitness','hotels','brands','hairstylist','interiordesign','interiordesigner','eventplanner','weddingplanner','fashiondesigner','fashionstylist','barber','grocery','supermarket','photographer','blogger','dj','artist','stylist');

        $this->db->distinct();
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where_in('hashtag',$hashtags);
        $this->db->where('externalUrl !=', '');
        $this->db->or_not_like('email','na_');

        
        $this->db->order_by("followers", "desc");
        $this->db->limit(20);
        $query = $this->db->get();

        return ($query->result());
    }

    public function getLocation()
    {   
        $this->db->distinct();
        $this->db->select('location');
        $this->db->from('user');
        $query = $this->db->get();

        return ($query->result());
    }


    public function getUserByLocationName($search,$category,$max=null)
    {   

        //$search = explode(' ', $search);

        // printme($search);
        // exit();
        $this->db->select('*');
        
        $this->db->from('user');
        if($max != NULL) 
                $this->db->where('id <', $max);
        if($category != "")
        {   
            $this->db->where('hashtag',$category);
            $this->db->where('(`username` LIKE \'%'.$category.'%\' OR `biography` LIKE \'%'.$category.'%\' OR `fullName` LIKE \'%'.$category.'%\')', NULL, FALSE);
        }
        
        $this->db->like('location',$search);
        $this->db->order_by("id", "desc");
        $this->db->limit(21);
        $query = $this->db->get();

        // printme($this->db->last_query());
        // exit();
        return ($query->result());
    }


    function checkCityOrCountry($name)
    {
        $countries = file_get_contents('https://api.vk.com/method/database.getCountries?need_all=1&count=1000&lang=en');
        $arr = json_decode($countries, true);
        foreach ($arr['response'] as $country) {
            if (mb_strtolower($country['title']) === mb_strtolower($name)) {
                return true;
            }
        }

        return false;
    }
   


    public function getHashtags()
    {   

        // $hashtags = array('restaurant','petcare','daycar','airline','airlines','travel','weddingphotography','makeupartist','makeup','influencer','influencers','traveler','travelers','fitness','hotel','brands','hairstylist','interiordesign','interiordesigner','eventplanner','weddingplanner','fashiondesigner','fashionstylist','barber','grocery','supermarket','photographer','blogger','dj','artist','stylist');

        $hashtags = array('travel','weddingphotography','makeupartist','makeup','hotel','hairstylist','eventplanner','weddingplanner','fashionstylist','photographer','stylist','restaurant','airline');

        $this->db->distinct();
        $this->db->select('hashtag');
        $this->db->from('user');
        $this->db->where_in('hashtag',$hashtags);
        $query = $this->db->get();

        return ($query->result());
    }

    public function getUserByUsername($username)
    {
        $this->db->select('*, user.id as user_id');
        $this->db->from('user');
        $this->db->join('user_type', 'user.type = user_type.id','inner');
        $this->db->where_in('user.username',$username);
        $query = $this->db->get();

        return ($query->result());
    }


   

 

    public function insert($user)
    {   
        unset($user['verify']);
        
    	$random_key = uniqid();
    	$password = $this->hash_password($user['password'],$random_key);

    	$user['password']   = $password;
    	$user['random_key'] = $random_key;

    	$process = $this->Adminuser->put($user);

    	if($process == 1)
        {
    		return true;
        }
    	return false;

    }

    public function checkLogin($username,$password)
    {
    	$user = $this->Adminuser->get(array("username"=>$username));
    	if(!empty($user))
    	{
    		$user = $user[0];
    		$random_key = $user->random_key;
    		$checkPassword = $this->hash_password($password,$random_key);
    		if($checkPassword == $user->password && $user->type == 6) // Check if its an admin Account
    			return $user;
    	}

    	return false;

    }

    public function changePassword($user_id,$password,$random_key)
    {   
        $process = $this->Adminuser->update(array("password"=>$this->hash_password($password,$random_key)),array("user_id"=>$user_id));
        if($process == 1)
            return true;
        return false;
    }

    public function hash_password($password,$random_key)
    {
    	return md5($password.md5($random_key));
    }

    

}

 ?>