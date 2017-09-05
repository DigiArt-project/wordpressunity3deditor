<?php

$scene_json = "{
	\"metadata\": {
		\"formatVersion\" : 4.0,
		\"type\"		: \"scene\",
		\"generatedBy\"	: \"SceneExporter.js\",
		\"objects\"       : 2	},

	\"urlBaseType\": \"relativeToScene\",

	\"objects\" :
	{
		\"avatarYawObject\" : {
			\"position\" : [0,0,0],
			\"rotation\" : [0,0,0],
			\"quaternion\" : [0.0000,1.0000,0.0000,0.0000],
			\"scale\"	   : [1,1,1],
			\"visible\"  : true,
			\"children\" : {
			}
		},

		\"seventh-producer_1504275322\" : {
			\"position\" : [0,0,0],
			\"rotation\" : [0,0,0],
			\"quaternion\" : [0,0,0,1],
			\"scale\"	   : [1,1,1],
			\"fnPath\" : \"/Models/\",
			\"assetid\" : \"317\",
			\"fnObj\" : \"building3-2.obj\",
			\"fnObjID\" : \"318\",
			\"categoryName\" : \"Producer\",
			\"categoryID\" : \"21\",
			\"diffImage\" : \"\",
			\"diffImageID\" : \"\",
			\"image1id\" : \"\",
			\"fnMtl\" : \"\",
			\"fnMtlID\" : \"\",
			\"children\" : {
			}
		}

	}

}";

echo $scene_json;

$jsonScene = htmlspecialchars_decode ( $scene_json );
$sceneJsonARR = json_decode($jsonScene, TRUE);
$tempScenearr = $sceneJsonARR;
foreach ($tempScenearr['objects'] as $key => $value ) {


    if ($key != 'avatarYawObject') {

        //print_r($tempScenearr);



        if($value['assetid'] == 317) {
            unset($tempScenearr['objects'][$key]);
            $tempScenearr['metadata']['objects'] --;
        }


        //print_r($tempScenearr);
    }
}


echo "<br /><br />";

$tempScenearr = json_encode($tempScenearr, JSON_PRETTY_PRINT);

print_r($tempScenearr);