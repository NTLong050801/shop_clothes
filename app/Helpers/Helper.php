<?php

namespace App\Helpers;

use Illuminate\Support\Str;
class Helper
{
     public static function listCate($cates){
        $html = '';
        $index = 1;
        foreach ($cates as $data){
            $html .= '
                <tr>
                    <th scope="row">'.$index++.'</th>
                    <td>'.$data->name_cate.'</td>
                    <td>'.$data->updated_at-> format('H:i:s d-m-Y').'</td>
                    <td class="text-center w-10">

                            <button class="btn btn-sm btn-warning btn_edit "  name_cate ="'.$data->name_cate.'" id_edit="'.$data->id.'" url="'.route('admin.cate.edit',$data->id).'" data-toggle="modal" data-target="#editLoaiHang"><i class="fa-solid fa-pen-to-square"></i></button>

                        <a href="'.route('admin.cate.destroy',$data->id).'">
                            <button class="btn btn-sm btn-danger "><i class="fa-solid fa-trash"></i></button>
                        </a>

                    </td>

                </tr>
            ';
        }
        return $html;


    }
    public static function showAllCate($categories){
         $html  = '';
        foreach ($categories as $category){
            $html .= '<li><a href="#">'.$category->name_cate.'</a></li>
';
        }
        return $html;
    }
}
