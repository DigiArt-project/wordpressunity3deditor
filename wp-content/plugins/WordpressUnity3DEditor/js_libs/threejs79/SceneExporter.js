/**
 * @author alteredq / http://alteredqualia.com/
 */
THREE.SceneExporter = function () {};

THREE.SceneExporter.prototype = {

    constructor: THREE.SceneExporter,

    parse: function ( scene ) {

        var position = Vector3String( scene.position );
        var rotation = Vector3String( scene.rotation );
        var scale = Vector3String( scene.scale );

        var nobjects = 0;
        var ngeometries = 0;
        var nmaterials = 0;
        var ntextures = 0;

        var objectsArray = [];
        var geometriesArray = [];
        var materialsArray = [];
        var texturesArray = [];
        var fogsArray = [];

        var geometriesMap = {};
        var materialsMap = {};
        var texturesMap = {};

        // extract objects, geometries, materials, textures

        var checkTexture = function ( map ) {

            if ( ! map ) return;

            if ( ! ( map.id in texturesMap ) ) {

                texturesMap[ map.id ] = true;
                texturesArray.push( TextureString( map ) );
                ntextures += 1;
            }

        };

        var linesArray = [];

        /**
         * This does the core translation
         *
         * @param object
         * @param pad
         * @param whocalls
         */
        function createObjectsList( object, pad, whocalls ) {

            for ( var i = 0; i < object.children.length; i ++ ) {

                var node = object.children[ i ];

                // Not necessary to save
                if (node.name == 'rayLine' || node.name == 'rayLine' || node.name == 'mylightAvatar' ||
                    node.name == 'mylightOrbit' || node.name == 'SteveShieldMesh' || node.name =='Steve' ||
                    node.name =='SteveMesh' || node.name =='avatarCamera' || node.name =='avatarPitchObject' ||
                    node.name =='orbitCamera' || node.name =='myAxisHelper' || node.name =='myAxisHelper' ||
                    node.name =='myGridHelper' || node.name =='myTransformControls'
                )
                    continue;


                //
                if (node instanceof THREE.Mesh)
                    continue;



                if ( node instanceof THREE.Mesh ) {

                    linesArray.push( MeshString( node, pad ) );
                    nobjects += 1;

                    if ( ! ( node.geometry.id in geometriesMap ) ) {
                        geometriesMap[ node.geometry.id ] = true;
                        geometriesArray.push( GeometryString( node.geometry ) );
                        ngeometries += 1;
                    }

                    if ( ! ( node.material.id in materialsMap ) ) {

                        materialsMap[ node.material.id ] = true;
                        materialsArray.push( MaterialString( node.material ) );
                        nmaterials += 1;

                        checkTexture( node.material.map );
                        checkTexture( node.material.envMap );
                        checkTexture( node.material.lightMap );
                        checkTexture( node.material.specularMap );
                        checkTexture( node.material.bumpMap );
                        checkTexture( node.material.normalMap );

                    }

                } else if ( node instanceof THREE.Light ) {

                    // Lights are not modifiable

                    // linesArray.push( LightString( node, pad ) );
                    // nobjects += 1;

                    continue;

                } else if ( node instanceof THREE.Camera ) {


                    // Cameras are not modifiable

                    // linesArray.push( CameraString( node, pad ) );
                    // nobjects += 1;

                    continue;

                } else if ( node instanceof THREE.Object3D ) {

                        // Everything is Object3D !
                        // What remains here is the (Groups) = 3d models obj to load
                        // and Object3D avatarYawObject

                        linesArray.push(ObjectString(node, pad));
                        nobjects += 1;

                }


                if ( node.children.length > 0 ) {
                    linesArray.push( PaddingString( pad + 1 ) + '\t\t"children" : {' );
                }

                createObjectsList( node, pad + 2, pad+2 );

                if ( node.children.length > 0 ) {

                    linesArray.push( PaddingString( pad + 1 ) + "\t\t}" );

                }

                linesArray.push( PaddingString( pad ) + "\t\t}" + ( i < object.children.length - 1 ? ",\n" : "" ) );

            }

        }

        // ignite the loop
        createObjectsList( scene, 0, "pad 0" );

        var objects = linesArray.join( "\n" );

        // extract fog if exists
        if ( scene.fog ) {
            fogsArray.push( FogString( scene.fog ) );
        }


        // generate sections
        var geometries = generateMultiLineString( geometriesArray, ",\n\n\t" );
        var materials = generateMultiLineString( materialsArray, ",\n\n\t" );
        var textures = generateMultiLineString( texturesArray, ",\n\n\t" );
        var fogs = generateMultiLineString( fogsArray, ",\n\n\t" );

        // generate defaults

        var activeCamera = null;

        scene.traverse( function ( node ) {

            if ( node instanceof THREE.Camera && node.userData.active ) {

                activeCamera = node;

            }

        } );

        var defcamera = LabelString( activeCamera ? getObjectName( activeCamera ) : "" );
        var deffog = LabelString( scene.fog ? getFogName( scene.fog ) : "" );

        function LightString( o, n ) {

            if ( o instanceof THREE.AmbientLight ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"  : "AmbientLight",',
                    '	"color" : ' + o.color.getHex() + ( o.children.length ? ',' : '' )

                ];

            } else if ( o instanceof THREE.DirectionalLight ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"      : "DirectionalLight",',
                    '	"color"     : ' + o.color.getHex() + ',',
                    '	"intensity" : ' + o.intensity + ',',
                    '	"direction" : ' + Vector3String( o.position ) + ',',
                    '	"target"    : ' + LabelString( getObjectName( o.target ) ) + ( o.children.length ? ',' : '' )

                ];

            } else if ( o instanceof THREE.PointLight ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"      : "PointLight",',
                    '	"color"     : ' + o.color.getHex() + ',',
                    '	"intensity" : ' + o.intensity + ',',
                    '	"position"  : ' + Vector3String( o.position ) + ',',
                    '	"distance"  : ' + o.distance + ( o.children.length ? ',' : '' )

                ];

            } else if ( o instanceof THREE.SpotLight ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"      : "SpotLight",',
                    '	"color"     : ' + o.color.getHex() + ',',
                    '	"intensity" : ' + o.intensity + ',',
                    '	"position"  : ' + Vector3String( o.position ) + ',',
                    '	"distance"  : ' + o.distance + ',',
                    '	"angle"     : ' + o.angle + ',',
                    '	"exponent"  : ' + o.exponent + ',',
                    '	"target"    : ' + LabelString( getObjectName( o.target ) ) + ( o.children.length ? ',' : '' )

                ];

            } else if ( o instanceof THREE.HemisphereLight ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"        : "HemisphereLight",',
                    '	"skyColor"    : ' + o.color.getHex() + ',',
                    '	"groundColor" : ' + o.groundColor.getHex() + ',',
                    '	"intensity"   : ' + o.intensity + ',',
                    '	"position"    : ' + Vector3String( o.position ) + ( o.children.length ? ',' : '' )

                ];

            } else {

                var output = [];

            }

            return generateMultiLineString( output, '\n\t\t', n );

        }

        function CameraString( o, n ) {

            if ( o instanceof THREE.PerspectiveCamera ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"     : "PerspectiveCamera",',
                    '	"fov"      : ' + o.fov + ',',
                    '	"aspect"   : ' + o.aspect + ',',
                    '	"near"     : ' + o.near + ',',
                    '	"far"      : ' + o.far + ',',
                    '	"position" : ' + Vector3String( o.position ) + ( o.children.length ? ',' : '' )

                ];

            } else if ( o instanceof THREE.OrthographicCamera ) {

                var output = [

                    '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                    '	"type"     : "OrthographicCamera",',
                    '	"left"     : ' + o.left + ',',
                    '	"right"    : ' + o.right + ',',
                    '	"top"      : ' + o.top + ',',
                    '	"bottom"   : ' + o.bottom + ',',
                    '	"near"     : ' + o.near + ',',
                    '	"far"      : ' + o.far + ',',
                    '	"position" : ' + Vector3String( o.position ) + ( o.children.length ? ',' : '' )

                ];

            } else {

                var output = [];

            }

            return generateMultiLineString( output, '\n\t\t', n );

        }

        function ObjectString( o, n ) {

            if (o.name != 'avatarYawObject'){

                // ================ Ververidis Main =============: All objs
                var output = [
                    '\t\t' + LabelString(getObjectName(o)) + ' : {',
                    '	"position" : ' + Vector3String(o.position) + ',',
                    '	"rotation" : ' + Vector3String(o.rotation) + ',',
                    '	"scale"	   : ' + Vector3String(o.scale) + ',',
                    '	"guid_fbx" : ' + '"' + o.guid_fbx  + '"' + ',',
                    '	"guid_mat" : ' + '"' + o.guid_mat  + '"' + ',',
                    '	"fnPath" : ' + '"' + o.fnPath  + '"' + ',',
                    '	"fnObj" : ' + '"' + o.fnObj  + '"' + ',',
                    '	"fnFbx" : ' + '"' + o.fnFbx  + '"' + ',',
                    '	"fnMat" : ' + '"' + o.fnMat  + '"' + ',',
                    '	"fnMtl" : ' + '"' + o.fnMtl + '"' + ( o.children.length ? ',' : '' )

                    //+ ',',
                    //'	"visible"  : ' + o.visible + ( o.children.length ? ',' : '' )
                ];
                //===============================================

            } else {

                var output = [
                    '\t\t' + LabelString(getObjectName(o)) + ' : {',
                    '	"position" : ' + Vector3String(o.position) + ',',
                    '	"rotation" : ' + Vector3String(o.rotation) + ',',
                    '	"scale"	   : ' + Vector3String(o.scale) + ',',
                    '	"visible"  : ' + o.visible + ( o.children.length ? ',' : '' )
                ];
            }

            return generateMultiLineString( output, '\n\t\t', n );

        }

        function MeshString( o, n ) {

            var output = [

                '\t\t' + LabelString( getObjectName( o ) ) + ' : {',
                '	"geometry" : ' + LabelString( getGeometryName( o.geometry ) ) + ',',
                '	"material" : ' + LabelString( getMaterialName( o.material ) ) + ',',
                '	"position" : ' + Vector3String( o.position ) + ',',
                '	"rotation" : ' + Vector3String( o.rotation ) + ',',
                '	"scale"	   : ' + Vector3String( o.scale ) + ',',
                '	"visible"  : ' + o.visible + ( o.children.length ? ',' : '' )

            ];

            return generateMultiLineString( output, '\n\t\t', n );

        }

        function GeometryString( g ) {

            if ( g instanceof THREE.SphereGeometry ) {

                var output = [

                    '\t' + LabelString( getGeometryName( g ) ) + ': {',
                    '	"type"    : "sphere",',
                    '	"radius"  : ' 		 + g.parameters.radius + ',',
                    '	"widthSegments"  : ' + g.parameters.widthSegments + ',',
                    '	"heightSegments" : ' + g.parameters.heightSegments,
                    '}'

                ];

            } else if ( g instanceof THREE.BoxGeometry ) {

                var output = [

                    '\t' + LabelString( getGeometryName( g ) ) + ': {',
                    '	"type"    : "cube",',
                    '	"width"  : '  + g.parameters.width  + ',',
                    '	"height"  : ' + g.parameters.height + ',',
                    '	"depth"  : '  + g.parameters.depth  + ',',
                    '	"widthSegments"  : ' + g.widthSegments + ',',
                    '	"heightSegments" : ' + g.heightSegments + ',',
                    '	"depthSegments" : '  + g.depthSegments,
                    '}'

                ];

            } else if ( g instanceof THREE.PlaneGeometry ) {

                var output = [

                    '\t' + LabelString( getGeometryName( g ) ) + ': {',
                    '	"type"    : "plane",',
                    '	"width"  : '  + g.parameters.width  + ',',
                    '	"height"  : ' + g.parameters.height + ',',
                    '	"widthSegments"  : ' + g.parameters.widthSegments + ',',
                    '	"heightSegments" : ' + g.parameters.heightSegments,
                    '}'

                ];

            } else if ( g instanceof THREE.Geometry ) {



                if ( g.sourceType === "ascii" || g.sourceType === "ctm" || g.sourceType === "stl" || g.sourceType === "vtk" ) {

                    var output = [

                        '\t' + LabelString( getGeometryName( g ) ) + ': {',
                        '	"type" : ' + LabelString( g.sourceType ) + ',',
                        '	"url"  : ' + LabelString( g.sourceFile ),
                        '}'

                    ];

                } else {

                    var output = [];

                }

            } else {

                var output = [];

            }

            return generateMultiLineString( output, '\n\t\t' );

        }

        function MaterialString( m ) {

            if ( m instanceof THREE.MeshBasicMaterial ) {

                var output = [

                    '\t' + LabelString( getMaterialName( m ) ) + ': {',
                    '	"type"    : "MeshBasicMaterial",',
                    '	"parameters"  : {',
                    '		"color"  : ' 	+ m.color.getHex() + ',',

                    m.map ? 		'		"map" : ' + LabelString( getTextureName( m.map ) ) + ',' : '',
                    m.envMap ? 		'		"envMap" : ' + LabelString( getTextureName( m.envMap ) ) + ',' : '',
                    m.specularMap ? '		"specularMap" : ' + LabelString( getTextureName( m.specularMap ) ) + ',' : '',
                    m.lightMap ? 	'		"lightMap" : ' + LabelString( getTextureName( m.lightMap ) ) + ',' : '',

                    '		"reflectivity"  : ' + m.reflectivity + ',',
                    '		"transparent" : ' + m.transparent + ',',
                    '		"opacity" : ' 	+ m.opacity + ',',
                    '		"wireframe" : ' + m.wireframe + ',',
                    '		"wireframeLinewidth" : ' + m.wireframeLinewidth,
                    '	}',
                    '}'

                ];


            } else if ( m instanceof THREE.MeshLambertMaterial ) {

                var output = [

                    '\t' + LabelString( getMaterialName( m ) ) + ': {',
                    '	"type"    : "MeshLambertMaterial",',
                    '	"parameters"  : {',
                    '		"color"  : ' 	+ m.color.getHex() + ',',
                    //'		"ambient"  : ' 	+ m.ambient.getHex() + ',',
                    //'		"emissive"  : ' + m.emissive.getHex() + ',',

                    m.map ? 		'		"map" : ' + LabelString( getTextureName( m.map ) ) + ',' : '',
                    m.envMap ? 		'		"envMap" : ' + LabelString( getTextureName( m.envMap ) ) + ',' : '',
                    m.specularMap ? '		"specularMap" : ' + LabelString( getTextureName( m.specularMap ) ) + ',' : '',
                    m.lightMap ? 	'		"lightMap" : ' + LabelString( getTextureName( m.lightMap ) ) + ',' : '',

                    '		"reflectivity"  : ' + m.reflectivity + ',',
                    '		"transparent" : ' + m.transparent + ',',
                    '		"opacity" : ' 	+ m.opacity + ',',
                    '		"wireframe" : ' + m.wireframe + ',',
                    '		"wireframeLinewidth" : ' + m.wireframeLinewidth,
                    '	}',
                    '}'

                ];

            } else if ( m instanceof THREE.MeshPhongMaterial ) {

                var output = [

                    '\t' + LabelString( getMaterialName( m ) ) + ': {',
                    '	"type"    : "MeshPhongMaterial",',
                    '	"parameters"  : {',
                    '		"color"  : ' 	+ m.color.getHex() + ',',
                    //'		"ambient"  : ' 	+ m.ambient.getHex() + ',',
                    //'		"emissive"  : ' + m.emissive.getHex() + ',',
                    '		"specular"  : ' + m.specular.getHex() + ',',
                    '		"shininess" : ' + m.shininess + ',',

                    m.map ? 		'		"map" : ' + LabelString( getTextureName( m.map ) ) + ',' : '',
                    m.envMap ? 		'		"envMap" : ' + LabelString( getTextureName( m.envMap ) ) + ',' : '',
                    m.specularMap ? '		"specularMap" : ' + LabelString( getTextureName( m.specularMap ) ) + ',' : '',
                    m.lightMap ? 	'		"lightMap" : ' + LabelString( getTextureName( m.lightMap ) ) + ',' : '',
                    m.normalMap ? 	'		"normalMap" : ' + LabelString( getTextureName( m.normalMap ) ) + ',' : '',
                    m.bumpMap ? 	'		"bumpMap" : ' + LabelString( getTextureName( m.bumpMap ) ) + ',' : '',

                    '		"bumpScale"  : ' + m.bumpScale + ',',
                    '		"reflectivity"  : ' + m.reflectivity + ',',
                    '		"transparent" : ' + m.transparent + ',',
                    '		"opacity" : ' 	+ m.opacity + ',',
                    '		"wireframe" : ' + m.wireframe + ',',
                    '		"wireframeLinewidth" : ' + m.wireframeLinewidth,
                    '	}',
                    '}'

                ];

            } else if ( m instanceof THREE.MeshDepthMaterial ) {

                var output = [

                    '\t' + LabelString( getMaterialName( m ) ) + ': {',
                    '	"type"    : "MeshDepthMaterial",',
                    '	"parameters"  : {',
                    '		"transparent" : ' + m.transparent + ',',
                    '		"opacity" : ' 	+ m.opacity + ',',
                    '		"wireframe" : ' + m.wireframe + ',',
                    '		"wireframeLinewidth" : ' + m.wireframeLinewidth,
                    '	}',
                    '}'

                ];

            } else if ( m instanceof THREE.MeshNormalMaterial ) {

                var output = [

                    '\t' + LabelString( getMaterialName( m ) ) + ': {',
                    '	"type"    : "MeshNormalMaterial",',
                    '	"parameters"  : {',
                    '		"transparent" : ' + m.transparent + ',',
                    '		"opacity" : ' 	+ m.opacity + ',',
                    '		"wireframe" : ' + m.wireframe + ',',
                    '		"wireframeLinewidth" : ' + m.wireframeLinewidth,
                    '	}',
                    '}'

                ];

            } else if ( m instanceof THREE.MeshFaceMaterial ) {

                var output = [

                    '\t' + LabelString( getMaterialName( m ) ) + ': {',
                    '	"type"    : "MeshFaceMaterial",',
                    '	"parameters"  : {}',
                    '}'

                ];

            }

            return generateMultiLineString( output, '\n\t\t' );

        }

        function TextureString( t ) {

            // here would be also an option to use data URI
            // with embedded image from "t.image.src"
            // (that's a side effect of using FileReader to load images)

            var output = [

                '\t' + LabelString( getTextureName( t ) ) + ': {',
                '	"url"    : "' + t.sourceFile + '",',
                '	"repeat" : ' + Vector2String( t.repeat ) + ',',
                '	"offset" : ' + Vector2String( t.offset ) + ',',
                '	"magFilter" : ' + NumConstantString( t.magFilter ) + ',',
                '	"minFilter" : ' + NumConstantString( t.minFilter ) + ',',
                '	"anisotropy" : ' + t.anisotropy,
                '}'

            ];

            return generateMultiLineString( output, '\n\t\t' );

        }

        //

        function FogString( f ) {

            if ( f instanceof THREE.Fog ) {

                var output = [

                    '\t' + LabelString( getFogName( f ) ) + ': {',
                    '	"type"  : "linear",',
                    '	"color" : ' + ColorString( f.color ) + ',',
                    '	"near"  : '  + f.near + ',',
                    '	"far"   : '    + f.far,
                    '}'

                ];

            } else if ( f instanceof THREE.FogExp2 ) {

                var output = [

                    '\t' + LabelString( getFogName( f ) ) + ': {',
                    '	"type"    : "exp2",',
                    '	"color"   : '  + ColorString( f.color ) + ',',
                    '	"density" : ' + f.density,
                    '}'

                ];

            } else {

                var output = [];

            }

            return generateMultiLineString( output, '\n\t\t' );

        }


        if (objects.substr(objects.length-2,1) == ',' )
            objects = objects.substr(0,objects.length-2) + '\n';


        var output = [
            '{',
            '	"metadata": {',
            '		"formatVersion" : 4.0,',
            '		"type"		: "scene",',
            '		"generatedBy"	: "SceneExporter.js",',
            '		"objects"       : ' + nobjects +  // + ',',
            // '		"geometries"    : ' + ngeometries + ',',
            // '		"materials"     : ' + nmaterials + ',',
            // '		"textures"      : ' + ntextures,
            '	},',
            '',
            '	"urlBaseType": "relativeToScene",',
            '',

            '	"objects" :',
            '	{',
            objects,
            '	}',    // Original line:   '	},',
            '',

            // '	"geometries" :',
            // '	{',
            // '\t' + 	geometries,
            // '	},',
            // '',
            //
            // '	"materials" :',
            // '	{',
            // '\t' + 	materials,
            // '	},',
            // '',
            //
            // '	"textures" :',
            // '	{',
            // '\t' + 	textures,
            // '	},',
            // '',
            //
            // '	"fogs" :',
            // '	{',
            // '\t' + 	fogs,
            // '	},',
            // '',
            //
            // '	"transform" :',
            // '	{',
            // '		"position"  : ' + position + ',',
            // '		"rotation"  : ' + rotation + ',',
            // '		"scale"     : ' + scale,
            // '	},',
            // '',
            // '	"defaults" :',
            // '	{',
            // '		"camera"  : ' + defcamera + ',',
            // '		"fog"  	  : ' + deffog,
            // '	}',
            '}'
        ].join( '\n' );




        return output; //JSON.parse( output );

    }

}