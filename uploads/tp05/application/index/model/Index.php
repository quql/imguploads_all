<?php
namespace app\index\model;
use think\Model;
use think\File;

/**
 * Created by PhpStorm.
 * User: qianglong
 * Date: 2018/2/1
 * Time: 17:11
 */
class Index extends Model
{
    public function upImg()
    {
        $file = request()->file('file');
        if ($file){
            // 移动到框架应用根目录/public/uploads/ 目录下
                                        //上传大小最多500KB
            $info = $file->validate(['size'=>500*1024,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                echo json_encode(array("state" => "1", "pic" =>'/uploads/'.$info->getSaveName(), "name" =>$info->getFilename()));
                exit;
            }else{
                echo json_encode(array("errmsg" => $file->getError()));
                exit;
            }
        }else{
            echo json_encode(array("errmsg" => "您还未选择图片"));
            exit ;
        }
    }
}