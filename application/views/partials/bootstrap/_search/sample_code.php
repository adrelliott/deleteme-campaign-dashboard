<?
    
    //output the sql query ready to be performed:
    echo create_query($post);



//Function below, and $post below that
    function create_query($post_array)
    {
        $sql = array();  //This is the query
        $conditions = array();

        //Loop through the array and create the SQL here
        foreach ($post_array as $k => $array)
        {
            $conditions[$k] = $array;
        }
        
        //First set up the SELECT (I will want to add options to add more fields in here later)
        $sql['select'] = 'SELECT `t1.id`, `t1.order_id`, `etc etc etc ';

        //Now do the OR contraints
        foreach ($conditions['operator'] as $k => $v)
        {
            if ($v === 'or')
            {
                $or = ' (t1.product_id=' . $conditions['product_id'][$k];
                if ( ! empty($conditions['season'][$k]))
                {
                    $or .= ' AND t1.product_end_date=' . $conditions['season'][$k]; 
                }
                $or .= ') ';
                
                $sql['or'][] = $or;
            }

            elseif ($v === 'and')
            {
                //etc etc
            }
        }

        $sql = join(' ', $sql);
        
        return $sql;
    }


    //Example of the kinf od array that the is passed. 
    $post = array(
      "operator" => array(
        [0] => "",
        [1] => "or",
        [2] => "or",
        [3] => "and",
        [4] => "and",
        [5] => "not",
        [6] => "or",
        ),
      "product_id" => array(
        [0] => "1",
        [1] => "2",
        [2] => "3",
        [3] => "4",
        [4] => "6",
        [5] => "32",
        [6] => "",
        ),
      "season" => array(
        [0] => "2005/06",
        [1] => "2006/07",
        [2] => "2007/08",
        [3] => "2008/09",
        [4] => "",
        [5] => "2005/06",
        [6] => "",
        ),
      "date_type" => array(
        [0] => "before",
        [1] => "",
        [2] => "",
        [3] => "",
        [4] => "",
        [5] => "",
        [6] => "",
        ),
      "date" => array(
        [0] => "2013-12-05",
        [1] => "",
        [2] => "",
        [3] => "",
        [4] => "",
        [5] => "",
        [6] => "",
        )
      );