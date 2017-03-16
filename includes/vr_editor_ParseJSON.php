<?php
class ParseJSON {

    function __construct($relativepath)
    {
        $this->relativepath = $relativepath;
    }

    public function init($sceneToLoad)
    {
        $content_JSON = json_decode($sceneToLoad);
        $json_objects = $content_JSON->objects;

        foreach ($json_objects as $key=>$value) {

            $name = $key;

            if ($name == 'avatarYawObject')
            {
                $path = '';
                $obj = '';
                $mtl = '';
                $type_behavior = 'avatar';
            } else {
                $path =$this->relativepath . $value->fnPath;
                $assetid=$value->assetid;
                $obj = $value->fnObj;
                $objID = $value->fnObjID;
                $mtl = $value->fnMtl;
                $mtlID = $value->fnMtlID;
                $diffImage = $value->diffImage;
                $diffImageID = $value->diffImageID;
                $categoryName = $value->categoryName;
                $categoryID = $value->categoryID;
                $image1id = $value->image1id;
            }

            $t_x = $value->position[0];
            $t_y = $value->position[1];
            $t_z = $value->position[2];

            $r_x = $value->rotation[0];
            $r_y = $value->rotation[1];
            $r_z = $value->rotation[2];

            $scale = $value->scale[0];

            echo '<script>';
            echo 'selected_object_trs={"translation":['.$t_x.','.$t_y.','.$t_z.'],"rotation":['.
                $r_x .','.$r_y .','.$r_z .'],'.'"scale":'.$scale.'};';

            echo 'resources3D["'.$name.'"]= {"path":"'.$path.
                                            '","assetid":"'.$assetid.
                                            '","obj":"'.$obj.
                                            '","objID":"'.$objID.
                                            '","mtl":"'.$mtl.
                                            '","mtlID":"'.$mtlID.
                                            '","diffImage":"'.$diffImage.
                                            '","diffImageID":"'.$diffImageID.
                                            '","categoryName":"'.$categoryName.
                                            '","categoryID":"'.$categoryID.
                                            '","image1id":"'.$image1id.
                '","trs":selected_object_trs};'; // fpath_obj.push("'.end($resources3D)['obj'].'");';

            echo '</script>';
        }
    }
}
?>