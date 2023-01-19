<?php

namespace App\Helpers;

use Illuminate\Support\Str;
class Helper
{
     public static function listCate($cates){
        $html = '';
        foreach ($cates as $data){
            $html .= '
                <tr>
                    <th scope="row">1</th>
                    <td>'.$data->name_cate.'</td>
                    <td>'.$data->updated_at-> format('H:i:s d-m-Y').'</td>
                    <td class="text-center w-10">
                        <a href="'.route('admin.cate.edit',$data->id).'">
                            <button class="btn btn-sm btn-warning "><i class="fa-solid fa-pen-to-square"></i></button>
                        </a>
                        <a href="'.route('admin.cate.destroy',$data->id).'">
                            <button class="btn btn-sm btn-danger "><i class="fa-solid fa-trash"></i></button>
                        </a>

                    </td>

                </tr>
            ';
        }
        return $html;

    }
}
