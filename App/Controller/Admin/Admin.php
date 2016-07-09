<?php
namespace App\Controller;


class Admin extends BaseController {


    public function __construct(){
        parent::__construct();
    }



    //首页响应
    public function doIndexPost()
    {

    }

    //首页的
    public function doIndex()
    {
        //遍历下面有哪些目录
        view('',[
            'res'=>$res
        ]);
    }




}
