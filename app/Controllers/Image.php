<?php namespace App\Controllers;

use Config\Validation;

class Image extends BaseController
{
    public function index()
    {
        
        helper(['form','URL']);
        $data = [];
        // $data['map'] = "Map";
        // $map = [];

        if($this->request->getMethod() == 'post')
        {
            
            if(isset($_POST['Upload']))
            {
                $rules = [
                
                    'theFile' =>[
                        'rules' => 'uploaded[theFile]|is_image[theFile]|max_size[theFile, 10240]', 
                        // max_dims[theFile,100,50] ext_in[theFile,jpg]
                        'label' => 'The File'
                    ]
                ];
    
    
                if($this->validate($rules))
                {
                    $file = $this->request->getFile('theFile');
                    if($file->isValid() && !$file->hasMoved())
                    {
                        $file->move('./uploads/images', 'testName.'.$file->getExtension()); //$file->getRandomName()
                        
                    }
                    
                }
                else
                    $data['validation'] = $this->validator;
            }
                  
        }
        return view('image', $data);
    }    

   

    public function loadAll()
    {              
        // if(isset($_POST['Show'])){}
        helper(['filesystem']);
            $dir = "uploads/images/"; 
            $map = directory_map($dir);
            $data = "";
            foreach ($map as $k) 
            {
                $data .= '<div class="col-md-2 mt-4">' . 
                        '<h4>' . ucfirst($k) . '</h4>' .
                        '<img class="img-fluid" src="' . base_url($dir) . '/' . $k . '">' . 
                        '</div>';
            }
            echo $data;                   
    }


}
