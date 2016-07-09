<?php
/**
 * Created by PhpStorm.
 * User: shampeak
 * Date: 2016/6/19
 * Time: 18:44
 */

namespace App\Model;


class ScanModel
{

    public function getArr($path,$chr = '')
    {
        $arr    = $this->get($path);
        $arrmd  = $this->get($path,'md');
        //D($arrmd);

        $arrjson = $this->get($path,'json');

        foreach($arr as $key=>$value){      //去掉confoig
            $_v = explode('/',$value);

            //寻找树枝
            switch(count($_v)){
                case 1:
                    if(empty($sz[$_v[0]]) && $value != 'Config')  $sz[$_v[0]] = 1;
                    break;
                case 2:
                    if(empty($sz[$_v[0]][$_v[1]]))  $sz[$_v[0]][$_v[1]] = 1;
                    break;
                case 3:
                    if(empty($sz[$_v[0]][$_v[1]][$_v[2]]))  $sz[$_v[0]][$_v[1]][$_v[2]] = 1;
                    break;
                case 4:
                    if(empty($sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]]))  $sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]] = 1;
                    break;
                case 5:
                    if(empty($sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]]))  $sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]] = 1;
                    break;
                case 6:
                    $sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]][$_v[5]] = 1;
                    break;
            }
        }

        //md 文件列表
        foreach($arrmd as $key=>$value){
            $_v = explode('/',$value);

            //寻找树枝
            switch(count($_v)){
                case 2:
                    $__v = explode('-',$_v[1]);
                    if($sz[$_v[0]] ==1)  $szmd[$_v[0]]['filelist'][$__v[0]] = $__v[1];
                    break;
                case 3:
                    $__v = explode('-',$_v[2]);
                    if($sz[$_v[0]][$_v[1]] ==1)  $szmd[$_v[0]][$_v[1]]['filelist'][$__v[0]] = $__v[1];;
                    break;
                case 4:
                    $__v = explode('-',$_v[3]);
                    if($sz[$_v[0]][$_v[1]][$_v[2]]==1)  $szmd[$_v[0]][$_v[1]][$_v[2]]['filelist'][$__v[0]]  = $__v[1];
                    break;
                case 5:

                    $__v = explode('-',$_v[4]);
                    if($sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]]==1)  $szmd[$_v[0]][$_v[1]][$_v[2]][$_v[3]]['filelist'][$__v[0]] =$__v[1];;
                    break;
                case 6:

                    $__v = explode('-',$_v[5]);
                    if($sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]]==1)  $szmd[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]]['filelist'][$__v[0]] = $__v[1];
                    break;
                case 7:

                    $__v = explode('-',$_v[6]);
                    if($sz[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]][$_v[5]]==1)  $szmd[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]][$_v[5]]['filelist'][$__v[0]] = $__v[1];;
                    break;
            }
        }

        //json 文件列表
        foreach($arrjson as $key=>$value){
            $_v = explode('/',$value);

//            //寻找树枝
            switch(count($_v)){
                case 2:
                    if($_v[1] == 'index.json') $szjson[$_v[0]]['index'] = $_v[1];
                    break;
                case 3:
                    if($_v[2] == 'index.json') $szjson[$_v[0]][$_v[1]]['index']= $_v[2];;
                    break;
                case 4:
                    if($_v[3] == 'index.json') $szjson[$_v[0]][$_v[1]][$_v[2]]['index']  = $_v[3];
                    break;
                case 5:
                    if($_v[4] == 'index.json') $szjson[$_v[0]][$_v[1]][$_v[2]][$_v[3]]['index'] =$_v[4];;
                    break;
                case 6:
                    if($_v[5] == 'index.json') $szjson[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]]['index'] = $_v[5];
                    break;
                case 7:
                    if($_v[6] == 'index.json') $szjson[$_v[0]][$_v[1]][$_v[2]][$_v[3]][$_v[4]][$_v[5]]['index'] = $_v[6];;
                    break;
            }
        }

    }

    public function ScanDir($path,&$data)
    {
        if(is_dir($path)){
            $dp=dir($path);
            while($file=$dp->read()){
                if($file!='.'&& $file!='..'){
                    $this->ScanDir($path.'/'.$file,$data);
                }
            }
            $dp->close();
        }
            $data[]=$path;
    }



    function get($dir,$chr = ''){
        $dir = rtrim($dir,'/');

        //$chr 默认 目录 / json / md / all
        $data = array();
        $this->ScanDir($dir,$data);

//        $chr = 'JSON';
//        $chr = 'md';

        $chr = strtolower($chr);

        switch($chr){
            case 'json':
                foreach($data as $key=>$value){
                    if(substr($value,-5) == '.json') $_data[] = $value;
                }
                break;
            case 'md':
                foreach($data as $key=>$value){
                    if(substr($value,-3) == '.md') $_data[] = $value;
                }
                break;
            case 'all' :
                $_data = $data;
                break;
            default :
                foreach($data as $key=>$value){
                    if(is_dir($value))      $_data[] = $value;
                }

                break;
        }

        foreach($_data as $key=>$value){
            $dee = ltrim(str_replace($dir,'',$value),'/');
            if($dee) $res[$key] = $dee;
        }

        return $res;
    }

}
