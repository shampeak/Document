<?php
namespace App\Controller;


class Home extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    public function doIndex()
    {
        //

        $path = APPROOT.'../Store/';

        $res =         Model('scan')->getArr($path);       //mulu

        D($res);


        $res =         Model('scan')->get($path);       //mulu
        $res =         Model('scan')->get($path,'md');  //mdwenjian
        $res =         Model('scan')->get($path,'json');//jsonwenjian

D($res);



//
//        $str = 'b"';
//        app('mmcfile')->set($str);
//       // app('mmcfile')->set("a",[1,2,3,4]);
//$res =         app('mmcfile')->get();
//D($res);
//
////        echo 'Hello doIndex';
////
////        //$res = app('db')->getall('select * from dy_use2r ');
////        $res = app('pdo')->getall('select * from dy_user ');
////
////        D($res);
//        view();

    }

    public function doIndex_pe()
    {
        echo 'Hello doIndex_pe';
        view();

    }


}
